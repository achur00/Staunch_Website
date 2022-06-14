<?php

namespace App\Http\Controllers;

use App\Models\MissionVision;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class MissionVisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $missionVision = MissionVision::first();
        return view('admin.about.missionvision', compact('missionVision'));
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
            'mission' => 'required|string',
            'vision' => 'required|string',            
        ]);
        // dd($request);
        try {
            $old_mission = MissionVision::find($request->mission_id);
            if (MissionVision::updateOrCreate(['id' => ($old_mission->id ?? 0)], [ 'mission'=>$request->mission, 'vision'=>$request->vision]))
                Session::flash('status', 'Mission and Vision Uploaded Successfully');
            else
                Session::flash('error', 'Unable to upload content info.');

            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MissionVision  $missionVision
     * @return \Illuminate\Http\Response
     */
    public function show(MissionVision $missionVision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MissionVision  $missionVision
     * @return \Illuminate\Http\Response
     */
    public function edit(MissionVision $missionVision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MissionVision  $missionVision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MissionVision $missionVision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MissionVision  $missionVision
     * @return \Illuminate\Http\Response
     */
    public function destroy(MissionVision $missionVision)
    {
        //
    }
}
