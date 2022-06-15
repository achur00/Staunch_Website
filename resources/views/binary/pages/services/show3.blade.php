@extends('binary.master.vicemaster')
@section('title')
Services
@endsection
@section('content')

<div class="header_page">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h4 style="color:#009dcd; font-size:25px;">{{$service->name }}</h4>
            </div>
            <div class="breadcrumbss">

                <ul class="page_parents pull-right">
                    <li>You are here: </li>
                    <li><a href="{{ url('/') }}">Service</a>/</li>

                    <li><a href="{{ url('services') }}">{{$service->name}}</a></li>

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
                                    </span> To Our Impeccable Services</span></h2>
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
                               
                                <h6>STAUNCH TECHNOLOGIES</h6>
                                <p>{{$service->description}}</p>

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






        {{-- @include('binary.pages.services.services_widget') --}}




        <div class="row-fluid row-dynamic-el " style="margin: 1rem 0 4rem;">

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
			       float:left;" href="{{ route('careers.create') }}">Apply Now</a></p>
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