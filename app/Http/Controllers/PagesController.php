<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\HomePage;
use App\Models\MissionVision;
use App\Models\OurSkill;
use App\Models\Policy;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
//child theme(homepage)
    public function index()
    {
        //parse value to the page template
        $title="Welcome to the technology world";
        $skills = OurSkill::all();
        $homepage = HomePage::first();

        $projects = Project::with(['user', 'category', 'photos'])->get();
        //show the values in index.blade.php
        return view('binary.pages.home', compact('title', 'skills', 'homepage', 'projects'));
    }   

    public function StaunchXcel()
    {
        return view('binary.pages.products.staunch_xcel');
    }

    public function Staunch_EMS()
    {
        return view('binary.pages.products.staunch_ems');
    }

    public function Message_Man()
    {
        return view('binary.pages.products.message_man');
    }

    public function Staunch_Sim()
    {
        return view('binary.pages.products.staunch_sim');
    }
//services pages controllers

    public function Services()
    {
        return view('binary.pages.services.services');
    }


    public function E_Business_Consult()
    {
        return view('binary.pages.services.e_business_Consulting');
    }

    public function Website_Webapp_Dev()
    {
        return view('binary.pages.services.website_&webapp_dev');
    }

    public function Mobile_App_Dev()
    {
        return view('binary.pages.services.mobile_app_dev');
    }

    public function Domain_Hosting()
    {
        return view('binary.pages.services.domain_&hosting');
    }

    public function Digital_Marketing()
    {
        return view('binary.pages.services.digital_marketing');
    }

    public function Social_Media_Mgmt()
    {
        return view('binary.pages.services.social_media_mgmt');
    }

 //Project pages controller 
    public function Projects()
    {
     return view('binary.pages.projects.projects');
    }

    public function Project_page1()
    {
     return view('binary.pages.projects.project_page1');
    }

    public function Project_page2()
    {
     return view('binary.pages.projects.project_page2');
    }
    
    public function Project_page3()
    {
     return view('binary.pages.projects.project_page3');
    }

    public function Project_page4()
    {
     return view('binary.pages.projects.project_page4');
    }

//contact pages controller
    public function Contact()
    {    //parse value to the page using with
    $contact = ContactUs::first();
    return view('binary.pages.contact')->with('contact', $contact);
    }

    //searchdomain widget 
    public function Search_Domain()
    {    //parse value to the page using with
    $title="Welcome to Staunch, The Number one expert In Tech In Niger";
    return view('binary.pages.searchdomain_widget')->with('title', $title);
    }


   


//about-us pages controllers
 
   public function About_Us()
   { 
   return view('binary.pages.about_us.about_us');
   }   

   public function Mission_And_Vision()
   { 
    $missionVision = MissionVision::first();
   return view('binary.pages.about_us.mission_and_vision', compact('missionVision'));
   }   

   public function Our_Policy()
   { 
       $policy = Policy::first();
    return view('binary.pages.about_us.our_policy', compact('policy'));
   }   

   public function Who_We_Are()
   { 
    return view('binary.pages.about_us.who_we_are');
   }   

   
//Clientele pages controllers
 
public function Clientele()
{
        $clients = User::where('role_id', 2)->with('subscriptions', 'role', 'photos')->paginate(6);
        return view('binary.pages.clientele', compact('clients'));
}   





    


    public function Services1()
    {    //parse value to the page using with
        $title="Welcome to Staunch, The Number one expert In Tech In Niger";
        return view('binary.Pages.Services')->with('title', $title);
    }



    public function Products1()
    {//parsing area in our template
        $data= array(
            'title'=> 'the products we offer'
        );
        return view('Pages.Products')->with($data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
