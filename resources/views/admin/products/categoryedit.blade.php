@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('product category edit') }}
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
        <h2 class="p-3">Update Product Category</h2>
        <div class="clearfix m-3">
            <a href="{{ route('product.category.index') }}" class="btn btn-primary float-right fa fa-arrow-left"></a>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt-4">

        <!-- Table -->
        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-10 order-lg-2 clearfix">

                <div class="card-wrapper">

                    <!-- Input groups -->
                    <div class="card pb-2">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Update Product Category</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">

                            <form method="POST" action="{{ route('product.category.update', $category) }}">
                                @method('PUT')
                                @csrf
                                {{-- {!! Form::open(['method'=>'POST', 'route' => 'products.store']) !!} --}}
                                <!-- Input groups with icon -->
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <div class="form-group">
                                            <label for="name">Product Category Name<span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge">
                                                {{-- <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-building"></i></span>
                                                </div> --}}
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Product Category Name" id="name"
                                                    value="{{ $category->name }}">
                                                {{-- <input class="form-control" placeholder="Your name" type="text"> --}}
                                            </div>
                                            @error('name')
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