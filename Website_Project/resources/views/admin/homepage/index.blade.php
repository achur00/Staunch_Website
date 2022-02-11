@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('upload homepage info') }}
@endsection

@section('links')

@endsection

@section('jslinks')

@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    {{-- <div class="d-flex justify-content-between"> --}}
    <h2 class="p-3">Upload homepage Info</h2>
    {{-- <div class="clearfix m-3">
            <a href="{{ route('skills.index') }}" class="btn btn-primary float-right fa fa-arrow-left"></a>
</div> --}}
{{-- </div> --}}
<!-- Page content -->
<div class="container mt-4">

    <!-- Table -->
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-9">

            <div class="card-wrapper">
                <!-- Input groups -->
                <div class="card pb-2">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Upload homepage Info</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('homepage.store') }}" id="act">
                            @method('POST')
                            @csrf
                            <div class="row">

                                <div class="form-group col-lg-12">
                                    <label for="title">Page title<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                        </div>
                                        <input type="text" name="title" id="title"
                                            value="{{ $homepage->title ?? old('title')}}"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="{{__('Page title')}}" required autocomplete="title" autofocus>
                                        @error('title')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="desc">Page description<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">

                                        <textarea name="description" id="desc"
                                            class="form-control @error('description') is-invalid @enderror"
                                            placeholder="{{__('Page description')}}" required autocomplete="description"
                                            autofocus
                                            rows="5">{{$homepage->description ?? old('description')}}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="desc">Page metatags<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">

                                        <textarea name="metatags" id="desc"
                                            class="form-control @error('metatags') is-invalid @enderror"
                                            placeholder="{{__('homepage metatags')}}" required autocomplete="metatags"
                                            autofocus rows="5">{!! $homepage->metatags ?? old('metatags') !!}</textarea>
                                        @error('metatags')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-12 form-group">
                                    {{-- <input type="hidden" name="content" id="content" value="{{ $conta->content ?? "" }}">
                                    --}}
                                    <input type="hidden" name="homepage" value="{{ $homepage->id ?? ""}}">
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 mt-0 text-right">
                                    <input type="submit" class="btn btn-primary px-3"
                                        value="{{ __('Upload homepage info') }}">
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