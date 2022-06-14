@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('who we are') }}
@endsection

@section('links')
<!-- Page plugins -->
<link rel="stylesheet" href="{{asset('/css/custom.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{asset('/vendor/quill/dist/quill.core.css')}}"> --}}
<style>
    #editor.ql-container {
        height: auto !important;
        max-height: 500px;
        overflow-y: auto;
    }
</style>
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

<script src="{{asset('/vendor/quill/dist/quill.min.js')}}"></script>
<script>
    var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];

var quill = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow',
  placeholder: "About Us Content..."
});

var form = document.getElementById('act');
    form.onsubmit = function () {
        let content = document.querySelector('#content');
        content.value =  quill.root.innerHTML;
        // JSON.stringify(editor.getContents());
        // console.log('formsubmitted', $('form').serialize(), $('form').serializeArray());
        return true;
    }

    window.onload = function() {
        let content = document.querySelector('#content');
        quill.root.innerHTML = (content.value);
    }
</script>
@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <h2 class="p-3">About Us</h2>

    <!-- Page content -->
    <div class="container-fluid mt-4">

        <!-- Table -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 col-md-10 order-lg-2">

                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card pb-2">
                        <!-- Card header -->
                        <div class="card-header bg-gradient-danger">
                            <h3 class="mb-0 text-white">Modify About Us Content</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" id="act" action="{{ route('about.update', $about) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                {{-- {!! Form::open(['method'=>'POST', 'route' => 'pricings.store']) !!} --}}
                                <!-- Input groups with icon -->
                                <div class="row">

                                    <div class="form-group col-12">
                                        <div class="form-group">
                                            <label for="title">Title<span class="text-danger">*</span></label>
                                            <div class="input-group input-group-merge">
                                                {{-- <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-building"></i></span>
                                                </div> --}}
                                                <input type="text" name="title"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    placeholder="About us title" id="title" value="{{ $about->title }}">
                                                {{-- <input class="form-control" placeholder="Your name" type="text"> --}}
                                            </div>
                                            @error('title')
                                            <span class="invalid-feedback d-block text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-12">

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

                                    <div class="form-group col-12">
                                        <label for="desc">About Us Content</label>
                                        {{-- <div class="input-group input-group-merge"> --}}
                                        <div id="editor"></div>

                                        <input type="hidden" name="content" id="content"
                                            value="{{ $about->content ?? old('content') }}">

                                        @error('content')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        {{-- </div> --}}
                                    </div>


                                </div>



                                <div class="row">
                                    <div class="col-md-12 clearfix mx-auto">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-outline-danger mt-0 float-right"
                                                value="{{ __('Update') }}">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


                <div class="col-lg-10 col-md-10 order-lg-1">

                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">About Us</h3>

                        </div>
                        <div class="table-responsive py-4">
                            <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Title</th>
                                        <th>Contents</th>
                                        <th>Image</th>
                                        <th>Created On</th>
                                        <th>Modified On</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Contents</th>
                                        <th>Image</th>
                                        <th>Created On</th>
                                        <th>Modified On</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @if ($about)
                                    <tr>
                                        <td>{{$about->title}}</td>
                                        <td class="text-wrap">{{ Str::limit($about->content,100) }}</td>
                                        <td><img width="200"
                                                src=" {{ $about->photo ? (asset('images/about_us') .'/'. $about->photo) : '' }}"
                                                alt=""></td>
                                        <td>{{ $about->updated_at->format('Y-m-d') }}</td>
                                        <td>{{ $about->created_at->format('Y-m-d') }}</td>

                                    </tr>
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