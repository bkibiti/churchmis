@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
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
          
              <button type="button" style="float: right; margin-bottom: 1%;" class="btn btn-info float-right" data-toggle="modal" 
                  title="Add User" data-target="#register">Add User
              </button>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
 
        <table id="mydatatable" class="table table-bordered table-striped">
          <thead>
              <tr>
              <th>Name</th>
              <th>E-mail</th>
              <th>Mobile</th>
              <th>Role</th>
              <th>Status</th>
              {{-- @can('Manage Users') --}}
              <th>Action</th>
              {{-- @endcan --}}
              </tr>
          </thead>
          <tbody>
              @foreach($users as $user)
              <tr>
              <td>{{$user->name}} </td>
              <td>{{$user->email}}</td>
              <td>{{$user->mobile}}</td>
              <td>{{ implode(", ", $user->getRoleNames()->toArray()) }}</td>
              <td>
                  @if ($user->status == 1)
                      <h6 class="m-0 text-c-green">Active</h6>
                  @endif
                  @if ($user->status ==0)
                      <h6 class="m-0 text-c-purple">Inactive</h6>
                  @endif
            
              </td>
              {{-- @can('Manage Users') --}}
                  <td style='white-space: nowrap'>
              
                      <a href="#">
                          <button class="btn btn-rounded btn-info btn-sm" data-name="{{$user->name}}"
                              data-email="{{$user->email}}" data-id="{{$user->id}}"data-mobile="{{$user->mobile}}"
                              data-role="{{ implode(", ", $user->getRoleNames()->toArray()) }}"
                              type="button" data-toggle="modal" data-target="#editUser">Edit</button>
                      </a>


                          @if ($user->status == 1)
                          <a href="#">
                              <button class="btn btn-danger btn-rounded btn-sm"  type="button" data-toggle="modal" data-target="#disableUser" data-id="{{$user->id}}" data-status="{{$user->status}}" data-name="{{$user->name}}">Deactivate</button>
                          </a>
                          @endif
                          @if ($user->status == 0)
                          <a href="#">
                          <button class="btn btn-success btn-rounded btn-sm"  type="button" data-toggle="modal" data-target="#disableUser" data-id="{{$user->id}}" data-status="{{$user->status}}" data-name="{{$user->name}}">Activate</button>
                          </a>
                          @endif


                      </td>
                  {{-- @endcan --}}
                     
              </tr>
              @endforeach

              </tbody>
          </table>

        </div>
        <!-- /.card-body -->
      </div>
     
    </div>
  
  </div>
 
</div><!-- /.container-fluid -->
@endsection

@include('users.create')
@include('users.edit')
@include('users.de_activate')


@push("page_scripts")
@include('partials.notification')

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


</script>
<script>
  $(document).ready(function(){

      $('#editUser').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var name = button.data('name')
        var email=button.data('email')
        var mobile=button.data('mobile')
        var role=button.data('role')
        var id=button.data('id')
        var modal = $(this)


        modal.find('.modal-body #name1').val(name);
        modal.find('.modal-body #email1').val(email);
        modal.find('.modal-body #mobile1').val(mobile).change();
        modal.find('.modal-body #UserID').val(id);

        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{route('getRoleID')}}",
            method:"POST",
            data:{role:role, _token:_token},
            success:function(result)
            {
                $('#role1').val(result).change();
            }
        })

      });//end edit



      //de activate and activate user
      $('#disableUser').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var status=button.data('status')
          var user = button.data('name')
          var modal = $(this)

          if(status == 1){
            var message =  "Are you sure you want to deactivate - ".concat(user)
          }
          if(status == 0){
            var message =  "Are you sure you want to activate - ".concat(user)
          }
          modal.find('.modal-body #userid').val(id);
          modal.find('.modal-body #status').val(status);
          modal.find('.modal-body #prompt_message').text(message);

      })//end

    //delete user
    $('#deleteUser').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var user = button.data('name')
          var modal = $(this)
          var message =  "Are you sure you want to delete '".concat(user);

          modal.find('.modal-body #user').val(id)
          modal.find('.modal-body #message_del').text(message)

      })//end


  });
</script>

@endpush
