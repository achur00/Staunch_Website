@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('our skils') }}
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
<script src="{{ asset('vendor/nouislider/distribute/nouislider.min.js') }}"></script>

<script>
    let slider = noUiSlider.create($("#slider")[0], {
        start: [1],
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
    <h2 class="p-3">Our Skills</h2>

    <!-- Page content -->
    <div class="container-fluid mt-4">

        <!-- Table -->
        <div class="row">
            <div class="col-lg-4 col-md-10 order-lg-2">

                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card pb-2">
                        <!-- Card header -->
                        <div class="card-header bg-gradient-danger">
                            <h3 class="mb-0 text-white">Create and Modify Skills</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('skills.store') }}">
                                @method('POST')
                                @csrf
                                {{-- {!! Form::open(['method'=>'POST', 'route' => 'pricings.store']) !!} --}}
                                <!-- Input groups with icon -->
                                <div class="row">

                                    {{-- <div class="form-group "> --}}
                                    <div class="form-group col-12">
                                        <label for="skill">Skill Name<span class="text-danger">*</span></label>
                                        <div class="input-group input-group-merge">
                                            {{-- <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-building"></i></span>
                                                </div> --}}
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Skill Name" id="skill" value="{{ old('name') }}">
                                            {{-- <input class="form-control" placeholder="Your name" type="text"> --}}
                                        </div>
                                        @error('skill')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    {{-- </div>                                     --}}

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


            <div class="col-lg-8 col-md-10 order-lg-1">

                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Skills</h3>

                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Percentage (%)</th>
                                    <th>Created On</th>
                                    <th>Modified On</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Percentage (%)</th>
                                    <th>Created On</th>
                                    <th>Modified On</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @if ($skills)
                                @foreach ($skills as $skill)

                                <tr>
                                    <td>{{$skill->name}}</td>
                                    <td class="">{{ $skill->percentage }}</td>
                                    <td>{{ $skill->updated_at->format('Y-m-d') }}</td>
                                    <td>{{ $skill->created_at->format('Y-m-d') }}</td>
                                    <td class="table-action">
                                        <a href="{{route('skills.edit', $skill)}}" class="table-action" data-toggle="tooltip"
                                          data-original-title="Edit skill">
                  
                                          <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="#!" class="table-action table-action-delete" data-toggle="modal"
                                          data-target="#delete{{$skill->id}}" data-original-title="Delete skill">
                                          <i class="fas fa-trash"></i>
                                        </a>
                                      </td>
                                      {{-- delete modal --}}
                                      <div class="modal fade" tabindex="-1" role="dialog" id="delete{{$skill->id}}">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title text-warning">Warning!</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <p>Are you sure you wanted to delete this Skill?.</p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <form method="POST" , action="{{ route('skills.destroy', $skill)}}" class="">
                                                @csrf
                                                @method('DELETE')
                                                <div class="form-group">
                                                  <input type="submit" value="Delete" class="btn btn-danger float-right">
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