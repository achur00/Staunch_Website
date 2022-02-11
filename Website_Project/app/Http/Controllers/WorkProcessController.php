<?php

namespace App\Http\Controllers;

use App\Models\WorkProcess;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WorkProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workProcesses = WorkProcess::all();
        return view('admin.workingprocess.index', compact('workProcesses'));
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
            'name' => 'required|string|max:80',
            'description' => 'required|string|min:20',
        ]);

        try {


            if (WorkProcess::create(['name' => $request->name, 'description' => $request->description]))
                Session::flash('status', 'Working process created Successfully');
            else
                Session::flash('error', 'Unable to create working process.');

            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function show(WorkProcess $workProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkProcess $workProcess)
    {
        return view('admin.workingprocess.edit', compact('workProcess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkProcess $workProcess)
    {
        $request->validate([
            'name' => 'required|string|max:80',
            'description' => 'required|string|min:20',               
        ]);


        try {

          
            if ($workProcess->update(['name'=>$request->name, 'description'=>$request->description]))
                Session::flash('status', 'Working proces updated Successfully');
            else
                Session::flash('error', 'Unable to update working proces.');

            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkProcess $workProcess)
    {
        //
    }
}
