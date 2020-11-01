@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Funding Activities</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pledges / Funding Activities</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection

@section('content')


  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-warning">
        <div class="card-header">
          <a href="#">
              <button class="btn btn-info float-right"
                      type="button" data-toggle="modal" data-target="#add">
                      Add Activity
              </button>
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="mydatatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Schedule</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($fundActivity as $a)
              <tr>
                <td>{{$a->name}}</td>
                <td>{{$a->type}}</td>
                <td>{{$a->schedule}}</td>
                <td>
                  @if ($a->status =='1')
                      Active  
                  @endif
                  @if ($a->status =='0')
                      Inactive
                  @endif
                </td>
                <td>
               
                  <a href="#">
                      <button class="btn"
                              data-id="{{$a->id}}" data-name="{{$a->name}}"  data-schedule="{{$a->schedule}}"  data-type="{{$a->type}}" 
                              data-status="{{$a->status}}" type="button" data-toggle="modal" data-target="#edit">
                              <span class="badge badge-primary">
                                <i class="fas fa-edit"></i>
                              </span>
                      </button>
                  </a>
                  <a href="#">
                      <button class="btn"
                              data-id="{{$a->id}}" data-name="{{$a->name}}"
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
        <!-- /.card-body -->
      </div>
     
    </div>
  
  </div>
 
</div><!-- /.container-fluid -->
@endsection

@push("page_scripts")
@include('partials.notification')
@include('fund_activities.delete')
@include('fund_activities.create')
@include('fund_activities.edit')


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



    $('#delete').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var message = button.data('name');
          var modal = $(this);

          modal.find('.modal-body #message').text(message);
          modal.find('.modal-body #id').val(button.data('id'));
      });

      $('#edit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var id = button.data('id');
          var name = button.data('name');
          var type = button.data('type');
          var status = button.data('status');
          var schedule = button.data('schedule');

          var modal = $(this);

          $('#eid').val(id);
          $('#status').val(status);
          $('#ename').val(name);
          $('#etype').val(type);
          $('#eschedule').val(schedule);

      });


</script>

@endpush
