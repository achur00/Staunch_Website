@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('mission and vision') }}
@endsection

@section('links')
<!-- Theme included stylesheets -->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{asset('/vendor/quill/dist/quill.core.css')}}"> --}}
<style>
    .ql-container{
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

var quill1 = new Quill('#editor1', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow',
  placeholder: "Our Mission..."
});

var quill2 = new Quill('#editor2', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow',
  placeholder: "Our Vision..."
});

var form = document.getElementById('act');
    form.onsubmit = function () {
        let content1 = document.querySelector('#mission');
        content1.value =  quill1.root.innerHTML;


        let content2 = document.querySelector('#vision');
        content2.value =  quill2.root.innerHTML;
        
        // JSON.stringify(editor.getContents());
        // console.log('formsubmitted', $('form').serialize(), $('form').serializeArray());
        return true;
    }

    window.onload = function() {
        let content1 = document.querySelector('#mission');
        quill1.root.innerHTML = (content1.value);

        let content2 = document.querySelector('#vision');
        quill2.root.innerHTML = (content2.value);
    }
</script>

@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    {{-- <div class="d-flex justify-content-between"> --}}
    <h2 class="p-3">Upload Mission and Vision</h2>
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
                        <h3 class="mb-0">Upload Mission and Vision</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" id="act" action="{{ route('missionvision.store') }}" id="act">
                            @method('POST')
                            @csrf
                            <div class="row">


                                <div class="form-group col-12">
                                    <label for="mission">Our Mission</label>
                                    {{-- <div class="input-group input-group-merge"> --}}
                                      <div id="editor1"></div>
                
                                      <input type="hidden" name="mission" id="mission" value="{{ $missionVision->mission ?? old('mission') }}">
                                      
                                      @error('mission')
                                      <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                    {{-- </div> --}}
                                </div>
                
                                {{-- <div class="form-group col-12">
                                    <label for="desc">Our mission<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">

                                        <textarea name="mission" id="desc"
                                            class="form-control @error('mission') is-invalid @enderror"
                                            placeholder="{{__('Our mission')}}" required autocomplete="mission" autofocus
                                            rows="5">{{$missionVision->mission ?? old('mission')}}</textarea>
                                        @error('mission')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="form-group col-12">
                                    <label for="vission">Our Vision</label>
                                    {{-- <div class="input-group input-group-merge"> --}}
                                      <div id="editor2"></div>
                
                                      <input type="hidden" name="vision" id="vision" value="{{ $missionVision->vision ?? old('vision') }}">
                                      
                                      @error('vision')
                                      <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                    {{-- </div> --}}
                                </div>

                                <div class="col-12 form-group">
                                    {{-- <input type="hidden" name="content" id="content" value="{{ $conta->content ?? "" }}">
                                    --}}
                                    <input type="hidden" name="mission_id" value="{{ $missionVision->id ?? ""}}">
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 mt-0 text-right">
                                    <input type="submit" class="btn btn-primary px-3"
                                        value="{{ __('Upload') }}">
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