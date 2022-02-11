@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Service pricing') }}
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
    <h2 class="p-3">Service Pricing</h2>

    <!-- Page content -->
    <div class="container-fluid mt-4">

        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-10 order-lg-2">

                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card pb-2">
                        <!-- Card header -->
                        <div class="card-header bg-gradient-danger">
                            <h3 class="mb-0 text-white">Craete New Service Pricing</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('pricing.store') }}">
                                @method('POST')
                                @csrf
                                {{-- {!! Form::open(['method'=>'POST', 'route' => 'pricings.store']) !!} --}}
                                <!-- Input groups with icon -->
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="service">Service<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="ni ni-bullet-list-67"></i></span>
                                            </div>
                                            {{-- {!! Form::select('role', [''=>'Choose Role']+$roles, null, ['class'=>"form-control ".($errors->has("role") ? "is-invalid" : ''), 'id'=>'role']) !!} --}}
                                            <select name="service_id" id="service"
                                                class="form-control @error('service_id') is-invalid @enderror" required>
                                                <option value="">Choose Service</option>
                                                @foreach ($services as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
                                            <small
                                                class="invalid-feedback text-danger"><strong>{{ $errors->first('service_id') }}</strong></small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="pp">Payment Plan<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="ni ni-bullet-list-67"></i></span>
                                            </div>
                                            {{-- {!! Form::select('role', [''=>'Choose Role']+$roles, null, ['class'=>"form-control ".($errors->has("role") ? "is-invalid" : ''), 'id'=>'role']) !!} --}}
                                            <select name="paymentplan_id" id="pp"
                                                class="form-control @error('product_category') is-invalid @enderror"
                                                required>
                                                <option value="">Choose payment Plan</option>
                                                @foreach ($paymentplans as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('paymentplan_id')
                                            <small
                                                class="invalid-feedback text-danger"><strong>{{ $errors->first('paymentplan_id') }}</strong></small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mx-auto">
                                        <div class="form-group">
                                            <label for="amount">Amount<span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-hashtag"></i></span>
                                                </div>
                                                <input type="number" name="amount" min="1"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Service Price" id="amount">
                                                {{-- <input class="form-control" placeholder="Your name" type="text"> --}}
                                            </div>
                                            @error('amount')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 clearfix mx-auto">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-outline-danger mt-0 float-right"
                                                value="{{ __('Create') }}">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-10 order-lg-1">

                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">All Pricing Plan</h3>
                        {{-- <p class="text-sm mb-0">
                          This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
                        </p> --}}
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>Service Name</th>
                                    <th>Plan Type</th>
                                    <th>Amount (₦)</th>
                                    <th>Modified by</th>
                                    <th>Modified On</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Service Name</th>
                                    <th>Plan Type</th>
                                    <th>Amount (₦)</th>
                                    <th>Modified by</th>
                                    <th>Modified On</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @if ($pricings)
                                @foreach ($pricings as $pricing)
                                <tr>
                                    <td>{{$pricing->service->name}}</td>
                                    <td>{{ $pricing->paymentplan->name }}</td>
                                    <td>{{number_format($pricing->amount, 2, ".", ",")}}</td>
                                    <td>{{$pricing->user->name}}</td>
                                    <td>{{ $pricing->updated_at->format('Y-m-d') }}</td>
                                    <td class="table-action">
                                        <a href="{{route('pricing.edit', $pricing)}}" class="table-action"
                                            data-toggle="tooltip" data-original-title="Edit pricing plan">

                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#!" class="table-action table-action-delete" data-toggle="modal"
                                            data-target="#delete{{$pricing->id}}" data-original-title="Delete plan">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    {{-- delete modal --}}
                                    <div class="modal fade" tabindex="-1" role="dialog" id="delete{{$pricing->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-warning">Warning!</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you wanted to delete this Pricing plan?.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form method="POST" action="{{ route('pricing.destroy', $pricing)}}"
                                                        class="">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="form-group">
                                                            <input type="submit" value="Delete"
                                                                class="btn btn-danger float-right">
                                                        </div>
                                                    </form>
                                                    {{-- <a class="btn btn-danger" href="{{route('tourcenters.destroy', $tour->id)}}">Delete</a>
                                                    --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end delete modal --}}

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

@endsection