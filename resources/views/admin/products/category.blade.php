@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('product category') }}
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
    <h2 class="p-3">Product Category</h2>

    <!-- Page content -->
    <div class="container-fluid mt-4">

        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-10 order-lg-2">

                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card pb-2">
                        <!-- Card header -->
                        <div class="card-header bg-gradient-danger">
                            <h3 class="mb-0">Craete New Product Category</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('product.category.store') }}">
                                @method('POST')
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
                                                    placeholder="Product Category Name" id="name">
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

            <div class="col-lg-7 col-md-10 order-lg-1">

                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">All Product Categories</h3>
                        {{-- <p class="text-sm mb-0">
                          This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
                        </p> --}}
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>Category Name</th>
                                    <th>Created On</th>
                                    <th>Modified On</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Created On</th>
                                    <th>Modified On</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @if ($categories)
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $category->updated_at->format('Y-m-d') }}</td>
                                    <td class="table-action">
                                        <a href="{{route('product.category.edit', $category)}}" class="table-action"
                                            data-toggle="tooltip" data-original-title="Edit product category">

                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#!" class="table-action table-action-delete" data-toggle="modal"
                                            data-target="#delete{{$category->id}}"
                                            data-original-title="Delete category">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    {{-- delete modal --}}
                                    <div class="modal fade" tabindex="-1" role="dialog" id="delete{{$category->id}}">
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
                                                    <p>Are you sure you wanted to delete this Product category?.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <form method="POST"
                                                        action="{{ route('products.destroy', $category)}}" class="">
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