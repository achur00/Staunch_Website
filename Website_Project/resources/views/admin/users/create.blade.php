@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('create user') }}
@endsection

@section('links')

@endsection

@section('jslinks')
{{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
  <h2 class="p-3">Add User</h2>
  <!-- Page content -->
  <div class="container mt-4">
    <!-- Table -->
    <div class="row justify-content-center">
      <div class="col-lg-10 col-md-9">
        <div class="card bg-secondary border-0">
          <div class="card-header bg-transparent">
            <div class="text-muted text-center">
              <span class="text-danger">
                Register New User, Client/Staff
              </span>
            </div>
          </div>
          <div class="card-body px-lg-5">
            {{-- <div class="text-center text-muted mb-4">
                <small>sign them up with their credentials</small>
              </div> --}}

            <form method="POST" action="{{ route('users.store') }}">
              @method('POST')
              @csrf
              <div class="row">
                <div class="form-group col-lg-6">
                  <label for="name">Full Name</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input type="text" id="name" name="name" value="{{old('name')}}"
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
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    {{-- {!! Form::email('email', old('email'), ['class'=>"form-control ".($errors->has("email") ? "is-invalid" : ''), 'placeholder'=>'Email', 'required'=>'', 'autocomplete'=>'email']) !!} --}}
                    <input type="email" id="email" name="email" value="{{old('email')}}"
                      class="form-control  @error('email') is-invalid @enderror" placeholder="{{__('Email Address')}}"
                      required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group col-lg-6">
                  <label for="phone">Phone Number</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                    </div>
                    {{-- {!! Form::text('phone', null, ['class'=>"form-control ".($errors->has("phone") ? "is-invalid" : ''), 'placeholder'=>'Phone e.g 08164517303', 'pattern'=>'0[0-9]{10}', 'required'=>'', 'autocomplete'=>'phone']) !!} --}}
                    <input type="tel" id="phone" name="phone" value="{{old('phone')}}"
                      class="form-control @error('phone') is-invalid @enderror" placeholder="{{__('Phone Number')}}"
                      required autocomplete="phone">
                    @if ($errors->has('phone'))
                    <small class="invalid-feedback text-danger"><strong>{{ $errors->first('phone') }}</strong></small>
                    @endif
                  </div>
                </div>

                <div class="form-group col-lg-6">
                  <label for="role">Choose User Role</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    {{-- {!! Form::select('role', [''=>'Choose Role']+$roles, null, ['class'=>"form-control ".($errors->has("role") ? "is-invalid" : ''), 'id'=>'role']) !!} --}}
                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                      <option value="">Choose Role</option>
                      @foreach ($roles as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                    </select>
                    @error('role')
                    <small class="invalid-feedback text-danger"><strong>{{ $errors->first('role') }}</strong></small>
                    @enderror
                  </div>
                </div>

                <div class="form-group col-lg-6">
                  <label for="c-name">Company Name</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-badge"></i></span>
                    </div>
                    {{-- {!! Form::text('staff_id', null, ['class'=>"form-control ".($errors->has("staff_id") ? "is-invalid" : ''), 'placeholder'=>'Staff ID e.g FUT/23HF/COM', 'autocomplete'=>'staff_id']) !!} --}}
                    <input type="text" id="c-name" name="company_name" value="{{old('company_name')}}"
                      class="form-control @error('company_name') is-invalid @enderror"
                      placeholder="{{__('Company Name')}}" required autocomplete="company_name">
                    @if ($errors->has('company_name'))
                    <small
                      class="invalid-feedback text-danger"><strong>{{ $errors->first('company_name') }}</strong></small>
                    @endif
                  </div>
                </div>

                <div class="form-group col-lg-6">
                  <label for="c-address">Company Address</label>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-badge"></i></span>
                    </div>
                    {{-- {!! Form::text('matric_number', null, ['class'=>"form-control ".($errors->has("matric_number") ? "is-invalid" : ''), 'placeholder'=>'Matric e.g ND/17/COM/FT/125', 'autocomplete'=>'matric_number']) !!} --}}
                    <input type="text" id="c-address" name="company_address" value="{{old('company_address')}}"
                      class="form-control @error('company_address') is-invalid @enderror"
                      placeholder="{{__('Company Address')}}" required autocomplete="company_address">
                    @if ($errors->has('company_address'))
                    <small class="invalid-feedback text-danger"><strong>{{ $errors->first('address') }}</strong></small>
                    @endif
                  </div>
                </div>



                <div class="form-group col-lg-6 col-sm-12" id="">
                  <label for="password">Password</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    {{-- {!! Form::password('password', ['class'=>"form-control ".($errors->has('password') ? "is-invalid" : ''), 'placeholder'=> 'Password', 'required'=>'', 'autocomplete'=>'new-password']) !!} --}}
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                      placeholder="{{__('Password')}}" required autocomplete="new-password">
                    @if ($errors->has('password'))
                    <small
                      class="invalid-feedback text-danger"><strong>{{ $errors->first('password') }}</strong></small>
                    @endif
                  </div>
                </div>

                <div class="form-group col-lg-6 col-sm-12" id="">
                  <label for="password-confirm">Confirm Password</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}"
                      class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                  <input type="submit" class="btn btn-primary mt-0 px-7 " value="{{ __('Register') }}">
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection