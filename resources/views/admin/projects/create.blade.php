@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('create project') }}
@endsection

@section('links')
<!-- Theme included stylesheets -->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{asset('/vendor/quill/dist/quill.core.css')}}"> --}}
<style>
    #editor.ql-container{
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
  placeholder: "Project Description..."
});

var form = document.getElementById('act');
    form.onsubmit = function () {
        let content = document.querySelector('#description');
        content.value =  quill.root.innerHTML;
        // JSON.stringify(editor.getContents());
        // console.log('formsubmitted', $('form').serialize(), $('form').serializeArray());
        return true;
    }

    window.onload = function() {
        let content = document.querySelector('#description');
        quill.root.innerHTML = (content.value);
    }
</script>
@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
  <div class="d-flex justify-content-between">
    <h2 class="p-3">Add project</h2>
    <div class="clearfix m-3">
      <a href="{{ route('projects.index') }}" class="btn btn-primary float-right">Project List</a>
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
              <h3 class="mb-0">Add New project</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <form method="POST" id="act" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="row">

                  <div class="form-group col-lg-6">
                    <label for="name">project Name</label>
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                      </div>
                      <input type="text" name="name" value="{{old('name')}}"
                        class="form-control @error('name') is-invalid @enderror" placeholder="{{__('project Name')}}"
                        required autocomplete="name" autofocus>
                      @error('name')
                      <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group col-lg-6">
                    <label for="cat">project Category</label>
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
                      </div>
                      {{-- {!! Form::select('role', [''=>'Choose Role']+$roles, null, ['class'=>"form-control ".($errors->has("role") ? "is-invalid" : ''), 'id'=>'role']) !!} --}}
                      <select name="project_category" id="cat"
                        class="form-control @error('project_category') is-invalid @enderror" required>
                        <option value="">Choose Category</option>
                        @foreach ($project_categories as $key => $value)
                        <option value="{{ $key }}" {{ old('project_category') == $key ? "selected" : "" }}>{{ $value }}
                        </option>
                        @endforeach
                      </select>
                      @error('project_category')
                      <small
                        class="invalid-feedback text-danger"><strong>{{ $errors->first('project_category') }}</strong></small>
                      @enderror
                    </div>
                  </div>



                  <div class="form-group col-lg-6">
                    <label for="url">project Demo URL</label>
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-link"></i></span>
                      </div>
                      <input type="url" name="url" value="{{old('url')}}"
                        class="form-control @error('name') is-invalid @enderror" placeholder="{{__('Demo URL')}}"
                        autocomplete="url" id="url" autofocus>
                      @error('url')
                      <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group col-lg-6">
                    <label for="tools">project Tools/Languages </label>
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
                      </div>
                      <input type="text" name="tools" value="{{old('tools')}}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{__('project Tools e.g (PHP, LARAVEL, BOOTSTRAP 5)')}}" required
                        autocomplete="tools" autofocus>
                      @error('tools')
                      <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group col-lg-12">
                    {{-- <div class="image-input"> --}}
                    {{-- <h6>Formart allowed: jpg, png, jpeg</h6> --}}

                    <h4 class="text-default font-weight-normal">Maximum size per each photo: 5MB </h4>
                    <div class="custom-file mb-1" style="">
                      <input type="file" name="photos[]" multiple
                        class="custom-file-input @error('photos') is-invalid @enderror" id="customFile"
                        accept=".jpeg, .jpg, .png">
                      <label class="custom-file-label" for="customFile"></label>
                    </div>

                    @error('photos')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @foreach ($errors->get('photos.*') as $message)
                    @if ($message)
                    @foreach ($message as $msg)
                    <span class="invalid-feedback d-block" role="alert">
                      <strong> {{$msg ?? ''}}</strong>
                    </span>
                    @endforeach
                    @endif
                    @endforeach
                    {{-- </div> --}}
                  </div>

                  <div class="form-group col-12">
                    <label for="desc">Project Description</label>
                    {{-- <div class="input-group input-group-merge"> --}}
                      <div id="editor"></div>

                      <input type="hidden" name="description" id="description" value="{{ old('description') }}">
                      
                      @error('description')
                      <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    {{-- </div> --}}
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
                    <input type="submit" class="btn btn-primary mt-0 px-5" value="{{ __('Create') }}">
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