@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('modify policy') }}
@endsection

@section('links')
<!-- Theme included stylesheets -->
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
{{-- <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script> --}}
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
  placeholder: "Input Staunch Terms..."
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
    {{-- <div class="d-flex justify-content-between"> --}}
    <h2 class="p-3">Modify Staunch Policy</h2>
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
                        <h3 class="mb-0">Modify Staunch Policy</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('policy.store') }}" id="act">
                            @method('POST')
                            @csrf
                            <div class="row">

                                <div class="col-12">
                                    <label for="editor">Policies<span class="text-danger">*</span></label>
                                    <div id="editor"></div>
                                    @error('content')
                                    <span class="invalid-feedback d-block text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12 form-group">
                                    <input type="hidden" name="content" id="content"
                                        value="{{ $policy->content ?? "" }}">
                                    <input type="hidden" name="policy" value="{{ $policy->id ?? ""}}">
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 mt-0 text-right">
                                    <input type="submit" class="btn btn-primary px-3" value="{{ __('Update Terms') }}">
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