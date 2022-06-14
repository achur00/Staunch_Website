@extends('binary.master.master')
{{-- @extends('layouts.app') --}}
@section('title')
{{ $homepage->title ?? "Home" }}
@endsection

@section('description')
{{ $homepage->description ?? "Staunch Technologies website" }}
@endsection

@section('metatags')
{!! $homepage->metatags ?? "" !!}
@endsection


@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')

@include('binary.includes.searchdomain_widget')



<!--<section id="content" class="page-dynamic_template-home sequentialchildren  ">
    <div class="row-fluid">
     <div class="span12">
      <div class="row-fluid row-dynamic-el " style="">
        <div class="container">
          <div class="row-fluid">
            <div class="span12 plain_text alignment_center"><h1 class="big_title" style="color:rgba(68,68,68);"><span style="font-weight:300; font-size:28px; color:#888; ">We provide you <span style="color:#009dcd; font-weight:bold; font-size:inherit;">the solution to all your tech needs</span> and more.  <br />Today more than ever, you must have a stunning user experience.</span></h1><p class="content"  style="color:#969ba2;"></p></div>
          </div>
        </div>
      </div>
      <div class="row-fluid row-dynamic-el " style="">
        <div class="container">
          <div class="row-fluid">
            <div class="divider__"></div>
          </div>
        </div>
      </div>-->


@include('binary.pages.services.services_widget')

<div class="row-fluid row-dynamic-el " style="">

  <div class="container">

    <div class="row-fluid">

      <div class="span8 latest_blog">
        <div class="header">
          <dl class="dl-horizontal">
            <dt><i class="moon-reading"></i></dt>
            <dd style="margin-left:55px !important; margin-top:10px;">
              <h4>project</h4>
            </dd>
          </dl>
          <div style="padding-top:13px;" class="pagination"><a href="#" class="prev" title="Previous"
              style="display: block;"><i class="moon-arrow-left"></i></a><a href="#" class="next" title="Next"
              style="display: block;"><i class="moon-arrow-right-2"></i></a></div>
        </div>
        <div class="row">
          <div class="span12">
            <div class="caroufredsel_wrapper"
              style="display: block; text-align: start; float: left; position: relative; inset: 0px; z-index: auto; width: 746px; height: 400px; margin: 0px; overflow: hidden;">
              <ul class="carousel carousel_blog"
                style="text-align: left; float: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; width: 2984px; height: 400px; z-index: auto;">

                @if($projects)
                @foreach ($projects as $project)
                <li class="blog-article  active">
                  <div class="row-fluid">
                    <div class="span12">
                      <div class="media" style="height: 228.78%;"><img
                          src="{{ asset('images/projects').'/'.$project->photos[0]->name }}" alt="" style="height: 100%;">
                      </div>
                    </div>
                  </div>
                  <dl class="dl-horizontal">
                    <dt>
                      <div class="dt"><span class="date">{{ $project->created_at->format('d') }}</span><span
                          class="month">{{ $project->created_at->format('M') }}</span><span
                          class="year">{{ $project->created_at->format('y') }}</span></div>
                      <div class="icon_"><i class="moon-pencil"></i></div>
                    </dt>
                    <dd>
                      <h3><a href="{{ route('project.details', $project) }}">{{ Str::limit($project->name, 20) }}</a>
                      </h3>
                      <div class="blog-content">{!! Str::limit($project->description, 150) !!}</div>
                    </dd>
                  </dl>
                  {{-- <div class="info">
                    <ul>
                      <li class="user">admin</li>
                      <li class="comment">0 Comments</li>
                    </ul>
                  </div> --}}
                </li>
                @endforeach
                @endif

                {{-- <li class="blog-article  ">
                  <div class="row-fluid">
                    <div class="span12">
                      <div class="media"><img
                          src="{{ asset('asset/content/images/all/07/photo211-825x550-540x350.jpg') }}" alt="">
            </div>
          </div>
        </div>
        <dl class="dl-horizontal">
          <dt>
            <div class="dt"><span class="date">11</span><span class="month">Sep</span><span class="year">all</span>
            </div>
            <div class="icon_"><i class="moon-pencil"></i></div>
          </dt>
          <dd>
            <h3><a href="index57e7.html">Staunch EMS</a></h3>
            <div class="blog-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
              vehicula feugiat blandit. Nulla facilisi. Nulla tellus... </div>
          </dd>
        </dl>

        <div class="info">
          <ul>
            <li class="user">admin</li>
            <li class="comment">0 Comments</li>
          </ul>
        </div>

        </li>
        <li class="blog-article  ">
          <div class="row-fluid">
            <div class="span12">
              <div class="media"><img
                  src="{{ asset('asset/content/images/all/07/shutterstock_82478056-960x430-1-540x350.jpg') }}" alt="">
              </div>
            </div>
          </div>
          <dl class="dl-horizontal">
            <dt>
              <div class="dt"><span class="date">23</span><span class="month">Jul</span><span class="year">all</span>
              </div>
              <div class="icon_"><i class="moon-pencil"></i></div>
            </dt>
            <dd>
              <h3><a href="index4837.html">Message Man</a></h3>
              <div class="blog-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                vehicula feugiat blandit. Nulla facilisi. Nulla tellus... </div>
            </dd>
          </dl>
          <div class="info">
            <ul>
              <li class="user">admin</li>
              <li class="comment">0 Comments</li>
            </ul>
          </div>
        </li> --}}
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="span4 block_skill">
  <div class="header">
    <dl class="dl-horizontal">
      <dt><i class="moon-star"></i></dt>
      <dd style="margin-left:55px !important; margin-top:10px;">
        <h4>Our Skills</h4>
      </dd>
    </dl>
  </div>
  <p></p>

  @if($skills)
  @foreach ( $skills as $skill)
  <h6 style="color: rgb(141, 0, 0);">{{ $skill->name}}</h6><span class="big_percentage">{{ $skill->percentage }}%</span>
  <div class="skill animate_onoffset" data-percentage="{{ $skill->percentage }}">
    <div class="prog" style="width: 0%;"><span class="circle"></span></div>
  </div>
  @endforeach
  @endif
