<div class="row-fluid row-dynamic-el " style="">
    <div class="container">
      <div class="row-fluid">
        <div class="span12 recent_portfolio ">
          <div class="header">
            <dl class="dl-horizontal">
              <dt style="display:none"></dt>
              <dd style="margin-left:0px">

                <h4>Services</h4>
              </dd>
            </dl>

            <div class="pagination">
              <a href="#" class="prev" title="Previous"><i class="moon-arrow-left"></i></a><a href="#" class="next"
                title="Next">
                <i class="moon-arrow-right-2"></i>
              </a>
            </div>
          </div>
          
          <section id="portfolio-preview-items" class="row four-cols rows_1">
            <div class="carousel carousel_portfolio">
              
              @if ($services)
              @foreach ($services as $service)    
              <div class="portfolio-item v1">
                <div class="he-wrap tpl2" style="height: 189.63%">
                  <img alt="img" src="{{ asset('images/services').'/'.$service->photos[0]->name }}" style="height: 100%;">

                  <div class="overlay he-view">
                    <div class="bg a0" data-animate="fadeIn">
                      <div class="center-bar v1">
                        <a href="{{ route('service.details', $service) }}" class="link a0"
                          data-animate="zoomIn">
                          <i class="moon-link"></i></a>
                        <a href="{{ asset('images/services').'/'.$service->photos[0]->name }}"
                          class="lightbox a1 lightbox-gallery" data-animate="zoomIn"><i class="moon-image"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="project">
                  <h6><a href="{{ route('service.details', $service) }}">{{ $service->name }}</a></h6> <span
                    class="desc">{{ $service->category->name }}</span>
                </div>
              </div>
              @endforeach
              @endif
              
              
              

              
              {{-- e-BUSINESS CONSULTING --}}
              {{-- <div class="portfolio-item v1">
                <div class="he-wrap tpl2"> <img alt="img"
                    src="{{ asset('asset/content/images/all/09/water_dance-220x140.jpg') }}">
                  <div class="overlay he-view">
                    <div class="bg a0" data-animate="fadeIn">
                      <div class="center-bar v1"> <a href="{{  url('/IT_support')  }}" class="link a0"
                          data-animate="zoomIn"><i class="moon-link"></i></a> <a
                          href="{{ asset('asset/content/images/all/09/Love-your-product.png') }}"
                          class="lightbox a1 lightbox-gallery" data-animate="zoomIn"><i class="moon-search-2"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="project">
                  <h6><a href="{{  url('/IT_support')  }}">IT SUPPORT </a>
                      </h6> <span class="desc">technical support </span>
                </div>
              </div>
              
              <div class="portfolio-item v1">
                <div class="he-wrap tpl2"> <img alt="img"
                    src="{{ asset('asset/content/images/all/09/water_dance-220x140.jpg') }}">
                  <div class="overlay he-view">
                    <div class="bg a0" data-animate="fadeIn">
                      <div class="center-bar v1"> <a href="{{  url('/digital_marketing')  }}" class="link a0"
                          data-animate="zoomIn"><i class="moon-link"></i></a> <a
                          href="{{ asset('asset/content/images/all/09/Love-your-product.png') }}"
                          class="lightbox a1 lightbox-gallery" data-animate="zoomIn"><i class="moon-search-2"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="project">
                  <h6><a href="{{  url('/digital_marketing')  }}">DIGITAL MARKETING</a></h6> <span
                    class="desc">Online Marketing </span>
                </div>
              </div>
              <div class="portfolio-item v1">
                <div class="he-wrap tpl2"> <img alt="img"
                    src="{{ asset('asset/content/images/all/09/water_dance-220x140.jpg') }}">
                  <div class="overlay he-view">
                    <div class="bg a0" data-animate="fadeIn">
                      <div class="center-bar v1"> <a href="indexd412.html?portfolio=single-portfolio-10" class="link a0"
                          data-animate="zoomIn"><i class="moon-link"></i></a> <a
                          href="{{ asset('content/images/all/09/water_dance-220x140.jpg') }}"
                          class="lightbox a1 lightbox-gallery" data-animate="zoomIn"><i class="moon-search-2"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="project">
                  <h6><a href="{{  url('/domain_&hosting')  }}">DOMAIN AND HOSTING</a></h6> <span
                    class="desc">cpanel & WP </span>
                </div>
              </div>
              <div class="portfolio-item v1">
                <div class="he-wrap tpl2"> <img alt="img"
                    src="{{ asset('asset/content/images/all/07/StunchTechnology.jpg') }}">
                  <div class="overlay he-view">
                    <div class="bg a0" data-animate="fadeIn">
                      <div class="center-bar v1"> <a href="{{  url('/domain_&hosting')  }}" class="link a0"
                          data-animate="zoomIn"><i class="moon-link"></i></a> <a
                          href="{{ asset('asset/content/images/all/07/StunchTechnology.jpg') }}"
                          class="lightbox a1 lightbox-gallery" data-animate="zoomIn"><i class="moon-search-2"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="project">
                  <h6><a href="indexd412.html?portfolio=single-portfolio-10">Single Portfolio 6</a></h6> <span
                    class="desc">php web-design </span>
                </div>
              </div>
              <div class="portfolio-item v1">
                <div class="he-wrap tpl2"> <img alt="img" src="{{ asset('asset/content/images/all/07/StunchTechnology.jpg') }}">
                  <div class="overlay he-view">
                    <div class="bg a0" data-animate="fadeIn">
                      <div class="center-bar v1"> <a href="indexd412.html?portfolio=single-portfolio-10" class="link a0"
                          data-animate="zoomIn"><i class="moon-link"></i></a> <a
                          href="{{ asset('asset/content/images/all/07/StunchTechnology.jpg') }}" class="lightbox a1 lightbox-gallery"
                          data-animate="zoomIn"><i class="moon-search-2"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="project">
                  <h6><a href="indexd412.html?portfolio=single-portfolio-10">Single Portfolio 5</a></h6> <span
                    class="desc">web-development </span>
                </div>
              </div>
              <div class="portfolio-item v1">
                <div class="he-wrap tpl2"> <img alt="img"
                    src="{{ asset('asset/content/images/all/07/slider_21-220x140.jpg') }}">
                  <div class="overlay he-view">
                  
                    <div class="bg a0" data-animate="fadeIn">
                      <div class="center-bar v1"> <a href="indexd412.html?portfolio=single-portfolio-10" class="link a0"
                          data-animate="zoomIn"><i class="moon-link"></i></a> <a
                          href="{{ asset('content/images/all/07/slider_21.jpg') }}" class="lightbox a1 lightbox-gallery"
                          data-animate="zoomIn"><i class="moon-search-2"></i></a> </div>
                    </div>
                  </div>
                </div>
                <div class="project">
                  <h6><a href="indexd412.html?portfolio=single-portfolio-10">Single Portfolio 4</a></h6> <span
                    class="desc">web-design </span>
                </div>
              </div> --}}
              
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

