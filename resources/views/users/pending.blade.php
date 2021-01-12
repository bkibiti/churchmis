@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Approve Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Users / Pending Users</li>
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
       

        </div>
        <!-- /.card-header -->
        <div class="card-body">
 
        <table id="mydatatable" class="table table-bordered table-striped">
          <thead>
              <tr>
              <th>Name</th>
              <th>E-mail</th>
              <th>Mobile</th>
              <th>Request Note</th>
              <th>Action</th>
              
              </tr>
          </thead>
          <tbody>
              @foreach($users as $user)
              <tr>
              <td>{{$user->name}} </td>
              <td>{{$user->email}}</td>
              <td>{{$user->mobile}}</td>
              <td>{{$user->request_note}}</td>

    
              {{-- @can('Manage Users') --}}
                  <td style='white-space: nowrap'>

                      <a href="#">
                          <button class="btn btn-success btn-rounded btn-sm"  type="button" data-toggle="modal" data-target="#approveUser" data-id="{{$user->id}}" data-name="{{$user->name}}">Approve</button>
                      </a>

                    </td>
                  {{-- @endcan --}}
                     
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

@include('users.approve')


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


      //de activate and activate user
      $('#approveUser').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id')
          var user = button.data('name')
          var modal = $(this)

          var message =  "Are you sure you want to approve new user - ".concat(user)

          modal.find('.modal-body #userid').val(id);
          modal.find('.modal-body #status').val(status);
          modal.find('.modal-body #prompt_message').text(message);

      })//end


  });
</script>

@endpush
