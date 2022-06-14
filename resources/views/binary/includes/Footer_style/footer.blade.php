<div class="footer_wrapper">

  <footer id="footer">

    <?php

      $contact = App\Models\ContactUs::first();
      $projects = App\Models\Project::limit(4)->get();
    ?>
    <div class="inner">
      <div class="container">
        <div class="row-fluid ff">

          <!-- widget -->
          <div class="span3">

            <div id="text-2" class="widget widget_text">
              <div class="textwidget"><img src="{{ asset('asset/content/images/all/07/logo_staunchwhite.png') }}" />
                <br /><br />
                {!! $contact->footer_note !!}
              </div>
            </div>
            <div id="search-4" class="widget widget_search">
              <form action="#" id="search-form">
                <div class="input-append">
                  <input type="" size="16" placeholder="Search&hellip;" name="s" id="s2"><button type="submit"
                    class="more">Search</button>
                </div>
              </form>
            </div>
          </div>




          <div class="span3">

            <div id="recent-posts-2" class="widget widget_recent_entries">
              <h6 class="widget-title"><span>About Us</span></h6>
              <ul>
                <li>
                  <a href="{{  url('who_we_are')  }}">Who we are</a>
                </li>
                <li>
                  <a href="{{  url('mission_and_vision')  }}">Mission and Vision</a>
                </li>
                <li>
                  <a href="{{  url('our_policy')  }}"> Our Policies</a>
                </li>
                <li>
                  <a href="{{  url('projects')  }}">Featured Project</a>
                </li>
                <li>
                  <a href="{{  url('clientele')  }}">Clientele</a>
                </li>
              </ul>
            </div>
          </div>


          

          <div class="span3">

            <div id="widget_contact_info-2" class="widget widget_contact_info">
              <h6 class="widget-title"><span>Contact Info</span></h6>
              <p>Get in touch with us, see details below</p>
              <ul>
                <li class="address">Address: <span>{{ $contact->address }}</span></li>
                <li class="phone">Phone: <span>{{ $contact->phone }}</span></li>
                <li class="email">Email: <span>{{ $contact->email }}</span></li>
                <li class="web">Web: <span><a href="{{ $contact->website_url }}">{{ $contact->website_url }}</a></span>
                </li>
              </ul>
            </div>
          </div>




          <div class="span3">

            <div id="widget_flickr-2" class="widget widget_flickr">
              <h6 class="widget-title"><span>Recent Works</span></h6>
              {{--  <div class="flickr_container">
                <script type="text/javascript"
                  src="http://www.flickr.com/badge_code_v2.gne?count=6&display=latest&size=s&layout=x&source=user&user=52617155@N08">
                </script>
              </div>--}}
              <ul>
                  @if(isset($projects) && $projects)
                  @foreach($projects as $item)
                <li class="naruto"><a href="{{route('project.details', $item)}}">
                    <img src="{{ asset('images/projects').'/'.$item->photos[0]->name }}" alt="Forest" width="80px"
                      style="border-radius: 10px; height: 75px;">
                  </a> </li>
                  @endforeach
                @endif
                {{--<li class="naruto"><a target="_blank" href="img_forest.jpg">
                    <span><img src="{{ asset('asset/content/images/all/07/StaunchXcel.jpg') }}" alt="Forest"
                        width="80px" ; style="border-radius: 10px" ;>
                <li class="naruto"><a target="_blank" href="img_forest.jpg">
                    <img src="{{ asset('asset/content/images/all/07/StaunchXcel.jpg') }}" alt="Forest" width="80px" ;
                      style="border-radius: 10px">
                  </a> </li>

                <li class="naruto"><a target="_blank" href="img_forest.jpg">
                    <span><img src="{{ asset('asset/content/images/all/07/StaunchXcel.jpg') }}" alt="Forest"
                        width="80px" ; style="border-radius: 10px" ;>--}}

              </ul>






            </div>
          </div>

        </div>
      </div>
    </div>

    <style>
      camera {
        border: 1px solid #ddd;
        /* Gray border */
        border-radius: 50px;
        /* Rounded border */
        padding: 5px;
        /* Some padding */
        width: 30px;
        /* Set a small width */

      }
    </style>
    
        <!--<dl class="dl-horizontal">-->
        <!--    <dt><i class="moon-file-2"></i></dt>-->
        <!--    <dd style="margin-left: 55px !important; margin-top:10px;">-->
        <!--        <h4>Our Contact Details</h4>-->
        <!--    </dd>-->
        <!--</dl>-->

    <div id="copyright">
      <div class="container">
        <div class="row-fluid">
          <div class="span12">&copy; 2021. All Right Reserved | Staunch Technology
            <div class="pull-right">
              <ul class="footer_social_icons">
                <li class="" style="background-image: none !important; margin-top: 3px;"><a
                    href="{{ $contact->instagram_url }}"><i class="fab fa-instagram"></i></a></li>
                <li class="youtube"><a href="https://www.youtube.com/channel/UCQLLVA8_tb0QBvGT6fjcB7g" target="_blank"><span></span></a></li>
                <li class="linkedin"><a href=""https://www.linkedin.com/company/staunch-technologies-limited/" target="_blank"><span></span></a></li>
                <li class="twitter"><a href="https://twitter.com/StaunchTechi?s=09" target="_blank"><span></span></a></li>
                <li class="facebook"><a href=""https://www.facebook.com/StaunchTechnologiesLtd" target="_blank"><span></span></a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div><!-- #copyright -->

  </footer><!-- #footer -->
</div>