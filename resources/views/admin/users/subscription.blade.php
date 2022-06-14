@extends('layouts.dashboard')

@section('title')
{{ $subscriptions[0]->user->company_name ?? ""}} Subscriptions
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

<script>
    // "use strict"

    // let tbody = document.querySelector('tbody');
    // const fm = '<form id="invoice-form" action="{{route('multiple.invoice')}}" method="post">
    //     @csrf
    //     @method('POST')';
    // tbody.prepend(fm);
    // tbody.appendChild(`</form>`);


    // $('#invoice-button').click(function (){
    //     $('#invoice-form').submit();
    // });

    // let btn = document.querySelector('#invoice-button');
    // let myform = document.querySelector('#invoice-form');
    // btn.addEventListener('click', function(){
    //     // alert(myform);
    //     $('#invoice-form').submit();
    //     // myform.dispatchEvent(new Event('submit'));
    // });
</script>

@endsection

@section('js_after')
<script>
    "use strict"

    // let tbody = document.querySelector('#tbody');
    // let fm = document.createElement('form');
    // fm.setAttribute('id', "invoice-form");
    // fm.setAttribute('action', "{{route('multiple.invoice')}}");
    // fm.setAttribute('method', "post");
    // fm.textContent = `@csrf`;

// let fm =`<form id="invoice-form" action="{{route('multiple.invoice')}}" method="post">
// @csrf
// @method('POST')`;
    

    // $(document).ready(function(){
    //     $('#tbody').prepend(fm);
    //     $('#tbody').append(`</form>`);
    // });


    $('#invoice-button').click(function (){
        $('#invoice-form').submit();
    });

</script>
@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <h2 class="p-3"><span class="text-danger">{{ $subscriptions[0]->user->company_name ?? ""}}</span> Subscriptions</h2>
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
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="mb-0">available Subscriptions for
                                {{ $subscriptions[0]->user->company_name ?? ""}}</h3>
                            <div>
                                <button type="button" class="btn btn-primary" id="invoice-button">Print Selected
                                    invoice</button>
                            </div>
                            @if($subscriptions->count() > 0)
                            <div>
                               
                                <a href="{{ route('invoices.print', $subscriptions[0]->user) }}"
                                    class="btn btn-primary">Print all Invoice</a>
                                
                            </div>
                            @endif
                        </div>
                        <div class="table-responsive py-4">
                            <form id="invoice-form" action="{{route('multiple.invoice')}}" method="post">
                                @csrf
                                @method('POST')
                                <table class="table table-flush table-hover table-striped" id="datatable-buttons">

                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
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
                                            <th>#</th>
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

                                    {{-- <form id="invoice-form" action="{{route('multiple.invoice')}}" method="post">
                                    @csrf
                                    @method('POST') --}}

                                    <tbody id="tbody">

                                        @if ($subscriptions->count() > 0)

                                        @foreach ($subscriptions as $key => $subscription)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" value="{{$subscription->id}}"
                                                        class="form-check-input" id="exampleCheck1" name="invoice_id[]">
                                                    <label class="form-check-label m-1"
                                                        for="exampleCheck1">{{ ($key+1) }}</label>
                                                    {{-- + ($subscription->currentPage() - 1)*$subscription->perPage() --}}
                                                </div>

                                            </td>
                                            <td>{{$subscription->user->name}}</td>
                                            <td>{{$subscription->service->name}}</td>
                                            <td>{{$subscription->pricing->paymentplan->name}}
                                                (₦{{number_format($subscription->pricing->amount, 2, ".", ",")}})
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

                                                <a href="{{route('invoice.print' ,$subscription)}}" class="table-action"
                                                    data-toggle="tooltip" data-original-title="Print Invoice">

                                                    <i class="fas fa-print"></i>
                                                </a>

                                                <a href="{{route('invoice.email', $subscription)}}" class="table-action"
                                                    data-toggle="tooltip"
                                                    data-original-title="email invoice to customer">

                                                    <i class="fas fa-paper-plane"></i>
                                                </a>
                                            </td>


                                        </tr>
                                        @endforeach

                                        @endif

                                    </tbody>

                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection