<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="software development, digital marketing, social media managements">
    <meta name="author" content="Saad Saheed | Staunch Technologies">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <meta name="keywords" content="Staunch Technologies Website">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Staunch Technologies">
    <meta itemprop="description" content="Staunch Technologies">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('android-chrome-512x512.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/vendor/%40fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">

    @yield('links')

    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('/css/argon.min5438.css?v=1.2.0')}}" type="text/css">

    {{-- <!--google Ads-->
    <script data-ad-client="ca-pub-6105024932951977" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}

    <style>
        /* these styles will animate bootstrap alerts. */
        .alert {
            z-index: 2000 !important;
            top: 60px;
            right: 18px;
            min-width: 30%;
            position: fixed;
            animation: slide 0.5s forwards;
        }

        @keyframes slide {
            100% {
                top: 30px;
            }
        }

        @media screen and (max-width: 668px) {
            .alert {
                /* center the alert on small screens */
                left: 10px;
                right: 10px;
            }
        }

        main>.container:first-child {
            margin-top: 7em !important;
            margin-bottom: 7em !important;
        }
    </style>

</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  d-flex  align-items-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{  asset("asset/content/images/all/07/logo_staunch.png")  }}" class="navbar-brand-img"
                        alt="...">
                    {{-- <span
                        class="h1 mr-3 text-orange font-weight-bold text-capitalize">Staunch</span> --}}
                </a>
                <div class=" ml-auto ">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}" data-toggle="" role="button"
                                aria-expanded="false" aria-controls="navbar-dashboards">
                                <i class="ni ni-compass-04 text-danger"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        @if (Auth::user()->role_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-users" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-users">
                                <i class="ni ni-single-02 text-primary"></i>
                                <span class="nav-link-text">Users</span>
                            </a>
                            <div class="collapse" id="navbar-users">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('users.index')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> AU </span>
                                            <span class="sidenav-normal"> All User </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('users.create')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> CU </span>
                                            <span class="sidenav-normal"> Create User </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-departments" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-departments">
                                <i class="ni ni-building text-orange"></i>
                                <span class="nav-link-text">Products</span>
                            </a>
                            <div class="collapse" id="navbar-departments">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('product.category.index')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> PC </span>
                                            <span class="sidenav-normal"> Product Categories </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('products.index')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> VP </span>
                                            <span class="sidenav-normal"> View Products </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('products.create')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> CP </span>
                                            <span class="sidenav-normal"> Create Product </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-courses" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-courses">
                                <i class="ni ni-collection text-info"></i>
                                <span class="nav-link-text">Services</span>
                            </a>
                            <div class="collapse" id="navbar-courses">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('service.category.index')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> SC </span>
                                            <span class="sidenav-normal"> Service Categories </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('services.index')}}" class="nav-link">
                                            <span class="sidenav-mini-icon"> VS </span>
                                            <span class="sidenav-normal"> View Services </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('services.create')}}" class="nav-link">
                                            <span class="sidenav-mini-icon"> CS </span>
                                            <span class="sidenav-normal"> Create Services </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-lessons" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-lessons">
                                <i class="ni ni-book-bookmark text-danger"></i>
                                <span class="nav-link-text">Subscriptions</span>
                            </a>
                            <div class="collapse" id="navbar-lessons">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('subscriptions.index')}}" class="nav-link">
                                            <span class="sidenav-mini-icon"> AS </span>
                                            <span class="sidenav-normal"> All Subscription </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href=" {{route('subscriptions.create')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> CS </span>
                                            <span class="sidenav-normal"> Create Subscription </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            {{-- {{route('lessons.index')}} --}}
                                            <span class="sidenav-mini-icon"> VT </span>
                                            <span class="sidenav-normal"> View Transaction </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-assignments" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-assignments">
                                <i class="ni ni-books text-green"></i>
                                <span class="nav-link-text">Payment Plan</span>
                            </a>
                            <div class="collapse" id="navbar-assignments">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href=" {{route('paymentplan.index')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> MPP </span>
                                            <span class="sidenav-normal"> Manage Payment Plan </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-examples">
                                <i class="fa fa-money-check-alt text-orange"></i>
                                <span class="nav-link-text">Pricing Plan</span>
                            </a>
                            <div class="collapse" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('pricing.index')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> MPP </span>
                                            <span class="sidenav-normal"> Manage Pricing Plan </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-career" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-briefcase-24 text-orange"></i>
                                <span class="nav-link-text">Careers</span>
                            </a>
                            <div class="collapse" id="navbar-career">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('careers.index')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> AP </span>
                                            <span class="sidenav-normal"> Applications </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('career.info.show')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> CI </span>
                                            <span class="sidenav-normal"> Career Info </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-pm" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-settings-gear-65 text-dark"></i>
                                <span class="nav-link-text">Page Management</span>
                            </a>
                            <div class="collapse" id="navbar-pm">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('homepage.index') }}" class="nav-link">

                                            <span class="sidenav-mini-icon"> HP </span>
                                            <span class="sidenav-normal"> Home Page </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('about.index')}}" class="nav-link">
                                            <span class="sidenav-mini-icon"> WWA </span>
                                            <span class="sidenav-normal"> Who We Are </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('workprocess.index')}}" class="nav-link">
                                            <span class="sidenav-mini-icon"> WP </span>
                                            <span class="sidenav-normal"> Work Process </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('skills.index')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> OS </span>
                                            <span class="sidenav-normal"> Our Skill </span>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="{{route('missionvision.index')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> MS </span>
                                            <span class="sidenav-normal"> Mission & Vision </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('policy.index')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> TM </span>
                                            <span class="sidenav-normal"> Terms </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('projects.index') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> PJ </span>
                                            <span class="sidenav-normal"> Projects </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('clients.index') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> CT </span>
                                            <span class="sidenav-normal"> Clientele </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('contact.index')}}" class="nav-link">

                                            <span class="sidenav-mini-icon"> CU </span>
                                            <span class="sidenav-normal"> Contact US </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        @else
                        {{-- <li class="nav-item">
                    <a class="nav-link" href="#navbar-blogs" data-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="navbar-blogs">
                        <i class="ni ni-collection text-orange"></i>
                        <span class="nav-link-text">Blogs</span>
                    </a>
                    <div class="collapse" id="navbar-blogs">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    {{route('blog.index')}}
                        <span class="sidenav-mini-icon"> MB </span>
                        <span class="sidenav-normal"> My Blog </span>
                        </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{route('blog.create')}}
                                <span class="sidenav-mini-icon"> CB </span>
                                <span class="sidenav-normal"> Create Blog </span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                {{route('blog.allpost')}}
                                <span class="sidenav-mini-icon"> VB </span>
                                <span class="sidenav-normal"> View Blog </span>
                            </a>
                        </li>
                    </ul>
                </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#navbar-dashboards2" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-dashboards2">
                        <i class="ni ni-badge text-primary"></i>
                        <span class="nav-link-text">Reports</span>
                    </a>
                    <div class="collapse" id="navbar-dashboards2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    {{route('activity.index')}}
                                    <span class="sidenav-mini-icon"> MR </span>
                                    <span class="sidenav-normal"> My Reports </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    {{route('activity.create')}}
                                    <span class="sidenav-mini-icon"> LR </span>
                                    <span class="sidenav-normal"> Log Report </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-examples3" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="ni ni-ungroup text-orange"></i>
                        <span class="nav-link-text">Quizzes</span>
                    </a>
                    <div class="collapse" id="navbar-examples3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    {{route('quizresponse.index')}}
                                    <span class="sidenav-mini-icon"> MQ </span>
                                    <span class="sidenav-normal"> MY Quiz Responses </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    {{route('quiz.today')}}
                                    <span class="sidenav-mini-icon"> TQ </span>
                                    <span class="sidenav-normal"> Today's Quiz </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" data-toggle=""
                        role="button" aria-expanded="false" aria-controls="navbar-dashboards">
                        <i class="ni ni-user-run text-primary"></i>
                        <span class="nav-link-text">{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>


                </ul>


            </div>
        </div>
        </div>
    </nav>


    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar sticky-top navbar-top navbar-expand navbar-dark bg-gradient-red border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <h1 class="text-white">Staunch Technologies</h1>

                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav align-items-center d-none d-lg-flex">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle bg-white text-dark font-weight-bold">
                                        <?php
                                            $name = Auth::user()->name;
                                            $arr = explode(' ', $name);
                                            if(count($arr) > 1)
                                            $initial = $arr[0][0]. $arr[1][0];
                                            else
                                            $initial = $arr[0][0];
                                        ?>
                                        {{ Str::upper($initial) }}
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span
                                            class="mb-0 text-sm font-weight-bold">{{ Str::limit(ucwords(Auth::user()->fullname), 15) }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="" class="dropdown-item">
                                    {{-- {{route('user.show', Auth::user()->id)}} --}}
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <a href="" class="dropdown-item">
                                    {{-- {{route('user.edit', Auth::user()->id)}} --}}
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="ni ni-user-run"></i>
                                    <span>{{ __('Logout') }}</span>
                                </a>
                                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                                </form> --}}

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--end topnav-->


        @yield('content')


        <div class="container-fluid mt-6">

            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; {{date('Y')}} <a href="https://staunchtechnologies.com" class="font-weight-bold ml-1"
                                target="_blank">Staunch Technologies</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://staunchtechnologies.com" class="nav-link" target="_blank">Staunch
                                    Technologies</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/about_us') }}" class="nav-link">About Us</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="http://blog.creative-tim.com/" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link"
                                    target="_blank">License</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </footer>
        </div>

        {{-- Success Alert --}}
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="z-index: 150;">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        {{-- Error Alert --}}
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="z-index: 150;">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <script>
            //close the alert after 3 seconds.
          
           window.addEventListener('load', function(){
               let al = document.querySelector('.alert');            
               setTimeout(function() {
                   (al) ? (al.style.display = "none") : '';                
               }, 5000);
         });
        
           // $(document).ready(function(){
         // setTimeout(function() {
         //     $(".alert").alert('close');
         // }, 3000);
         // });
           
        </script>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{asset('/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <!-- Optional JS -->

    @yield('jslinks')

    <!-- Argon JS -->
    <script src="{{asset('/js/argon.min5438.js?v=1.2.0')}}"></script>

    @yield('js_after')
</body>

</html>