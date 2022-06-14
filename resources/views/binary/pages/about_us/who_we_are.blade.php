@extends('binary.master.vicemaster')


@section('content')

<div class="header_page">
  <div class="container">
    <div class="row-fluid">
      <div class="span6">
        <h4 style="color:#009dcd; font-size:20px;">WHO WE ARE</h4>
      </div>
      <div class="breadcrumbss">

        <ul class="page_parents pull-right">
          <li>You are here: </li>
          <li><a href="index.html">Home</a>/</li>

          <li><a href="portfolio_2.html"> Who We Are</a></li>

        </ul>
      </div>

    </div>
  </div>
</div>






<section id="content" class="page-dynamic_template-about2 sequentialchildren  section_last">
  <div class="row-fluid">


    <div class="span12">

      <div class="row-fluid row-dynamic-el " style="">

        <div class="container">

          <div class="row-fluid">

            <div class="span6 dynamic_slideshow">
              <div class="slideshow_container flexslider slide_layout_fixed" id="flex">
                <ul class="slides slide_flexslider">
                  <li class=' slide_element slide1 frame1'
                    data-thumb="{{ asset('images/about_us').'/'.$about->photo }}"><img
                      src="{{ asset('images/about_us').'/'.$about->photo }}" title='misc-4' alt='' style="width: 100%;" /> </li>
                </ul>
                <span class="shadow"></span>
              </div>
              
              
                <!--<div class="row-fluid row-dynamic-el " style="margin-bottom:-30px;">-->

                    <div class="slideshow_container" style="margin: 30px 0;">

                    <div class="row-fluid">
                        
                    <div class="span12 textbar-container ">
                        <div class="textbar">
                            <h2 class=""><span
                                    style="color:#009dcd; font-weight:bold; font-size:inherit;">StaunchedTechnologies</span>
                                is always looking for brilliant & talented people in web to join us</h2>
                            <h4 class=""></h4>
                            
                            <p class="perspective" style="display: inline-block;
                				position: static;
                				margin-top: 22px;"><a class="custom_btn" id="btn_39" style="
                				padding: 12px 31px;
                				background: #009dcd;
                				position: static;
                				margin-top: 22px;
                				font-weight: bold;
                				color: #fff;
				                font-size: 14px;" href="{{ route('careers.create') }}">Apply Now</a></p>
                            <style>
                                #btn_39:after {
                                    background: #0074a7
                                }
                            </style>
                        </div>
                    </div> <!-- tarlent -->
                    </div>
                    </div>
                    <!--</div>-->
                    
                    
            </div>

            <div class="span6 plain_text alignment_left">
              <h2 class="big_title" style="color: rgb(141, 0, 0);">{{ $about->title }}</h2>
              <p class="content" style="color:rgb(0, 0, 0);">{!! $about->content !!}</p>
            </div>




          </div>

        </div>

      </div>


      @include('binary.pages.about_us.about_footer')


        </section>
<a href="#" class="scrollup">Scroll</a>
<!-- Social Profiles -->


<!-- Footer -->
@endsection