@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('service prie edit') }}
@endsection

@section('links')
<!-- Page plugins -->
<link rel="stylesheet" href="{{asset('/css/custom.css')}}">

@endsection

@section('jslinks')
<!-- Optional JS -->
@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <div class="d-flex justify-content-between">
        <h2 class="p-3">Update service price</h2>
        <div class="clearfix m-3">
            <a href="{{ route('pricing.index') }}" class="btn btn-primary float-right fa fa-arrow-left"></a>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt-4">

        <!-- Table -->
        <div class="row justify-content-center">

            <div class="col-lg-8 col-md-10 order-lg-2 clearfix">

                <div class="card-wrapper">

                    <!-- Input groups -->
                    <div class="card pb-2">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Update service pricing</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">

                            <form method="POST" action="{{ route('pricing.update', $pricing) }}">
                                @method('PUT')
                                @csrf
                                {{-- {!! Form::open(['method'=>'POST', 'route' => 'payments.store']) !!} --}}
                                <!-- Input groups with icon -->
                                <div class="row">
                                    <div class="form-group col-lg-6">
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
                                                <option value="{{ $key }}" {{ $pricing->service_id == $key ? "selected" : "" }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
                                            <small
                                                class="invalid-feedback text-danger"><strong>{{ $errors->first('service_id') }}</strong></small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6">
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
                                                <option value="{{ $key }}" {{ $pricing->paymentplan_id == $key ? "selected" : "" }}>{{ $value }}</option>
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
                                                <input type="number" name="amount" min="1" value="{{ $pricing->amount }}"
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
                                            <input type="submit" class="btn btn-danger mt-0 float-right"
                                                value="{{ __('Update') }}">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection