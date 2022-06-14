<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\CareerInfo;
use App\Notifications\CareerSubmitted;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CareerController extends Controller
{

    public function __construct()
    {
        $this->middleware('IsAdmin')->only(['index', 'storeCareerInfo', 'showCareerInfo']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Career::all();
        return view('admin.career.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $careerinfo = CareerInfo::first();
        return view('binary.pages.career', compact('careerinfo'));
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
            'name' => 'required|string|min:2',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|email',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'website' => 'nullable|url',
            'skills' => 'required|string'
        ]);
        try {
            $inputs = $request->all();
            if ($file = $request->file('cv')) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/images/cv', $name);
                $inputs['cv'] = $name;
            }



            $dev = Career::create($inputs);
            // send notification

            $dev->notify(new CareerSubmitted($dev));

            return redirect()->back()->with('status', 'Application Submitted Successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    public function showCareerInfo()
    {
        $careerinfo = CareerInfo::first();
        return view('admin.career.info', compact('careerinfo'));
    }

    public function storeCareerInfo(Request $request)
    {
        $request->validate([
            'info' => 'required|string|min:60',
        ]);
        try {
            $old_info = CareerInfo::find($request->info_id);
            if (CareerInfo::updateOrCreate(['id' => ($old_info->id ?? 0)], ['info' => $request->info]))
                Session::flash('status', 'Career info update Successfully');
            else
                Session::flash('error', 'Unable to update Career info.');

            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        //
    }
}
