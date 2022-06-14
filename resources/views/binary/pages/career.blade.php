<?php $currentPage = 'contact';?>

@extends('binary.master.vicemaster')

@section('scripts')
<script type="text/javascript" defer src="{{  asset('content/js/switcher.js') }}"></script>
@endsection

@section('title')
contact
@endsection

@section('content')

<section id="content" class="page-dynamic_template-contactpa sequentialchildren section_first ">
    <div class="row-fluid">


        <div class="span12">

            <div class="row-fluid row-dynamic-el " style="margin-top: 80px; margin-bottom:-100px;">

                <div class="container">

                    <div class="row-fluid" style="">

                        <div class="span8 contact_form" style="float: none; margin-right: auto; margin-left: auto;">
                            <div class="header">
                                <dl class="dl-horizontal">
                                    <dt><i class="moon-pen-5"></i></dt>
                                    <dd style="margin-left: 55px !important; margin-top:10px;">

                                        <h4>Apply for a Role</h4>
                                    </dd>
                                </dl>
                            </div>

                            <div class="themeple_sc">
                                <div class="header">
                                    <h3>All field with (<span
                                        style="color:#f00">*</span>) are required</h3>
                                    {{-- <h3>Application Form</h3><span class="border_style_color"></span> --}}
                                </div>
                            </div>
                            <div class="tabbable  ">
                                <ul class="nav nav-tabs">
                                    <li class=""><a href="#tab1" data-toggle="tab">Career Information</a></li>
                                    <li class="active"><a href="#tab2" data-toggle="tab">Application Form</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab1" style="font-size: 1rem;">{!! $careerinfo->info ?? "" !!}</div>
                                    <div class="tab-pane active" id="tab2">
                                        <div class="row-fluid">

                                            <div class="span12">
                                                <form name="contactForm" class="standard-form row-fluid"
                                                    action="{{ route('careers.store') }}" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="">
                                                        <label for="name">Full Name<span
                                                            style="color:#f00">*</span></label>
                                                        @error('name')
                                                        <span class="" style="display: block; color:#f00" role="alert">
                                                            <strong class="text-error">{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <input class="span12" name="name" placeholder="Full Name"
                                                            type="text" id="themeple_name" value="{{ old('name') }}" />
                                                    </div>

                                                    <div class="">
                                                        <label for="email">E-Mail<span
                                                            style="color:#f00">*</span></label>
                                                        @error('email')
                                                        <span class="" style="display: block; color:#f00" role="alert">
                                                            <strong class="text-error">{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <input class="span12" name="email" placeholder="E-Mail"
                                                            type="text" id="themeple_e-mail" value="{{ old('email') }}" />
                                                    </div>

                                                    <div class="">
                                                        <label for="phone">Phone Number<span
                                                            style="color:#f00">*</span></label>
                                                        @error('phone')
                                                        <span class="" style="display: block; color:#f00" role="alert">
                                                            <strong class="text-error">{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <input class="span12" name="phone" placeholder="Phone Number"
                                                            type="text" id="themeple_e-mail" value="{{ old('phone') }}" />
                                                    </div>

                                                    <div class="">
                                                        <label for="gender">Gender<span
                                                            style="color:#f00">*</span></label>
                                                        @error('gender')
                                                        <span class="" style="display: block; color:#f00;" role="alert">
                                                            <strong class="text-error">{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <select name="gender" class="span12" id="gender">
                                                            <option value="">Choose Gender</option>
                                                            <option value="male" {{ (old('gender') == "male") ? "selected" : "" }}>Male</option>
                                                            <option value="female" {{ (old('gender') == "female") ? "selected" : "" }}>Female</option>
                                                        </select>
                                                    </div>

                                                    <div class="">
                                                        <label for="skills">Your Skills<span
                                                            style="color:#f00;">*</span></label>
                                                        @error('skills')
                                                        <span class="" style="display: block; color:#f00;" role="alert">
                                                            <strong class="text-error">{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <input class="span12" name="skills"
                                                            placeholder="Your Skills (e.g php,mysql,laravel)"
                                                            type="text" id="themeple_skills" value="{{ old('skills') }}" />
                                                    </div>


                                                    <div class="">
                                                        <label for="cv">Upload CV<span
                                                                style="color:#f00">*</span></label>
                                                        @error('cv')
                                                        <span class="" style="display: block; color:#f00" role="alert">
                                                            <strong class="text-error">{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <input class="span12"
                                                            style="padding: 4px; border: 1px solid #EBEBEB" name="cv"
                                                            placeholder="Upload Your CV" type="file" id="themeple_cv"
                                                            value="" />
                                                    </div>


                                                    <div class="">
                                                        <label for="website">Your Website</label>
                                                        @error('website')
                                                        <span class="" style="display: block; color:#f00" role="alert">
                                                            <strong class="text-error">{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <input type="text" class="span12" placeholder="Your Website"
                                                            name="website" id="themeple_website" />
                                                    </div>



                                                    <p class="perspective"><input type="submit" value="Submit"
                                                            class="custom_btn" /></p>
                                                </form>
                                                <div id="ajaxresponse"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <p>&nbsp;</p>
                           
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<a href="#" class="scrollup">Scroll</a>
<!-- Social Profiles -->


<!-- Footer -->
</div>
{{-- Success Alert --}}
@if(session('status'))
<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a><strong></strong>
    {{session('status')}}</div>
@endif

{{-- Error Alert --}}
@if(session('error'))
<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">&times;</a><strong></strong>
    {{session('error')}}</div>
@endif

<script>
    //close the alert after 3 seconds.
          
           window.addEventListener('load', function(){
               let al = document.querySelector('.alert');            
               setTimeout(function() {
                   (al) ? (al.style.display = "none") : '';                
               }, 5000);
             });
        
</script>
@endsection