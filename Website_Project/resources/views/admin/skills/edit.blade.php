@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('Edit skill') }}
@endsection

@section('links')

@endsection

@section('jslinks')
<script src="{{ asset('vendor/nouislider/distribute/nouislider.min.js') }}"></script>
<script>
    let slider = noUiSlider.create($("#slider")[0], {
        start: [{{ $skill->percentage }}],
        range: {min: 1, max: 100},
        step: 1,
        tooltips: true,
        connect: [true, false],
    });
    $('#slider-input').val(slider.get());

    slider.on('change', function(){
        $('#slider-input').val(slider.get());
    });

</script>
@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    <div class="d-flex justify-content-between">
        <h2 class="p-3">Edit Skill</h2>
        <div class="clearfix m-3">
            <a href="{{ route('skills.index') }}" class="btn btn-primary float-right fa fa-arrow-left"></a>
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
                            <h3 class="mb-0">Edit Skills</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('skills.update', $skill) }}">
                                @method('PUT')
                                @csrf
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label for="skill">Skill Name<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Skill Name" id="skill" value="{{ $skill->name }}">
                                            {{-- <input class="form-control" placeholder="Your name" type="text"> --}}
                                        </div>
                                        @error('skill')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="desc">Skill Percentage</label>
                                        <div id="slider">
                                        </div>
                                        <input type="hidden" name="percentage" id="slider-input" value="">
                                        @error('percentage')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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
                                        <input type="submit" class="btn btn-primary mt-0 px-3"
                                            value="{{ __('Update Skill') }}">
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