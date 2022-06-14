<div id="navigation" class="nav_top pull-right  ">
  <nav>
    <ul id="menu-menu" class="menu sub-menu" style="margin-left: 0px; left: 0%;">

      <li><a href="{{ url('/')  }}">Home</a></li>
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
            @if(isset($products))
                @foreach($products as $product)
                    <li><a href={{ route('product.details', $product) }}>{{$product->name}}</a></li>
                @endforeach
            @endif
        
        </ul>
      </li>


      <li>
        <a href="{{  url('services')  }}">Services</a>
        <ul class="sub-menu">
            @if(isset($services))
                @foreach($services as $service)
                    <li><a href={{ route('service.details', $service) }}>{{$service->name}}</a></li>
                @endforeach
            @endif
         
        </ul>
      </li>

      <li><a href={{ url('projects') }}>Projects</a>
             <ul class="sub-menu">
            @if(isset($projects))
                @foreach($projects as $project)
                    <li><a href={{ route('project.details', $project) }}>{{$project->name}}</a></li>
                @endforeach
            @endif
            </ul>
      </li>

      <li><a href="{{url('/clientele')}}">Clientele</a></li>
      <li><a href="{{ route('careers.create') }}">Careers</a></li>

      <li><a href={{  url('contact') }}>Contact Us</a></li>

      @auth
      <li>
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Str::limit(Auth::user()->name, 12) }}
        </a>
        <ul class="sub-menu">
          <li>
            <a href="{{route('home')}}" class="nav-link">
              <span class="nav-link-inner--text">Dashboard</span>
            </a>
          </li>
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