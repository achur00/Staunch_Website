@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('links')
<!-- Page plugins -->

<link rel="stylesheet" href="{{asset('/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endsection

@section('jslinks')
<!-- Optional JS -->
<script src="{{asset('/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
@endsection

@section('content')

<!--page contents-->
<div class="container-fluid mt-5">
    <!-- Card stats -->
    <div class="row">

        <div class="col-xl-4 col-md-6">
            <a href="">
                {{-- {{route('activity.index')}} --}}
                <div class="card card-stats bg-gradient-orange border-0" style="height: 200px !important;">
                    <!-- Card body -->
                    <div class="card-body">

                        {{-- @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                    </div>
                    @endif --}}

                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-white mb-0">
                                {{(Auth::user()->role_id ==1) ? "client reports" : "my reports"}}</h5>
                            <span
                                class="h2 font-weight-bold mb-0 text-white">{{(Auth::user()->role_id ==1) ? (($all_acts ??false) ? $all_acts->count() : "0") : (($acts ?? false) ? $acts->count() : "0") }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-collection"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-nowrap text-white"><i class="fa fa-arrow-up"></i>Last Report Since
                        </span>
                        <span class="text-light mr-2">
                            {{(Auth::user()->role_id ==1) ? (($all_acts ?? false) ? $all_acts[$all_acts->count()-1]->created_at : "no report") : (($acts ?? false) ? $acts[$acts->count()-1]->created_at : "no report")}}</span>
                        @if(Auth::user()->role_id == 1)
                        <span class="d-block h2 text-wrap text-white">Total Client:
                            {{($all_student ?? false) ? $all_student->count() : "0"}}</span>
                        @endif
                    </p>
                </div>
        </div>
        </a>
    </div>



    <div class="col-xl-4 col-md-6">
        {{-- @if(Auth::user()->role_id == 1) --}}
        <a href="">
            {{-- {{route('pin.index')}} --}}
            <div class="card bg-gradient-info border-0" style="height: 200px !important;">
                <!-- Card body -->
                <div class="card-body h-100">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">subscriptions report</h5>
                            <span
                                class="h2 font-weight-bold mb-0 text-white">{{($reg_codes ?? false) ? $reg_codes->count() : "0"}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-white text-info rounded-circle shadow">
                                <i class="ni ni-key-25 ni-xl"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-nowrap text-white"><i class="fa fa-arrow-up"></i>Last payment
                            Since </span>
                        <span class="text-light mr-2">
                            {{($reg_codes ?? false) ? $reg_codes[$reg_codes->count()-1]->created_at->diffForHumans() : "No payment"}}</span>
                    </p>
                </div>
            </div>
        </a>
    </div>
    {{-- @else --}}


    <div class="col-xl-4 col-md-6">
        <a href="">
            {{-- {{route('activity.create')}} --}}
            <div class="card bg-gradient-info border-0" style="height: 200px !important;">
                <!-- Card body -->
                <div class="card-body h-100">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">Service Report</h5>
                            <span class="h2 font-weight-bold mb-0 text-white">All available Service</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-white text-info rounded-circle shadow">
                                <i class="ni ni-single-copy-04 ni-xl"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-nowrap text-white"><i class="fa fa-arrow-up"></i>Last Service Upload
                            Since </span>
                        <span class="text-light mr-2">
                            {{($acts ?? false) ? $acts[$acts->count()-1]->created_at : "No Services"}}</span>
                    </p>
                </div>
            </div>
        </a>

        {{-- @endif --}}
    </div>

    @if(Auth::user()->role_id == 2)
    <div class="col-xl-4 col-md-6">
        <a href="">
            {{-- {{route('quiz.index')}} --}}
            <div class="card card-stats border-0" style="height: 200px !important;">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">today quiz</h5>
                            <span class="h2 font-weight-bold mb-0">click to see available quiz</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-nowrap text-green"><i class="fa fa-arrow-up"></i>Last
                            {{(Auth::user()->role_id ==1) ? "Uplaod" : "Response"}} Since </span>

                        @if((Auth::user()->role_id ==1 && isset($quizs)))
                        <span class="text-muted mr-2">
                            {{ $quizs[$quizs->count()-1]->created_at->diffForHumans()}}</span>
                        @elseif(Auth::user()->role_id == 2 && isset($quizres))
                        <span class="text-muted mr-2">
                            {{ $quizres[$quizres->count()-1]->created_at->diffForHumans()}}</span>
                        @else
                        <span class="text-muted">Not available</span>
                        @endif
                    </p>
                </div>
            </div>
        </a>
    </div>
    @endif
    <div class="col-xl-4 col-md-6">
        <a href="">
            {{-- {{route('quizresponse.index')}} --}}
            <div class="card card-stats bg-gradient-success border-0" style="height: 200px !important;">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-white mb-0"> quiz responses</h5>
                            <span
                                class="h2 font-weight-bold mb-0 text-white">{{((Auth::user()->role_id ==1) ? ( ($all_quizres ?? false) ? $all_quizres->count() : "0") : (($quizres ?? false) ? $quizres->count() : "0"))}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-white text-success rounded-circle shadow">
                                <i class="ni ni-chart-bar-32"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-nowrap text-white"><i class="fa fa-arrow-up"></i>Last Response
                            Since </span>
                        @if((Auth::user()->role_id ==1 && isset($all_quizres)))
                        <span class="text-white mr-2">
                            {{ $all_quizres[$all_quizres->count()-1]->created_at->diffForHumans()}}</span>
                        @elseif(Auth::user()->role_id == 2 && isset($quizres))
                        <span class="text-white mr-2">
                            {{ $quizres[$quizres->count()-1]->created_at->diffForHumans()}}</span>
                        @else
                        <span class="text-white">No response</span>
                        @endif
                    </p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-4 col-md-6">
        <a href="">
            {{-- {{route('user.show', Auth::user()->id)}} --}}
            <div class="card card-stats bg-gradient-dark border-0" style="height: 200px !important;">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-light mb-0">my profile</h5>
                            <span class="h2 font-weight-bold mb-0 text-white">click here to see your profile
                                details</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                                <i class="ni ni-circle-08"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-nowrap text-white"><i class="fa fa-arrow-up"></i>Last Profile Update
                            Since </span>
                        <span class="text-light mr-2">
                            {{(Auth::user()->updated_at) ? (Auth::user()->updated_at->diffForHumans()) : (Auth::user()->created_at->diffForHumans())}}</span>
                    </p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-4 col-md-6">
        <a href="">
            <div class="card bg-gradient-danger border-0" style="height: 200px !important;">
                <!-- Card body -->
                <div class="card-body h-100">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">
                                {{(Auth::user()->role_id ==1) ? "Student " : " My "}}Performance</h5>
                            <span class="h2 font-weight-bold mb-0 text-white">
                                @if((Auth::user()->role_id == 2))
                                @if(isset($quizres) && isset($all_quizs))
                                {{($quizres->count()/$all_quizs->count())*100}}%
                                @else
                                0%
                                @endif
                                @else
                                @if(($all_quizres ?? false) && $all_quizs && $all_student)
                                <?php
                                                $expected_response = $all_student->count() * $all_quizs->count();
                                            ?>
                                {{round(($all_quizres->count()/$expected_response)*100, 2)}}%
                                @else
                                0%
                                @endif
                                @endif
                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-white text-danger rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-white mr-2"><i class="fa fa-arrow-down"></i> Note</span>
                        <span class="text-wrap text-white">The student Performance is based on the quiz
                            response</span>
                    </p>
                </div>
            </div>
        </a>
    </div>
</div>


<div class="row">
    {{-- <div class="col my-5"> --}}
    <div class="col-lg-12 col-md-12 my-5 mx-auto">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0 text-danger">All due subscriptions</h3>
                {{-- <p class="text-sm mb-0">
                              This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
                            </p> --}}
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                    <thead class="thead-light">
                        <tr>
                            <th>Client Name</th>
                            <th>Service Name</th>
                            <th>Payment Plan</th>
                            <th>Paid (₦)</th>
                            <th>Start</th>
                            <th>Due</th>
                            <th>Status</th>
                            <th>Modified by</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Client Name</th>
                            <th>Service Name</th>
                            <th>Payment Plan</th>
                            <th>Paid (₦)</th>
                            <th>Start</th>
                            <th>Due</th>
                            <th>Status</th>
                            <th>Modified by</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @if ($due_subscriptions)
                        @foreach ($due_subscriptions as $subscription)
                        <tr>
                            <td>{{$subscription->user->name}}</td>
                            <td>{{$subscription->service->name}}</td>
                            <td>{{$subscription->pricing->paymentplan->name}}(₦{{number_format($subscription->pricing->amount, 2, ".", ",")}})
                            </td>
                            <td>{{number_format($subscription->paid, 2, ".", ",")}}</td>
                            <td>{{ $subscription->start->format('Y-m-d') }}</td>
                            <td>{{ $subscription->due->format('Y-m-d') }}</td>
                            <td>{{ $subscription->status }}</td>
                            <td>{{ Str::limit($subscription->creator->name, 10) }}</td>

                            <td class="table-action">
                                <a href="{{route('subscriptions.edit', $subscription)}}" class="table-action"
                                    data-toggle="tooltip" data-original-title="Edit subscription">

                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="{{route('invoice.print', $subscription)}}" class="table-action"
                                    data-toggle="tooltip" data-original-title="Print Invoice">

                                    <i class="fas fa-print"></i>
                                </a>

                                <a href="{{route('invoice.email', $subscription)}}" class="table-action"
                                    data-toggle="tooltip" data-original-title="email invoice to customer">

                                    <i class="fas fa-paper-plane"></i>
                                </a>
                                {{-- <a href="#!" class="table-action table-action-delete" data-toggle="modal"
                                        data-target="#delete{{$subscription->id}}" data-original-title="Delete
                                subscription">
                                <i class="fas fa-trash"></i>
                                </a> --}}
                            </td>


                        </tr>

                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}
</div>
</div>


<!-- Page content end-->

@endsection


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    {{ __('You are logged in!') }}
</div>
</div>
</div>
</div>
</div>
@endsection --}}