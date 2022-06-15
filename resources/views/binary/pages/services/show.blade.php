@extends('binary.master.vicemaster')

@section('title')
{{ $service->name }} | Services
@endsection

@section('styles')
{{-- <link rel='stylesheet' id='layerslider_css-css' href="{{ asset('content/style.css') }}" type='text/css' media='all'
/> --}}
@endsection

@section('content')

<div class="header_page">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h4>{{ Str::upper($service->name) }}</h4>
            </div>
            <div class="breadcrumbss">

                <ul class="page_parents pull-right">
                    <li>You are here: </li>
                    <li><a href="{{ url('services') }}">Service</a>/</li>

                    <li><a href="#">{{ $service->name }}</a></li>

                </ul>
            </div>

        </div>
    </div>

</div>

@if($service->name=='IT Training')
 @include('binary.pages.services.show3')

@elseif($service->name)
        @include('binary.pages.services.show2')
@endif
</section>



<a href="#" class="scrollup" style="display: none;">Scroll</a>
<!-- Social Profiles -->


<!-- Footer -->
</div>
@endsection