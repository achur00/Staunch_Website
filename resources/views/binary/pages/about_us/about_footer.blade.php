<div class="row-fluid row-dynamic-el ">

  <div class="container">

    <div class="row-fluid">

      <div class="span12 services_steps steps_nr_3">
        <div class="first_desc">
          <div class="header">
            <h1>Staunch</h1>
            <h2>Work process</h2>
          </div>
          <p>Our work processes are specifically centered on the following:</p>
        </div>
        <?php 
          $icons = ['bars', 'brush', 'user'];
          $processes = App\Models\WorkProcess::all();
        ?>
        @foreach ($processes as $key => $process )
        <div class="step"><i class="moon-{{ $icons[$key] }}"></i>
          <h2 style="color: rgb(141, 0, 0);">{{ $process->name }}</h2>
          <p>{!! Str::limit($process->description, 100) !!}</p>
        </div>
        @endforeach
        {{-- <div class="step"><i class="moon-brush"></i>
          <h2 style="color: rgb(141, 0, 0)">Design &amp; Implement</h2>
          <p>Lorem ipsum dolor onsectetuer adipiscing elit. Aene commodo ligula eget dolor, aenean ....</p>
        </div>
        <div class="step"><i class="moon-user"></i>
          <h2 style="color: rgb(141, 0, 0)">Support &amp; Updates</h2>
          <p>Lorem ipsum dolor onsectetuer adipiscing elit. Aene commodo ligula eget dolor, aenean ....</p>
        </div> --}}
      </div>

    </div>

  </div>

</div>