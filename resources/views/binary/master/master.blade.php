<!DOCTYPE html>
<html lang="en-US" class="css3transitions">
{{-- Start Header --}}

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content='@yield('description')'>
  
  @yield('metatags')
  <title> @yield('title') | {{ Config('app.name'), 'Staunch Technologies'}} </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="icon" href="{{asset('android-chrome-512x512.png')}}" type="image/png">
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  <!-- login_style -->

  <!-- FONT  BLOCK -->
  @include('binary.includes.header_style.fontblock')
  <!-- FONT BLOCK -->

  <!-- CSS BLOCK -->
  @include('binary.includes.header_style.css_block')
  @yield('styles')
  <!-- CSS BLOCK -->

  <!-- TOP JAVASCRIPTS -->
  @include('binary.includes.header_style.topjs')
  @yield('scripts')
  <!-- TOP JAVASCRIPTS -->

  <style type="text/css" media="screen">
    .qtrans_flag span {
      display: none
    }

    .qtrans_flag {
      height: 12px;
      width: 18px;
      display: block
    }

    .qtrans_flag_and_text {
      padding-left: 20px
    }

    .qtrans_flag_de {
      background: url("{{ asset('asset/content/plugins/qtranslate/flags/de.png')}}") no-repeat
    }

    .qtrans_flag_en {
      background: url("{{ asset('asset/content/plugins/qtranslate/flags/gb.png')}}") no-repeat
    }

    .qtrans_flag_zh {
      background: url("{{ asset('asset/content/plugins/qtranslate/flags/cn.png') }}") no-repeat
    }
  </style>
</head>
<!-- End Header -->

<body class="home blog header_2 fullwidth_slider">
  @include('binary.includes.header_style.top_nav')
  <!-- Header -->
  <div id="page-bg"></div>
  <header id="header" class="header_2">
    <div class="container">
      <div class="row-fluid">
        <div class="span12">
        @php
            $services = App\Models\Service::all();
            $products = App\Models\Product::all();
            $projects = App\Models\Project::all();
        @endphp
        
          <!-- Logo -->
          @include('binary.includes.header_style.logo')
          <!-- #logo -->

          <!-- Menu Section -->
          @include('binary.includes.header_style.menue_section')
          <!-- End Menu #navigation -->
        </div>
      </div>
    </div>
    <span class="shadow"></span>
  </header>
  <div class="top_wrapper">
    <span class="slider-img"></span>
    <section id="slider-fullwidth" class="slider">
      <script type="text/javascript"
        src="{{  asset("asset/content/plugins/LayerSlider/js/layerslider.kreaturamedia.jquery.js?ver=4.0.1") }}">
      </script>
      <script type="text/javascript"
        src="{{  asset("asset/content/plugins/LayerSlider/js/jquery-easing-1.3.js?ver=1.3.0")  }}"></script>
      <script type="text/javascript"
        src="{{  asset("asset/content/plugins/LayerSlider/js/jquerytransit.js?ver=0.9.9")  }}"></script>
      <script type="text/javascript">
        var lsjQuery = jQuery.noConflict();
          lsjQuery(document).ready(function() {
            if(typeof lsjQuery.fn.layerSlider == "undefined") { lsShowNotice('jquery'); }
            else if(typeof jQuery.transit == "undefined" || typeof jQuery.transit.modifiedForLayerSlider == "undefined") { lsShowNotice('transit'); }
            else {
              lsjQuery("#layerslider_6").layerSlider({
                width : '100%',
                height : '460px',
                responsive : true,
                responsiveUnder : 940,
                sublayerContainer : 940,
                autoStart : true,
                pauseOnHover : true,
                firstLayer : 1,
                animateFirstLayer : true,
                randomSlideshow : false,
                twoWaySlideshow : true,
                loops : 0,
                forceLoopNum : true,
                autoPlayVideos : true,
                autoPauseSlideshow : 'auto',
                youtubePreview : 'maxresdefault.jpg',
                keybNav : true,
                touchNav : true,
                skin : 'defaultskin',
                skinsPath : 'public/content/plugins/LayerSlider/skins/',
                globalBGColor : '#efefef',
                navPrevNext : true,
                navStartStop : false,
                navButtons : false,
                hoverPrevNext : true,
                hoverBottomNav : false,
                thumbnailNavigation : 'disabled',
                tnWidth : 100,
                tnHeight : 60,
                tnContainerWidth : '60%',
                tnActiveOpacity : 35,
                tnInactiveOpacity : 100,
                imgPreload : true,
                yourLogo : false,
                yourLogoStyle : 'left: 10px; top: 10px;',
                yourLogoLink : false,
                yourLogoTarget : '_self',
                cbInit : function(element) { },
                cbStart : function(data) { },
                cbStop : function(data) { },
                cbPause : function(data) { },
                cbAnimStart : function(data) { },
                cbAnimStop : function(data) { },
                cbPrev : function(data) { },
                cbNext : function(data) { }
              });
            }
            });
      </script>
      <!-- Layer Slider -->

      @include('binary.includes.header_style.slider')

      <!-- End Layer Slider -->


    </section>
  {{--</div>--}}
  <!-- .content -->
  <main class="row-fluid" style="margin: 150px 0 !important;">
    @yield('content')
  </main>


  <!-- Footer -->
  @include('binary.includes.Footer_style.footer')


    <!-- BOTTOM JAVASCRIPTS -->
    @include('binary.includes.header_style.javascript')
    <!-- BOTTOM JAVASCRIPTS -->
</body>

</html>