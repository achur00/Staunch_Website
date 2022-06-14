@extends('layouts.dashboard')

@section('title')
All Subscription
@endsection

@section('links')
<!-- Page plugins -->
<link rel="stylesheet" href="{{asset('/css/custom.css')}}">
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
<!-- Main content -->
<div class="main-content">
    <h2 class="p-3">All Subscription</h2>
    {{-- <!-- Header -->
    <div class="header text-primary py-3 py-lg-4 pt-lg-4">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="">All subscription</h1>
              <p class="text-lead"> This table gave an admin access to manage all available subscription </p>
            </div>
          </div>
        </div>
      </div>
    </div> --}}


    <!-- Page content -->
    <div class="container-fluid mt-5">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="col-lg-11 col-md-11 mx-auto">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">available Subscriptions</h3>
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

                                    @if ($subscriptions)
                                    @foreach ($subscriptions as $subscription)
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
                                            <a href="{{route('subscriptions.edit', $subscription)}}"
                                                class="table-action" data-toggle="tooltip"
                                                data-original-title="Edit subscription">

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
            </div>
        </div>
    </div>
</div>
@endsection