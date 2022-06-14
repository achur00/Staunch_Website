<div class="top_nav">
  <div class="container">
    <div class="row-fluid">
      <div class="span6">
        <div class="pull-left">
          <div id="widget_topnav-2" class="widget widget_topnav">

            <div class="search small_widget"><a href="#" class="getdata" data-box="search"><i
                  class="moon-search-3"></i>Search</a>
              <div class="top_nav_sub search">
                <form action="#" id="search-form">
                  <div class="input-append">
                    <input type="text" size="16" placeholder="Search&hellip;" name="s" id="s"><button type="submit"
                      class="more">Search</button>
                  </div>
                </form>
              </div>
            </div>

            @guest
            @if (Route::has('login'))
            <div class="login small_widget" style="height: auto !important;">


              <a href="#" data-box="login"><i class="moon-user"></i>Login</a>

              <div class="top_nav_sub login">
                <div class="sub-loggin" style="padding: 20px 10px !important;">
                  <form action="{{ route('login') }}" method="POST" class="row-fluid">
                    @method('POST')
                    @csrf
                    <input type="email" name="email" id="log" class="@error('email') is-invalid @enderror" value=""
                      size="20" placeholder="Email" />
                    @error('email')
                    <span class="invalid-feedback d-block" style="display: block; color: red; margin: 0 0 8px 0; "
                      role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="password" name="password" class="@error('password') is-invalid @enderror" id="pwd"
                      size="20" placeholder="Password" />
                    @error('password')
                    <span class="invalid-feedback d-block" style="display: block; color: red; margin: 0 0 8px 0; "
                      role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="submit" name="submit" value="Login" class="button" />
                    <div class="check-login">
                      <label for="rememberme"><input name="remember" id="rememberme" type="checkbox" checked="checked"
                          value="forever" /> Remember
                        me</label>
                    </div>
                    {{-- <input type="hidden" name="redirect_to" value="/" /> --}}
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Recover password</a>
                    @endif
                  </form>

                </div>
              </div>

            </div>
            @endif
            @endguest
          </div>
          <div id="text-5" class="widget widget_text">
            <?php
              $contact = App\Models\ContactUs::first();
            ?>

            <div class="textwidget">Contact us now: Phone: {{ $contact->linkedin_url }}</div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="pull-right">
          <div id="social_widget-2" class="widget social_widget">
            <div class="row-fluid social_row">
              <div class="span12">
                <ul class="footer_social_icons">
                  <li class="" style="background-image: none !important; margin-top: 3px;"><a
                      href="https://www.instagram.com/staunch_technologies" target="_blank"><i class="fab fa-instagram"></i></a></li>
                  <li class="youtube"><a href="https://www.youtube.com/channel/UCQLLVA8_tb0QBvGT6fjcB7g" target="_blank"><span></span></a></li>
                  <li class="linkedin"><a href="https://www.linkedin.com/company/staunch-technologies-limited/" target="_blank"><span></span></a></li>
                  <li class="twitter"><a href="{{ $contact->twitter_url }}"><span></span></a></li>
                  <li class="facebook"><a href="https://www.facebook.com/StaunchTechnologiesLtd" target="_blank"><span></span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
