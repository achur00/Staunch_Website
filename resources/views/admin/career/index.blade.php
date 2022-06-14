@extends('layouts.dashboard')

@section('title')
All Application
@endsection

@section('links')
<!-- Page plugins -->
<link rel="stylesheet" href="{{asset('/css/custom.css')}}">
{{-- <link rel="stylesheet" href="{{asset('/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"> 
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">--}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.0.1/r-2.2.9/rr-1.2.8/datatables.min.css"/>

@endsection

@section('jslinks')
<!-- Optional JS -->
{{-- <script src="{{asset('/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="{{asset('/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script> 
<script src="{{asset('/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>--}}
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.0.1/r-2.2.9/rr-1.2.8/datatables.min.js"></script>
<script>
  $('document').ready(function(){

  $('#datatable-buttons-sp').DataTable({
      rowReorder: {
        selector: 'td:nth-child(2)'
      },
      responsive: true
  });

});
</script>
@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
  <h2 class="p-3">All Application</h2>
 
  <!-- Page content -->
  <div class="container-fluid mt-5">
    <!-- Table -->
    <div class="row">
      <div class="col">
        <div class="col-lg-11 col-md-11 mx-auto">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Job Applications</h3>
              
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush table-hover table-striped" id="datatable-buttons-sp" style="width: 100%;">
                <thead class="thead-light">
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>gender</th>
                    <th>Skills</th>
                    <th>Website</th>
                    <th>CV</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>gender</th>
                    <th>Skills</th>
                    <th>Website</th>
                    <th>CV</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>

                  @if (isset($applications) && $applications->count() > 0)
                  @foreach ($applications as $item)
                  <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->gender}}</td>
                    <td>{{$item->skills}}</td>
                    <td>
                      <a href="{{ $item->website }}">View</a>
                    </td>
                    <td>
                        <a href="{{ asset('images/cv').'/'.$item->cv }}" download="">Download</a>
                    </td>
                    <td class="table-action">
                      <a href="#!" class="table-action table-action-delete" data-toggle="modal"
                        data-target="#delete{{$item->id}}" data-original-title="Delete Apllication">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                    {{-- delete modal --}}
                    <div class="modal fade" tabindex="-1" role="dialog" id="delete{{$item->id}}">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-warning">Warning!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure you wanted to delete this Application?.</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form method="POST" , action="{{ route('careers.destroy', $item)}}" class="">
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