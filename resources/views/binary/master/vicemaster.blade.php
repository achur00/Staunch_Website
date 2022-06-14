<!DOCTYPE html>
<html lang="en-US" class="css3transitions">
{{-- Start Header --}}

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('title') | {{ Config('app.name'), 'Staunch Technologies'}} </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="icon" href="{{asset('android-chrome-512x512.png')}}" type="image/png">
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

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
      background: url('asset/content/plugins/qtranslate/flags/de.png') no-repeat
    }

    .qtrans_flag_en {
      background: url("asset/content/plugins/qtranslate/flags/de.png") no-repeat
    }

    .qtrans_flag_zh {
      background: url('asset/content/plugins/qtranslate/flags/cn.png') no-repeat
    }
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
        
        .post_page_cont #widget_contact_info-2 ul, aside ul, .h-social ul{
            list-style-type: none !important;
            padding-left: 0;
        }
        .post_page_cont #widget_contact_info-2 ul li{
            margin-bottom: 15px;
        }
        .post_page_cont #widget_contact_info-2 ul li a{
            line-height: 20px;
            padding-top: 10px;
            padding-bottom: 5px;
            padding-right: 15px;
            color: #d02424;
        }
        .h-social{
            margin-top: 35px;
        }
        .h-social ul{
            display: flex;
            justify-content: space-between;
            flex-flow: row wrap;
        }

  </style>
</head>
<!-- End Header -->

<body class="home blog header_2 fullwidth_slider single single-post postid-27 single-format-gallery">
  @include('binary.includes.header_style.top_nav')
  <!-- Header -->
  <div id="page-bg"></div>
  <header id="header" class="header_2">
    <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <!-- Logo -->
          @include('binary.includes.header_style.logo')
          <!-- #logo -->
            @php
                $services = App\Models\Service::all();
                $products = App\Models\Product::all();
                $projects = App\Models\Project::all();
            @endphp
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
        src={{  asset("asset/content/plugins/LayerSlider/js/layerslider.kreaturamedia.jquery.js?ver=4.0.1")  }}>
      </script>
      <script type="text/javascript"
        src={{  asset("asset/content/plugins/LayerSlider/js/jquery-easing-1.3.js?ver=1.3.0")  }}></script>
      <script type="text/javascript"
        src={{  asset("asset/content/plugins/LayerSlider/js/jquerytransit.js?ver=0.9.9")  }}></script>
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



      <!-- End Layer Slider -->

    </section>
  {{-- </div> --}}
  <!-- .content -->

  <main class="row-fluid" style="margin: 0 0 100px 0 !important;">
    @yield('content')
  </main>


  <!-- Footer -->
  @include('binary.includes.Footer_style.footer')


  <!-- JAVASCRIPTS -->
  @include('binary.includes.header_style.javascript')
  <!-- JAVASCRIPTS -->
</body>

</html>