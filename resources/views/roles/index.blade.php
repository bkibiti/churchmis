@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">User Role Management</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Users / User Roles</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-warning">
        <div class="card-header">
          
              <a href="{{route('roles.create')}}">
                  <button type="button" class="btn btn-info float-right">
                      Add Role
                  </button>
              </a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
 
        <table id="mydatatable" class="table table-bordered table-striped">
          <thead>
              <tr>
                <th>Role</th>
                <th>Description</th>
                <th>Action</th>
             
              </tr>
          </thead>
          <tbody>
              @foreach($roles as $role)
              <tr>
                <td>{{$role->name}} </td>
                <td>{{$role->description}}</td>
                <td>
              
                    <a href="{{ route('roles.edit', $role->id) }}">
                        <span class="badge badge-primary">
                          <i class="fas fa-edit "></i>
                        </span>
                    </a>
                    <a href="#">
                          <button class="btn"
                                data-id="{{$role->id}}" data-name="{{$role->name}}"
                                type="button" data-toggle="modal" data-target="#delete">
                                <span class="badge badge-danger">
                                  <i class="fas fa-trash"></i>
                                </span>
                        </button>
                    </a>

                </td>
                     
              </tr>
              @endforeach

              </tbody>
          </table>

        </div>
       
      </div>
     
    </div>
  
  </div>
 
</div><!-- /.container-fluid -->
@endsection


@push("page_scripts")
@include('partials.notification')
@include('roles.delete')

<script>

    $('#mydatatable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var message =  "Are you sure you want to delete Role '".concat(button.data('name'), "'?") ;
      var modal = $(this)
      modal.find('.modal-body #message').text(message);
      modal.find('.modal-body #role_id').val(id)
    })

</script>

@endpush
