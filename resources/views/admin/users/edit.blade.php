@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('edit user') }}
@endsection

@section('links')

@endsection

@section('jslinks')

@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <h2 class="p-3">Edit user</h2>

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
                            <h3 class="mb-0">Update User Info</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.update', $user) }}">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                  <div class="form-group col-lg-6">
                                    <label for="name">Full Name</label>
                                    <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                      </div>
                                      <input type="text" name="name" id="name" value="{{ $user->name }}"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="{{__('Full Name')}}"
                                        required autocomplete="name" autofocus>
                                      @error('name')
                                      <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                    </div>
                                  </div>
                  
                                  <div class="form-group col-lg-6">
                                    <label for="email">Email Address</label>
                                    <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                      </div>
                                      {{-- {!! Form::email('email', old('email'), ['class'=>"form-control ".($errors->has("email") ? "is-invalid" : ''), 'placeholder'=>'Email', 'required'=>'', 'autocomplete'=>'email']) !!} --}}
                                      <input type="email" name="email" id="email" value="{{$user->email}}"
                                        class="form-control @error('email') is-invalid @enderror" disabled placeholder="{{__('Email Address')}}"
                                      >
                                      @error('email')
                                      <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                    </div>
                                  </div>
                  
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
                                    <label for="role">Choose User Role</label>
                                    <div class="input-group input-group-merge">
                                      
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-building"></i></span>
                                      </div>
                                      {{-- {!! Form::select('role', [''=>'Choose Role']+$roles, null, ['class'=>"form-control ".($errors->has("role") ? "is-invalid" : ''), 'id'=>'role']) !!} --}}
                                      <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                                        <option value="">Choose Role</option>
                                        @foreach ($roles as $key => $value)
                                        <option value="{{ $key }}" {{ $key == $user->role_id ? "selected" : ""}}>{{ $value }}</option>
                                        @endforeach
                                      </select>
                                      @error('role')
                                      <small class="invalid-feedback text-danger"><strong>{{ $errors->first('role') }}</strong></small>
                                      @enderror
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
                  
                  
                  
                                  <div class="form-group col-lg-12 col-sm-12" id="">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                      </div>
                                      {{-- {!! Form::password('password', ['class'=>"form-control ".($errors->has('password') ? "is-invalid" : ''), 'placeholder'=> 'Password', 'required'=>'', 'autocomplete'=>'new-password']) !!} --}}
                                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="{{__('Password')}}" id="password" autocomplete="new-password">
                                      @if ($errors->has('password'))
                                      <small
                                        class="invalid-feedback text-danger"><strong>{{ $errors->first('password') }}</strong></small>
                                      @endif
                                    </div>
                                  </div>
                  
                                 
                  
                                </div>
                  
                                <div class="row">
                                  {{-- <div class="col-lg-6 col-sm-12 mt-3 mb-4">
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            {!! Form::checkbox('accept', 'accepted', null, ['id'=>'customCheckRegister', 'required'=>'', 'class'=>'custom-control-input']) !!}
                                            <label class="custom-control-label" for="customCheckRegister">
                                                <span class="text-muted">I agreed that all info provided are genuine</span>
                                            </label>
                                        </div>
                                    </div> --}}
                  
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