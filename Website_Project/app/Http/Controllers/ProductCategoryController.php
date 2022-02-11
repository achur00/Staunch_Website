<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.products.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100'
        ]);

        try {
            ProductCategory::create([
                'name' => $request->name,
            ]);

            return back()->with('status', 'Category created successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $service
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $category)
    {
        return view('admin.products.categoryedit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $category)
    {
        Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
            ],
            [
                'name.required' => 'Category Name is required',
            ]
        )->validate();
        try {

            $category->update([
                'name' => $request->name
            ]);

            return back()->with('status', 'category updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'something went wrong! ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $service)
    {
        //
    }
}
