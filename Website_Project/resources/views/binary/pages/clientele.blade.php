@extends('binary.master.vicemaster')
@section('title')
Clientele
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
      <section id="portfolio-preview-items" class="three-cols span12" >

        <div class="row filterable">

          <!-- item -->
          @if ($clients)
          @foreach ($clients as $client)    
          <!-- item -->
          <div class="portfolio-item web-design  v1" data-id="119">
            <div class="he-wrap tpl2" style="height: 209.83px;">
              <img src="{{ asset('images/users').'/'.($client->photos->count()>0 ? $client->photos[0]->name : "") }}" alt="" style="height: 100%">
              <div class="shape2"></div>
              <div class="overlay he-view">
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
              <span class="desc">{{ Str::limit($client->company_address, 35)}}</span>
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



