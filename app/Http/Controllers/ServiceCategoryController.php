<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceCategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ServiceCategory::all();
        return view('admin.services.category', compact('categories'));
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
            ServiceCategory::create([
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
     * @param  \App\Models\ServiceCategory  $service
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCategory $category)
    {
        return view('admin.services.categoryedit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceCategory  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceCategory $category)
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
     * @param  \App\Models\ServiceCategory  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCategory $service)
    {
        //
    }
}
