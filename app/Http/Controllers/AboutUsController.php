<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutUsController extends Controller
{

    public function __construct() {
        $this->middleware(['auth'])->except('whoWeAre');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = AboutUs::first();

        return view('admin.about.who_we_are', compact('about'));
    }

    public function whoWeAre()
    {
        $about = AboutUs::first();

        return view('binary.pages.about_us.who_we_are', compact('about'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $about)
    {

        $this->validate(
            $request,
            [
                'title' => 'required|string|max:80',
                'content' => 'required|string|min:50',
                'photo'  => 'bail|image|mimes:jpg,png,jpeg|max:5120',
            ],
            [
                'photo.max' => 'The photos can not be more than 5MB.'
            ]
        );
        try {

            $inputs = $request->all();

            if ($file = $request->file('photo')) {

                $name = date('Y_m_d_his') . $file->getClientOriginalName();
                $inputs['photo'] = $name;
                if($about->photo){
                    unlink(public_path().'/images/about_us/'.$about->photo);
                }
                $file->move(public_path() . '/images/about_us', $name);
            }

            if ($about->update($inputs))
                Session::flash('status', 'Content updated Successfully');
            else
                Session::flash('error', 'Unable to update content.');

            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
