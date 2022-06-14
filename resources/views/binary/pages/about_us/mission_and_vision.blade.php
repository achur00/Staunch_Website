@extends('binary.master.vicemaster')
@section('content')

<div class="header_page">
  <div class="container">
    <div class="row-fluid">
      <div class="span6">
        <h4 style="color:#009dcd; font-size:25px;">MISSION AND VISION</h4>
      </div>
      <div class="breadcrumbss">

        <ul class="page_parents pull-right">
          <li>You are here: </li>
          <li><a href="index.html">Home</a>/</li>

          <li><a href="portfolio_2.html">Mission and Vision</a></li>

        </ul>
      </div>

    </div>
  </div>

</div>



<div style="margin-top: 50px;"></div>

<div class="row-fluid row-dynamic-el " style="">

  <div class="container">

    <div class="row-fluid">

      <div class="span6 post_page_cont">
        <div class="header">
          <dl class="dl-horizontal">
            <dt><i class="moon-tag-2"></i></dt>
            <dd style="margin-left:55px !important; margin-top:10px;">
              <h4>
                <Main>MISSION</Main>
              </h4>
            </dd>
          </dl>
        </div>
        <p style="font-size: 15px; color:black;">{!! $missionVision->mission !!}</p>
        
      </div>



      <div class="span6 block_skill">
        <div class="header">
          <dl class="dl-horizontal">
            <dt><i class="moon-tag-2"></i></dt>
            <dd style="margin-left:55px !important; margin-top:10px;">
              <h4>Vision</h4>
            </dd>
          </dl>
        </div>
        <p style="font-size: 15px; color:black;">{!! $missionVision->vision !!}</p>
       
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