@extends('binary.master.vicemaster')
@section('title')
Our Policy
@endsection

@section('styles')
<style>
  .terms p {
    font-size: 15px !important;
    color: #000;
  }
</style>
@endsection


@section('content')

<div class="header_page">
  <div class="container">
    <div class="row-fluid">
      <div class="span6">
        <h4 style="color:#009dcd; font-size:25px;">TERMS OF SERVICE</h4>
      </div>
      <div class="breadcrumbss">

        <ul class="page_parents pull-right">
          <li>You are here: </li>
          <li><a href="index.html">Home</a>/</li>

          <li><a href="portfolio_2.html">Term of Service</a></li>

        </ul>
      </div>

    </div>
  </div>

</div>




<div class="row-fluid row-dynamic-el " style="margin-top: -50px;">

  <div class="container">

    <div class="row-fluid">

      <div class="span12 services_group">
        <div class="row-fluid terms">
          {!! $policy->content ?? "" !!}
        </div>
      </div>
    </div>
  </div>
</div>





<a href="#" class="scrollup">Scroll</a>
<!-- Social Profiles -->


<!-- Footer -->
@endsection