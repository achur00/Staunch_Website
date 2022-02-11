@extends('layouts.dashboard')

@section('title')
All project
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
  <div class="d-flex justify-content-between">
    <h2 class="p-3">All project</h2>
    <div class="clearfix m-3">
      <a href="{{ route('projects.create') }}" class="btn btn-primary float-right">Create New Project</a>
    </div>
  </div>

  {{-- <!-- Header -->
    <div class="header text-primary py-3 py-lg-4 pt-lg-4">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="">All user</h1>
              <p class="text-lead"> This table gave an admin access to manage all available user </p>
            </div>
          </div>
        </div>
      </div>
    </div> --}}


  <!-- Page content -->
  <div class="container-fluid mt-5">
    <!-- Table -->
    <div class="row">
      <div class="col">
        <div class="col-lg-11 col-md-11 mx-auto">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Available projects</h3>
              {{-- <p class="text-sm mb-0">
                  This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
                </p> --}}
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush table-hover table-striped" id="datatable-buttons">
                <thead class="thead-light">
                  <tr>
                    <th>project Name</th>
                    <th>Demo URL</th>
                    {{-- <th>Description</th> --}}
                    <th>Category</th>
                    <th>Modified by</th>
                    <th>Modified On</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>project Name</th>
                    <th>Demo URL</th>
                    {{-- <th>Description</th> --}}
                    <th>Category</th>
                    <th>Modified by</th>
                    <th>Modified On</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>

                  @if ($projects)
                  @foreach ($projects as $project)
                  <tr>
                    <td>{{$project->name}}</td>
                    <td>
                      <a href="{{$project->url}}">View</a>
                    </td>
                    {{-- <td>{{Str::limit($project->description, 60)}}</td> --}}
                    <td>{{$project->category->name}}</td>
                    <td>
                      {{ ucwords(Str::limit($project->user->name, 18)) }}
                    </td>
                    <td>{{ $project->updated_at->format('Y-m-d') }}</td>
                    <td class="table-action">
                      <a href="{{route('projects.edit', $project)}}" class="table-action" data-toggle="tooltip"
                        data-original-title="Edit project">

                        <i class="fas fa-user-edit"></i>
                      </a>
                      <a href="#!" class="table-action table-action-delete" data-toggle="modal"
                        data-target="#delete{{$project->id}}" data-original-title="Delete project">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                    {{-- delete modal --}}
                    <div class="modal fade" tabindex="-1" role="dialog" id="delete{{$project->id}}">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-warning">Warning!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure you wanted to delete this project?.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form method="POST" , action="{{ route('projects.destroy', $project)}}" class="">
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
</div>
@endsection