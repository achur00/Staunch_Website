@extends('binary.master.vicemaster')
@section('title')
Services
@endsection
@section('content')

<div class="header_page">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h4 style="color:#009dcd; font-size:25px;">OUR SERVICES</h4>
            </div>
            <div class="breadcrumbss">

                <ul class="page_parents pull-right">
                    <li>You are here: </li>
                    <li><a href="{{ url('/') }}">Home</a>/</li>

                    <li><a href="{{ url('services') }}">Services</a></li>

                </ul>
            </div>

        </div>
    </div>
</div>




<section id="content" class="page-dynamic_template-services sequentialchildren  ">
    <div class="row-fluid">


        <div class="span12">

            <div class="row-fluid row-dynamic-el  third_space" style="">

                <div class="container">

                    <div class="row-fluid">

                        <div class="span12 dynamic_page_header" style="">
                            <h2 style="color:rgb(0, 0, 0);"><span
                                    style="font-weight:300; font-size:28px; color:rgb(0, 0, 0); "><span
                                        style="color:#009dcd; font-weight:bold; font-size:inherit;">Subscribe
                                    </span> TO Our Impeccable Services</span></h2>
                            <p class="no_border" style="color:#969ba2;"></p>
                            <div class="btns"></div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="row-fluid row-dynamic-el " style="">

                <div class="container">

                    <div class="row-fluid">

                        <div class="divider__"></div>

                    </div>

                </div>

            </div>

            <div class="row-fluid row-dynamic-el " style="margin-top:-30px;">

                <div class="container">

                    <div class="row-fluid">

                        <div class="span12 services_group">
                            <div class="row-fluid">
                                {{--<div class="span3 left_desc">--}}
                                <h6>STAUNCH TECHNOLOGIES</h6>
                                <p style="font-size:15px;">provides a wide range of <span
                                        style="color:#8d0000;; font-weight:bold; font-size:20px;">Hosting
                                        Solutions</span>. We offer Shared Server, Dedicated Server and VPS hosting on
                                    both Windows and Linux Platforms. For a detailed break down on our Hosting and
                                    Domain services, click on the Hosting or Domain navigationsplease contact our
                                    support.</p>

                                We also render other Technology based services which include: e-Business Consulting,
                                Website Design, Online Marketing and IT Support Services.

                            </div>


                            <div class="span12 services_group"></div>
                            <div class="span12 services_group"></div>



                            {{--<div class="span9">
                                    <dl class="dl-horizontal">
                                        <dt><i class="moon-screen"></i></dt>
                                        <dd>
                                            <h5>Responsive & Retina</h5>
                                            <p>Lorem ipsum dolor sit amet sed, consectetur. Ut rutrum auctor orci, sed
                                                malesuada sapien faucibus ac.</p>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><i class="moon-file-2"></i></dt>
                                        <dd>
                                            <h5>Page Builder</h5>
                                            <p>Lorem ipsum dolor sit amet sed, consectetur. Ut rutrum auctor orci, sed
                                                malesuada sapien faucibus ac.</p>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><i class="moon-palette"></i></dt>
                                        <dd>
                                            <h5>Easy Theme Options</h5>
                                            <p>Lorem ipsum dolor sit amet sed, consectetur. Ut rutrum auctor orci, sed
                                                malesuada sapien faucibus ac.</p>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><i class="moon-user"></i></dt>
                                        <dd>
                                            <h5>Excellent Support</h5>
                                            <p>Lorem ipsum dolor sit amet sed, consectetur. Ut rutrum auctor orci, sed
                                                malesuada sapien faucibus ac.</p>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><i class="moon-star"></i></dt>
                                        <dd>
                                            <h5>5 Star Documentation</h5>
                                            <p>Lorem ipsum dolor sit amet sed, consectetur. Ut rutrum auctor orci, sed
                                                malesuada sapien faucibus ac.</p>
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt><i class="moon-paint-format"></i></dt>
                                        <dd>
                                            <h5>Frequently Updates</h5>
                                            <p>Lorem ipsum dolor sit amet sed, consectetur. Ut rutrum auctor orci, sed
                                                malesuada sapien faucibus ac.</p>
                                        </dd>
                                    </dl>--}}



                        </div>
                    </div>

                </div>

            </div>

        </div>






        @include('binary.pages.services.services_widget')




        <div class="row-fluid row-dynamic-el " style="margin: 1rem 0 4rem;">

            <div class="container">
                <div class="header">
                    <dl class="dl-horizontal">
                        <dt style="display:none"></dt>
                        <dd style="margin-left:0px">

                            <h4>SKills</h4>
                        </dd>
                    </dl>

                    {{-- <div class="pagination">
                          <a href="#" class="prev" title="Previous"><i class="moon-arrow-left"></i></a><a href="#" class="next"
                            title="Next">
                            <i class="moon-arrow-right-2"></i>
                          </a>
                        </div>--}}
                </div>
                <div class="row-fluid">

                    @if($skills)
                    @foreach ( $skills as $skill)
                    <div class="span3 chart_skill animate_onoffset start_animation">
                        <div class="chart easyPieChart" data-percent="{{ $skill->percentage }}%"
                            style="color: rgb(0, 157, 205); width: 144px; height: 144px; line-height: 144px;">
                            {{ $skill->percentage }}<canvas width="144" height="144"></canvas></div><span
                            class="new_color">#009dcd</span>
                        <h4>{{ $skill->name }}</h4>
                        {{-- <p>Lorem ipsum dolor onsectetuer adipiscing elit. Aene commodo ligula eget dolor, aenean ....
                            </p> --}}
                    </div>
                    @endforeach
                    @endif

                </div>

            </div>

        </div>




        <div class="row-fluid row-dynamic-el " style="margin-bottom:-100px;">

            <div class="container">

                <div class="row-fluid">

                    <div class="span12 textbar-container ">
                        <div class="textbar">
                            <h2 class=""><span
                                    style="color:#009dcd; font-weight:bold; font-size:inherit;">StaunchedTechnologies</span>
                                is always looking for brilliant & talented people in web to join us</h2>
                            <h4 class=""></h4>
                            <p class="perspective"><a class="custom_btn" id="btn_39" style="
				padding: 12px 31px;
				background: #009dcd;
				
				font-weight: bold;
				color: #fff;
				font-size: 14px; 
			       float:left;" href="#">Apply Now</a></p>
                            <style>
                                #btn_39:after {
                                    background: #0074a7
                                }
                            </style>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    </div>
</section>
<a href="#" class="scrollup">Scroll</a>
<!-- Social Profiles -->




@endsection