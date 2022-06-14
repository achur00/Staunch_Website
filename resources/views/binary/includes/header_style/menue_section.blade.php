<div id="navigation" class="nav_top pull-right  ">
  <nav>
    <ul id="menu-menu" class="menu sub-menu" style="margin-left: 0px; left: 0%;">

      <li><a href="{{ url('')  }}">Home</a></li>
      <li><a href="#">About Us</a>
        <ul class="sub-menu">
          <li><a href="{{  url('who_we_are')  }}">Who we are</a></li>
          <li><a href="{{  url('mission_and_vision')  }}"> Mission and Vision</a></li>
          <li><a href="{{  url('our_policy')  }}">Our Policy</a></li>
        </ul>
      </li>


      <li>
        <a href="{{ url('products') }}">Products</a>
        <ul class="sub-menu">
          <li><a href={{  url('staunch_xcel')  }}>StaunchXcel</a></li>
          <li><a href={{  url('staunch_ems')  }}>Staunch EMS</a></li>
          <li><a href={{  url('staunch_sim')}}>Staunch Sim</a></li>
        </ul>
      </li>


      <li>
        <a href="{{  url('services')  }}">Services</a>
        <ul class="sub-menu">
          <li><a href={{  url('e_business_consulting')  }}>E-business Consulting</a></li>
          <li><a href={{  url('website_&webapp_dev')  }}>Website and Web App Development</a></li>
          <li><a href={{  url('mobile_app_dev')  }}>Mobile App Development</a></li>
          <li><a href={{  url('domain_&hosting')  }}>Domain and Hosting</a></li>
          <li><a href={{  url('digital_marketing')  }}>Digital Marketing</a></li>
          <li><a href={{  url('social_media_mgmt')  }}>Social Media Management</a></li>
        </ul>
      </li>

      <li><a href={{ url('projects') }}>Projects</a></li>

      <li><a href="clientele">Clientele</a></li>

      <li><a href={{  url('contact') }}>Contact Us</a></li>

      @auth
      <li class="">
        <a href="{{route('home')}}" class="nav-link">
          <span class="nav-link-inner--text">Dashboard</span>
        </a>
      </li>
      <li>
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Str::limit(Auth::user()->name, 12) }}
        </a>
        <ul class="sub-menu">
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </li>
      @endauth


    </ul>
  </nav>
</div>