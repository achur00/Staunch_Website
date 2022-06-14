<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'all', 'search']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check() && auth()->user()->role_id == 1) {
            $products = Product::with(['user', 'category','photos'])->paginate(6);
            return view('admin.products.index', compact('products'));
        }
    }

    public function all()
    {
        $products = Product::with(['user', 'category', 'photos'])->paginate(6);
        return view('binary.pages.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories = ProductCategory::pluck('name', 'id')->all();
        return view('admin.products.create', compact('product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Staunch SIMS (Stauch Sale and Inventory Management System) is a solution for all businesses.
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:80',
                'description' => 'required|string|min:50',
                'product_category' => 'required|numeric',
                'url' => 'nullable|string',
                'tools' => 'string',
                'photos'  => 'bail|required|max:6',
                'photos.*'  => 'bail|image|mimes:jpg,png,jpeg|max:5120',
            ],
            [
                'photos.max' => 'The photos can not be more than 5MB.'
            ]
        );

        try {

            $inputs = $request->all();
            $inputs['product_category_id'] = $request->get('product_category');
            $user = Auth::user();

            if ($files = $request->file('photos')) {
                if ($product = $user->products()->create($inputs)) {
                    // using request or local session
                    $request->session()->flash('status', 'Product created Successfully');
                } else {
                    // using request or local session
                    $request->session()->flash('error', 'Unable to Create Product');
                }

                foreach ($files as $file) {
                    $name = date('Y_m_d_his') . $file->getClientOriginalName();
                    $file->move(public_path() . '/images/products', $name);
                    $product->photos()->create(['name' => $name]);
                }
            }


            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product_categories = ProductCategory::with(['products'])->get();
        $popular_products = Product::where('id', '!=', $product->id)->inRandomOrder()->limit(5)->get();
        return view('binary.pages.products.show', compact('product', 'product_categories', 'popular_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product_categories = ProductCategory::pluck('name', 'id')->all();
        return view('admin.products.edit', compact('product', 'product_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:80',
                'description' => 'required|string|min:50',
                'product_category' => 'required|numeric',
                'url' => 'nullable|string',
                'tools' => 'string',
                'photos.*'  => 'bail|image|mimes:jpg,png,jpeg|max:5120',
            ],
            [
                'photos.max' => 'The photos can not be more than 5MB.'
            ]
        );
        try {

            $inputs = $request->all();
            $user = Auth::user();
            $inputs['product_category_id'] = $request->get('product_category');
            $inputs['user_id'] = $user->id;

            if ($files = $request->file('photos')) {
                if (($product->photos()->count() >= 6) || (($product->photos()->count() + count($files)) > 4)) {
                    // using request or local session
                    $request->session()->flash('error', 'Product photo has reached maximum of 6');
                    return redirect()->back();
                } else {

                    $product->update($inputs);
                    foreach ($files as $file) {
                        $name = date('Y_m_d_his') . $file->getClientOriginalName();
                        $file->move(public_path() . '/images/products', $name);
                        $product->photos()->create(['name' => $name]);
                    }
                }
            }

            if ($product->update($inputs))
                Session::flash('status', 'Product updated Successfully');
            else
                Session::flash('error', 'Unable to update product.');
            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function search(ProductCategory $product_category)
    {
        $products = $product_category->products()->latest()->paginate(6);
        // $admins = User::whereRoleId(1)->orderBy('name', 'DESC')->get();
        // paginate(5);
        // return "here in admin";
        return view('binary.pages.products.products', compact('products'));
    }
}
