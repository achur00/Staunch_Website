
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
                                        style="color:#009dcd; font-weight:bold; font-size:inherit;">Join
                                    </span> Our Bootcamp Starting This July</span></h2>
                            <p class="no_border" style="color:#969ba2;"></p>
                            <div class="btns"></div>
                        </div>

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
                                {{$service->description;}}
                                @foreach($courses as $course)
                                {{$course->last_name;}}
                                
                                @endforeach

                                {{-- @foreach($sessions as $session)
                                {{$session->students}}
                                @endforeach --}}


                            

                            </div>


                            


                            
                                
                            
                                
                            <h2 style="text-align:center; margin:5% 10% -3% 10%;font-weight:300; font-size:25px; color:rgb(0, 0, 0);"> <span style="color:#009dcd; font-weight:bold; font-size:inherit;">Web App</span> Development</h2>

                                <section id="content" class="page-dynamic_template-price_table sequentialchildren  ">
                                    
                                    @foreach ($courses as $course)
                                            <div class="span4"><div class="price_container"><div class="price_box"><div class="title">{{ $course->course_name }}</div><div class="price">₦{{  $course->course_price  }}<sup>00</sup></div><ul><li style="margin:0%,10%,10%,10%;">
                                                {{-- <div><h3>Topics</h3></div> --}}
                                                @foreach($course->curriculum as $curriculum)
                                                <p>{{ $curriculum }}</p>
                                            @endforeach</li>
                                            <li><h4>{{ $course->course_duration }} duration </h4></li>
                                            </ul><div class="footer"><p class="perspective"><a class="custom_btn" id="btn_69" style="
                                            padding: 12px 31px;
                                            background: #009dcd;
                                            
                                            font-weight: bold;
                                            color: #fff;
                                            font-size: 14px; 
                                            float:left;" 
                                            href="#">Enroll  Now</a></p><style>#btn_69:after{background:#0074a7}</style></div></div></div></div>
                                @endforeach

                                
                                          </div>
                                
                                        </div>
                                
                                      </div>                
                                    </div>
                                    
                                  </div>

                                  
                                </section>



                        {{--  --}}

<div class="container">
    <h2 style="text-align:center; margin:5% 10% -3% 10%;font-weight:300; font-size:25px; color:rgb(0, 0, 0);"> <span style="color:#009dcd; font-weight:bold; font-size:inherit;">Mobile App</span> Development</h2>

                        <section id="content" class="page-dynamic_template-price_table sequentialchildren  ">
                                  
                            @foreach ($mobiles as $mobile)
                                    <div class="span4"><div class="price_container"><div class="price_box"><div class="title">{{ $mobile->course_name }}</div><div class="price">₦{{  $mobile->course_price  }}<sup>00</sup></div><ul><li style="margin:0%,10%,10%,10%;">
                                        {{-- <div><h3>Topics</h3></div> --}}
                                        @foreach($mobile->curriculum as $curriculum)
                                        <p>{{ $curriculum }}</p>
                                    @endforeach</li>
                                    <li><h4>{{ $course->course_duration }} duration </h4></li>
                                    </ul><div class="footer"><p class="perspective"><a class="custom_btn" id="btn_69" style="
                                    padding: 12px 31px;
                                    background: #009dcd;
                                    
                                    font-weight: bold;
                                    color: #fff;
                                    font-size: 14px; 
                                    float:left;" 
                                    href="#">Enroll  Now</a></p><style>#btn_69:after{background:#0074a7}</style></div></div></div></div>
                        @endforeach
                                  </div>
                        
                                </div>
                        
                              </div>                
                            </div>
                            
                          </div>
                        </section>
                    </div>



















                            <div class="span12 services_group"></div>
                            <div class="span12 services_group"></div>



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




        
<a href="#" class="scrollup">Scroll</a>
<!-- Social Profiles -->






      
   


<a href="#" class="scrollup">Scroll</a> 
<!-- Social Profiles -->










@endsection