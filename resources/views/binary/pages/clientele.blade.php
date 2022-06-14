@extends('binary.master.vicemaster')

@section('title')
Clientele
@endsection

@section('styles')
<style>
    .pagination-outer{ text-align: center; }
.pagination{
    font-family: 'Ubuntu', sans-serif;
    display: inline-flex;
    position: relative;
}
.pagination li a.page-link{
    color: #f1f1f1;
    background: linear-gradient(#3C373D,#21262A);
    font-size: 20px;
    font-weight: 600;
    line-height: 41px;
    height: 42px;
    width: 42px;
    padding: 0;
    margin: 0 1px;
    border: none;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease 0s;
}
.pagination li a.page-link:hover,
.pagination li a.page-link:focus,
.pagination li.active a.page-link:hover,
.pagination li.active a.page-link{
    color: #fff;
    background: linear-gradient(#FA5100,#BC1F00);
}
.pagination li a.page-link:before{
    content: '';
    background: #bbb;
    height: 4px;
    width: 70%;
    border-radius: 50%;
    transform: translateX(-50%) scale(0);
    position: absolute;
    left: 50%;
    top: calc(100% + 3px);
    z-index: -1;
    transition: all 0.3s ease 0s;
}
.pagination li a.page-link:hover:before,
.pagination li a.page-link:focus:before,
.pagination li.active a.page-link:before{
    opacity: 1;
    transform: translateX(-50%) scale(1);
}
@media only screen and (max-width: 480px){
    .pagination{
        font-size: 0;
        display: inline-block;
    }
    .pagination li{
        display: inline-block;
        vertical-align: top;
        margin: 0 0 20px;
    }
}
    
</style>

@endsection


@section('content')
<!-- Main Content -->

<div class="header_page">
  <div class="container">
    <div class="row-fluid">
      <div class="span6">
        <h4 style="color:#009dcd; font-size:25px;">OUR CLIENTS</h4>
      </div>
      <div class="breadcrumbss">

        <ul class="page_parents pull-right">
          <li>You are here: </li>
          <li><a href="index.html">Home</a>/</li>

          <li><a href="portfolio_2.html">Clientele</a></li>

        </ul>
      </div>

    </div>
  </div>

</div>

<section id="content" class="content_portfolio layout-fullsize" style="margin-bottom:-70px;">
  <div class="container">
    <div class="row-fluid">
      <!-- Prodct filter Filter -->
      <nav id="portfolio-filter" class="span12">
        <ul class="">
          <li class="active all"><a href="#" data-filter="*">View All</a><span></span></li>
          <li class="other"><a href="#" data-filter=".projects">Clients</a><span></span></li>
        </ul>
      </nav>
    </div>
    <div class="row-fluid">
      <section id="portfolio-preview-items" class="four-cols span12" >

        <div class="row filterable">

          <!-- item -->
          @if ($clients)
          @foreach ($clients as $client)    
          <!-- item -->
          <div class="portfolio-item web-design  v1" data-id="119">
            <div class="he-wrap tpl2" style="height: 109.83px; object-fit: fill; display: flex; flex-flow: column; justify-content: center;">
              <img src="{{ asset('images/users').'/'.($client->photos->count()>0 ? $client->photos[0]->name : "") }}" alt="" style="height: 100px; width: 150px; align-self: center;">
                
              <div class="shape2"></div>
              <div class="overlay he-view" style="width: 100%;">
                <div class="bg a0" data-animate="fadeIn">
                  <div class="center-bar v1">
                    {{-- <a href="{{ route('.details', $client) }}" class="link a0" data-animate="zoomIn"><i
                        class="moon-link"></i></a> --}}
                    <a href="{{ asset('images/users/').'/'.($client->photos->count()>0 ? $client->photos[0]->name : "")}}" class="lightbox a1 lightbox-gallery"
                      data-animate="zoomIn"><i class="moon-images"></i></a>

                  </div>
                </div>

              </div>

            </div>

            <div class="project">
              {{-- {{ route('product.details', $product) }} --}}
              <h6><a href="">{{ Str::limit($client->company_name, 20) }}</a></h6>
              {{--<span class="desc">{{ Str::limit($client->company_address, 35)}}</span>--}}
            </div>
          </div>
            @endforeach
          @endif

          <div class="render">{{ $clients->links() }}</div>
        </div>
      </section>
    </div>
  </div>
</section> <a href="#" class="scrollup">Scroll</a>
<!-- Social Profiles -->


</div>


@endsection



