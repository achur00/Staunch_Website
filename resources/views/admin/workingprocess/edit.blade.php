@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Edit work process') }}
@endsection

@section('links')

@endsection

@section('jslinks')

@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <div class="d-flex justify-content-between">
        <h2 class="p-3">Edit working process</h2>
        <div class="clearfix m-3">
            <a href="{{ route('workprocess.index') }}" class="btn btn-primary float-right fa fa-arrow-left"></a>
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
                            <h3 class="mb-0">Edit working process</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('workprocess.update', $workProcess) }}">
                                @method('PUT')
                                @csrf
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label for="name">Process Name<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">

                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Process Name" id="name"
                                                value="{{ $workProcess->name ?? old('name') }}">
                                            {{-- <input class="form-control" placeholder="Your name" type="text"> --}}
                                        </div>
                                        @error('name')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="desc">Process Description<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">

                                            <textarea name="description" id="desc"
                                                class="form-control @error('description') is-invalid @enderror"
                                                placeholder="{{__('Work process description')}}" required
                                                autocomplete="description" autofocus
                                                rows="5">{{ $workProcess->description ?? old('description')}}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-12 mt-1 text-right">
                                        <input type="submit" class="btn btn-primary mt-0 px-3"
                                            value="{{ __('Update Process') }}">
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