</div>

</div>

</div>

</div>














<!--
  <div class="row-fluid row-dynamic-el " style="">
    <div class="container">
      <div class="row-fluid">
        <div class="span6"><div class="header"><dl class="dl-horizontal"><dt style="display:none;"></dt><dd style="margin-left:0px"><h4>Why You Need Us</h4></dd></dl></div><div class="accordion " id="accordion1420688989"><div class="accordion-group"><div class="accordion-heading in_head"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1420688989" href="('#toggle7642')">We are Pro</a></div><div id="toggle7642" class="accordion-body in collapse "><div class="accordion-inner"> We are equipped with the best designers and programmers in the industry that can bring that your extraordinary idea to live and deliver youat a remarkable speed too. We have expert that specialize in java,php,python, C+ and C </div></div></div><div class="accordion-group"><div class="accordion-heading "><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1420688989" href="#toggle1935">Great designs</a></div><div id="toggle1935" class="accordion-body  collapse "><div class="accordion-inner">Have you seen any of our App, what about our website? ofcourse, here you are. You noticed the beautifully designs, and how everything is well placed, right? Remember, we just dont create a computer program for you, what we do, is give you a pleaseant looking and functional app. <span style="color:red">more</span>   </div></div></div><div class="accordion-group"><div class="accordion-heading "><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1420688989" href="#toggle28932">Easy to Use</a></div><div id="toggle28932" class="accordion-body  collapse "><div class="accordion-inner">what the point of a computer and its programmes if they are not solving real life problems easily? no point at all, and that is why we make sure you and all our other users have pleaseant experience navigating all our applications. We take note of our end users and develop apps, we know they can use everyday, we make sure of that through our extensive survey. click on the <span style='color:red'>more</span> to see our recent app and how we customize something new for you and your organization</div></div></div></div></div>
        <div class="span6 recent_news"><div class="header"><dl class="dl-horizontal"><dt style="display:none;"></dt><dd style="margin-left:0px"><h4> </h4></dd></dl></div><div class="row-fluid"><div class="span12"><dl class="news-article blog-article style_2 dl-horizontal"><dt><div class="dt"><span class="date">11</span><span class="month">Sep</span><span class="year">all</span></div><div class="icon_"><i class="moon-pencil"></i></div></dt><dd><h5><a href="('indexcaf0.html') >Featured Image Post</a></h5><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula feugiat blandit. Nulla facilisi. Nulla tellus nisi, congue id tristique vitae, lacinia iaculis mag</p><a href="('indexcaf0.html')" class="read_m"><span>Read More</span> <span class="direct_btn"><i class="moon-arrow-right-2"></i></span></a></dd></dl><dl class="news-article blog-article style_2 dl-horizontal"><dt><div class="dt"><span class="date">11</span><span class="month">Sep</span><span class="year">all</span></div><div class="icon_"><i class="moon-pencil"></i></div></dt><dd><h5><a href='index57e7.html'>Another Standart Post</a></h5><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vehicula feugiat blandit. Nulla facilisi. Nulla tellus nisi, congue id tristique vitae, lacinia iaculis mag</p><a href='index57e7.html' }}" 
          class="read_m"><span>Read More</span> <span class="direct_btn"><i class="moon-arrow-right-2"></i></span></a></dd></dl></div></div></div>
      </div>
    </div>
  </div> -->











<div class="row-fluid row-dynamic-el " style="margin-bottom:-90px; ">
  <div class="container">
    <div class="row-fluid">
      <div class="span12">
        <div class="header">
          <dl class="dl-horizontal">
            <dt style="display:none;"></dt>
            <dd style="margin-left:0px">
              <h4>Our Clients</h4>
            </dd>
          </dl>
          <div class="pagination"><a href="#" class="prev" title="Previous"><i class="moon-arrow-left"></i></a><a
              href="#" class="next" title="Next"><i class="moon-arrow-right-2"></i></a></div>
        </div>
        <!-- Clients Section -->
        <section class="row-fluid clients">
          <div class="item">
            <a href="#">
              <img alt="img" src="{{ asset('asset/content/images/all/07/natnudo4.png')}}">
            </a>
          </div>
          <div class="item">
            <a href="#">
              <img alt="img" src="{{ asset('asset/content/images/all/07/1.png') }}">
            </a>
          </div>
          <div class="item">
            <a href="#">
              <img alt="img" src="{{ asset('asset/content/images/all/07/2.png')}}">
            </a>
          </div>
          <div class="item">
            <a href="#">
              <img alt="img" src="{{ asset('asset/content/images/all/07/3.png')}}">
            </a>
          </div>
          <div class="item">
            <a href="#">
              <img alt="img" src="{{ asset('asset/content/images/all/07/4.png')}}">
            </a>
          </div>
          <div class="item">
            <a href="#">
              <img alt="img" src="{{ asset('asset/content/images/all/07/5.png')}}">
            </a>
          </div>
          <div class="item">
            <a href="#">
              <img alt="img" src="{{ asset('asset/content/images/all/07/6.png')}}">
            </a>
          </div>
          <!-- Clients Section -->
        </section>
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