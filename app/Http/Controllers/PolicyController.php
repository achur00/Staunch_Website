<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hello');
        $policy = Policy::first();
        return view('admin.about.policy', compact('policy'));
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
            'content' => 'required|string|min:100',
        ]);
        try {
            $old_policy = Policy::find($request->policy);
            if (Policy::updateOrCreate(['id' => ($old_policy->id ?? 0)], ['content' => $request->content]))
                Session::flash('status', 'Terms Post Successfully');
            else
                Session::flash('error', 'Unable to Post terms.');

            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function edit(Policy $policy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policy $policy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        //
    }
}
