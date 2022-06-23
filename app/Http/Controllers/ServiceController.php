<?php

namespace App\Http\Controllers;

use App\Models\CourseDetail;
use App\Models\EnrolStudent;
use App\Models\MobileDev;
use App\Models\SessionYear; 
use App\Models\OurSkill;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use Exception;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
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
            $services = Service::with(['user', 'category', 'photos'])->get();
            return view('admin.services.index', compact('services'));
        }
    }


    public function all()
    {
        $skills = OurSkill::all();
        $services = Service::with(['user', 'category', 'photos'])->get();
        return view('binary.pages.services.services', compact('services', 'skills'));
        // dd('binary.pages.services.services', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service_categories = ServiceCategory::pluck('name', 'id')->all();
        return view('admin.services.create', compact('service_categories'));
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
                'description' => 'required|string|min:50',
                'service_category' => 'required|numeric',
                'phone' => 'required|regex:/(0)[0-9]{10}/',
                'photos'  => 'bail|required|max:6',
                'photos.*'  => 'bail|image|mimes:jpg,png,jpeg|max:5120',
            ],
            [
                'photos.max' => 'The photos can not be more than 5MB.'
            ]
        );

        try {

            $inputs = $request->all();
            $inputs['service_category_id'] = $request->get('service_category');
            $user = Auth::user();

            if ($files = $request->file('photos')) {
                if ($service = $user->services()->create($inputs)) {
                    // using request or local session
                    $request->session()->flash('status', 'Service created Successfully');
                } else {
                    // using request or local session
                    $request->session()->flash('error', 'Unable to Create Service');
                }

                foreach ($files as $file) {
                    $name = date('Y_m_d_his') . $file->getClientOriginalName();
                    $file->move(public_path() . '/images/services', $name);
                    $service->photos()->create(['name' => $name]);
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $service_categories = ServiceCategory::with(['services'])->get();

        $popular_services = Service::where('id', '!=', $service->id)->inRandomOrder()->limit(5)->get();

        $courses=CourseDetail::all();
        $mobiles = MobileDev::all(); 
        $sessions=SessionYear::with('students')->get();
         $students=EnrolStudent::all();

        return view('binary.pages.services.show', compact('service', 'service_categories', 'popular_services','courses', 'sessions', 'sessions', 'students','mobiles'));
        // dd(SessionYear::with(['enrol_students'])->get());
        // if($service->id==6){ return view('binary.pages.services.show3', compact('service', 'service_categories', 'popular_services'));
        // }
        // else{
        // return view('binary.pages.services.show2', compact('service', 'service_categories', 'popular_services'));}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $service_categories = ServiceCategory::pluck('name', 'id')->all();
        return view('admin.services.edit', compact('service', 'service_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:80',
                'description' => 'required|string|min:50',
                'service_category' => 'required|numeric',
                'phone' => 'required|regex:/(0)[0-9]{10}/',
                'photos.*'  => 'bail|image|mimes:jpg,png,jpeg|max:5120',
            ],
            [
                'photos.max' => 'The photos can not be more than 5MB.'
            ]
        );
        try {

            $inputs = $request->all();
            $user = Auth::user();
            $inputs['service_category_id'] = $request->get('service_category');
            $inputs['user_id'] = $user->id;

            if ($files = $request->file('photos')) {
                if (($service->photos()->count() >= 6) || (($service->photos()->count() + count($files)) > 4)) {
                    // using request or local session
                    $request->session()->flash('error', 'Service photo has reached maximum of 6');
                    return redirect()->back();
                } else {

                    $service->update($inputs);
                    foreach ($files as $file) {
                        $name = date('Y_m_d_his') . $file->getClientOriginalName();
                        $file->move(public_path() . '/images/services', $name);
                        $service->photos()->create(['name' => $name]);
                    }
                }
            }

            if ($service->update($inputs))
                Session::flash('status', 'Service updated Successfully');
            else
                Session::flash('error', 'Unable to update service.');
            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    public function search(ServiceCategory $service_category)
    {
        $services = $service_category->services()->latest()->paginate(6);
        $skills = OurSkill::all();
        // $admins = User::whereRoleId(1)->orderBy('name', 'DESC')->get();
        // paginate(5);
        // return "here in admin";
        return view('binary.pages.services.services', compact('services', 'skills'));
    }
}
