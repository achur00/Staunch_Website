@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Update Client') }}
@endsection

@section('links')

@endsection

@section('jslinks')

@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <div class="d-flex justify-content-between">
        <h2 class="p-3">Edit Client Info</h2>
        <div class="clearfix m-3">
            <a href="{{ route('clients.index') }}" class="btn btn-primary float-right fa fa-arrow-left"></a>
        </div>
    </div>
    

    <!-- Page content -->
    <div class="container mt-4">

        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">

                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card pb-2">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Update Client Info</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('clients.update', $user) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                                   
                  
                                  <div class="form-group col-lg-6">
                                    <label for="phone">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                      </div>
                                      {{-- {!! Form::text('phone', null, ['class'=>"form-control ".($errors->has("phone") ? "is-invalid" : ''), 'placeholder'=>'Phone e.g 08164517303', 'pattern'=>'0[0-9]{10}', 'required'=>'', 'autocomplete'=>'phone']) !!} --}}
                                      <input type="text" name="phone" id="phone" value="{{$user->phone}}"
                                        class="form-control @error('phone') is-invalid @enderror" placeholder="{{__('Phone Number')}}"
                                        required autocomplete="phone">
                                      @if ($errors->has('phone'))
                                      <small class="invalid-feedback text-danger"><strong>{{ $errors->first('phone') }}</strong></small>
                                      @endif
                                    </div>
                                  </div>
                  
                                                    
                                  <div class="form-group col-lg-6">
                                    <label for="c-name">Company Name</label>
                                    <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                      </div>
                                      {{-- {!! Form::text('staff_id', null, ['class'=>"form-control ".($errors->has("staff_id") ? "is-invalid" : ''), 'placeholder'=>'Staff ID e.g FUT/23HF/COM', 'autocomplete'=>'staff_id']) !!} --}}
                                      <input type="text" name="company_name" value="{{$user->company_name}}"
                                        class="form-control @error('company_name') is-invalid @enderror"
                                        placeholder="{{__('Company Name')}}" id="c-name" required autocomplete="company_name">
                                      @if ($errors->has('company_name'))
                                      <small
                                        class="invalid-feedback text-danger"><strong>{{ $errors->first('company_name') }}</strong></small>
                                      @endif
                                    </div>
                                  </div>
                  
                                  <div class="form-group col-lg-6">
                                    <label for="c-address">Company Address</label>
                                    <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                      </div>
                                      {{-- {!! Form::text('matric_number', null, ['class'=>"form-control ".($errors->has("matric_number") ? "is-invalid" : ''), 'placeholder'=>'Matric e.g ND/17/COM/FT/125', 'autocomplete'=>'matric_number']) !!} --}}
                                      <input type="text" name="company_address" id="c-address" value="{{$user->company_address}}"
                                        class="form-control @error('company_address') is-invalid @enderror"
                                        placeholder="{{__('Company Address')}}" required autocomplete="company_address">
                                      @if ($errors->has('company_address'))
                                      <small class="invalid-feedback text-danger"><strong>{{ $errors->first('address') }}</strong></small>
                                      @endif
                                    </div>
                                </div>    
                                
                                <div class="form-group col-lg-6">

                                    <h4 class="text-default font-weight-normal">Maximum size: 5MB
                                    </h4>
                                    <div class="custom-file mb-1" style="">
                                        <input type="file" name="photo"
                                            class="custom-file-input @error('photo') is-invalid @enderror"
                                            id="customFile" accept=".jpeg, .jpg, .png">
                                        <label class="custom-file-label" for="customFile"></label>
                                    </div>

                                    @error('photo')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                 
                  
                                </div>
                  
                                <div class="row">                  
                                  <div class="col-12 mt-1 text-right">
                                    <input type="submit" class="btn btn-primary mt-0 px-7 " value="{{ __('Update') }}">
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