<?php

namespace App\Http\Controllers;

use App\Models\OurSkill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OurSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = OurSkill::all();

        return view('admin.skills.our_skills', compact('skills'));
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
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:80',
                'percentage' => 'required|numeric|min:1|max:100',               
            ]
        );
        try {

          
            if (OurSkill::create(['name'=>$request->name, 'percentage'=>$request->percentage]))
                Session::flash('status', 'Skill created Successfully');
            else
                Session::flash('error', 'Unable to create skill.');

            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OurSkill  $ourSkill
     * @return \Illuminate\Http\Response
     */
    public function show(OurSkill $ourSkill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OurSkill  $ourSkill
     * @return \Illuminate\Http\Response
     */
    public function edit(OurSkill $ourSkill)
    {
        $skill = $ourSkill;

        return view('admin.skills.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OurSkill  $ourSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurSkill $skill)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:80',
                'percentage' => 'required|numeric|min:1|max:100',               
            ]
        );
        try {

          
            if ($skill->update(['name'=>$request->name, 'percentage'=>$request->percentage]))
                Session::flash('status', 'Skill updated Successfully');
            else
                Session::flash('error', 'Unable to update skill.');

            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OurSkill  $ourSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurSkill $ourSkill)
    {
        //
    }
}
