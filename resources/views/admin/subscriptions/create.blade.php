@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('create subscription') }}
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
@endsection

@section('jslinks')
<script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
{{-- <script src="{{ asset('js/custom.js') }}"></script> --}}


<script>
    let service =  $('#service');

    service.on('select2:select', changeStatus);
     
    
      function changeStatus(e) {
        let service_id = $('#service').val();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            // '_token = "{{ csrf_token() }}'
        $.ajax({
                  type:'POST',
                  url: '{{  route('prices.get') }}',
                  data: {
                    'id': service_id
                  },
                  success:function(data) {                 
                    console.log("Succesful");
                    // console.log(data);
                    let price_select =  document.querySelector('#pricing_sel');
                    price_select.innerHTML =`<option value="">Choose Payment Option</option>`;
                    // append option inside select element of Pricing

                    data.forEach( pricing => {
                        price_select.innerHTML +=(`<option value="${ pricing.id }"> ${pricing.paymentplan.name} (₦${pricing.amount.toLocaleString('en-Us')})</option>`);
                    });
                  },
                  error:function(data) {    
                    console.error('error occur');
                   console.table(data);
                  }
    
              });
      }
</script>
@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <h2 class="p-3">Service Subscrption</h2>

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
                            <h3 class="mb-0">Subcribe Client for Service</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('subscriptions.store') }}">
                                @method('POST')
                                @csrf
                                <div class="row">

                                    <div class="form-group col-lg-6">
                                        <label for="user">Client<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                           
                                            {{-- {!! Form::select('role', [''=>'Choose Role']+$roles, null, ['class'=>"form-control ".($errors->has("role") ? "is-invalid" : ''), 'id'=>'role']) !!} --}}
                                            <select name="user_id" id="user"
                                                class="form-control @error('user_id') is-invalid @enderror" data-toggle="select" required>
                                                <option value="">Select Client</option>
                                                @foreach ($clients as $client)
                                                <option value="{{ $client->id }}"
                                                    {{ old('user_id') == $client->id ? "selected" : "" }}>
                                                    {{ $client->email }}</option>
                                                @endforeach
                                               {{-- {{ $client->name}} --}}
                                            </select>
                                            @error('user_id')
                                            <small
                                                class="invalid-feedback text-danger"><strong>{{ $errors->first('user_id') }}</strong></small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group col-lg-6">
                                        <label for="service">Service<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                           
                                            {{-- {!! Form::select('role', [''=>'Choose Role']+$roles, null, ['class'=>"form-control ".($errors->has("role") ? "is-invalid" : ''), 'id'=>'role']) !!} --}}
                                            <select name="service_id" id="service"
                                                class="form-control @error('service_id') is-invalid @enderror" data-toggle="select" required>
                                                <option value="">Choose Service</option>
                                                @foreach ($services as $key =>$value)
                                                <option value="{{ $key }}"
                                                    {{ old('service_id') == $key ? "selected" : "" }}>{{ $value }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
                                            <small
                                                class="invalid-feedback text-danger"><strong>{{ $errors->first('service_id') }}</strong></small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="pricing">Payment Pricing Options (₦)<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            
                                            {{-- {!! Form::select('role', [''=>'Choose Role']+$roles, null, ['class'=>"form-control ".($errors->has("role") ? "is-invalid" : ''), 'id'=>'role']) !!} --}}
                                            <select name="pricing_id" id="pricing_sel"
                                                class="form-control @error('service_id') is-invalid @enderror" data-toggle="select" required>
                                                <option value="">Choose Payment Option</option>
                                               
                                            </select>
                                             {{-- @foreach ($pricings as $pricing)
                                                <option value="{{ $pricing->id }}"
                                                {{ old('pricing_id') == $pricing->id ? "selected" : "" }}>
                                                {{ $pricing->paymentplan->name "($pricing->amount)" }}
                                                </option>
                                                @endforeach --}}
                                            @error('pricing_id')
                                            <small
                                                class="invalid-feedback text-danger"><strong>{{ $errors->first('pricing_id') }}</strong></small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="paid">Amount Paid (₦)<span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                                </div>
                                                <input type="number" name="paid" min="0" value="{{ old('paid') }}"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Amount Paid" id="paid">
                                                {{-- <input class="form-control" placeholder="Your name" type="text"> --}}
                                            </div>
                                            @error('paid')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-datetime-local-input" class="form-control-label">Select
                                                Subscription Start Date<span class="text-danger">*</span></label>
                                            <?php $d = date('Y-m-d');
                                    $t = date('H:i:s'); ?>
                                            <input class="form-control" name="start" type="datetime-local"
                                                value="{{ $d."T".$t }}" id="example-datetime-local-input" />

                                            {{-- {{$d}} --}}
                                            {{-- date('d-M-Y h:i:s A') "2018-11-23T10:30:00" --}}
                                            @error('start')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-datetime-local-input" class="form-control-label">Select
                                                Subscription Due Date<span class="text-danger">*</span></label>
                                            <?php $d = date('Y-m-d');
                                    $t = date('H:i:s'); ?>
                                            <input class="form-control" name="due" type="datetime-local"
                                                value="{{ $d."T".$t }}" id="example-datetime-local-input" />

                                            {{-- {{$d}} --}}
                                            {{-- date('d-M-Y h:i:s A') "2018-11-23T10:30:00" --}}
                                            @error('due')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>



                                </div>

                                <div class="row">
                                    <div class="col-12 mt-1 text-right">
                                        <input type="submit" class="btn btn-primary mt-0 px-5"
                                            value="{{ __('Create Subscription') }}">
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