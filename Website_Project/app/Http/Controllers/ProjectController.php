<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
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
            $projects = Project::with(['user', 'category','photos'])->get();
            return view('admin.projects.index', compact('projects'));
        }
    }

    public function all()
    {
        $projects = Project::with(['user', 'category', 'photos'])->get();
        return view('binary.pages.projects.projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_categories = ProductCategory::pluck('name', 'id')->all();
        return view('admin.projects.create', compact('project_categories'));
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
                'project_category' => 'required|numeric',
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
            $inputs['product_category_id'] = $request->get('project_category');
            $user = Auth::user();

            if ($files = $request->file('photos')) {
                if ($project = $user->projects()->create($inputs)) {
                    // using request or local session
                    $request->session()->flash('status', 'Project created Successfully');
                } else {
                    // using request or local session
                    $request->session()->flash('error', 'Unable to Create Project');
                }

                foreach ($files as $file) {
                    $name = date('Y_m_d_his') . $file->getClientOriginalName();
                    $file->move(public_path() . '/images/projects', $name);
                    $project->photos()->create(['name' => $name]);
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
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project_categories = ProductCategory::with(['projects'])->get();
        $popular_projects = Project::inRandomOrder()->limit(5)->get();
        return view('binary.pages.projects.show', compact('project', 'project_categories', 'popular_projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project_categories = ProductCategory::pluck('name', 'id')->all();
        return view('admin.projects.edit', compact('project', 'project_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:80',
                'description' => 'required|string|min:50',
                'project_category' => 'required|numeric',
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
            $inputs['product_category_id'] = $request->get('project_category');
            $inputs['user_id'] = $user->id;

            if ($files = $request->file('photos')) {
                if (($project->photos()->count() >= 6) || (($project->photos()->count() + count($files)) > 4)) {
                    // using request or local session
                    $request->session()->flash('error', 'Project photo has reached maximum of 6');
                    return redirect()->back();
                } else {

                    $project->update($inputs);
                    foreach ($files as $file) {
                        $name = date('Y_m_d_his') . $file->getClientOriginalName();
                        $file->move(public_path() . '/images/projects', $name);
                        $project->photos()->create(['name' => $name]);
                    }
                }
            }

            if ($project->update($inputs))
                Session::flash('status', 'Project updated Successfully');
            else
                Session::flash('error', 'Unable to update project.');
            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    public function search(ProductCategory $product_category)
    {
        $projects = $product_category->projects()->latest()->paginate(6);
        // $admins = User::whereRoleId(1)->orderBy('name', 'DESC')->get();
        // paginate(5);
        // return "here in admin";
        return view('binary.pages.projects.projects', compact('projects'));
    }
}
