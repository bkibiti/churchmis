@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">List of Pledges</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pledges / View Pledges</li>
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
          <a href="{{route('pledges.create')}}">
              <button type="button" class="btn btn-info float-right">
                  Add Pledge
              </button>
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="mydatatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Pledger Type</th>
                    <th>Name</th>
                    <th>Activity</th>
                    <th>Pledge Date</th>
                    <th>Amount</th>
                    <th>Comments</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($personPledge as $p)
                <tr>
                  <td>{{$p->pledger}}</td>
                  <td>{{$p->person->first_name}}</td>
                  <td>{{$p->activity->name}}</td>
                  <td>{{myDateFormat($p->pledge_date)}}</td>
                  <td>{{number_format($p->amount, 2, '.', ',')}}</td>
                  <td>{{$p->comment}}</td>
                  <td>
                    <a href="{{ route('pledges.edit', $p->id) }}">
                        <span class="badge badge-primary">
                          <i class="fas fa-edit "></i>
                        </span>
                    </a>

                    <a href="#">
                        <button class="btn"
                                data-id="{{$p->id}}" data-name=""
                                type="button" data-toggle="modal" data-target="#delete">
                                <span class="badge badge-danger">
                                  <i class="fas fa-trash"></i>
                                </span>
                        </button>
                    </a>
                  </td>
                </tr>
              @endforeach
              @foreach ($familyPledge as $p)
                <tr>
                  <td>{{$p->pledger}}</td>
                  <td>{{$p->family->name}}</td>
                  <td>{{$p->activity->name}}</td>
                  <td>{{myDateFormat($p->pledge_date)}}</td>
                  <td>{{number_format($p->amount, 2, '.', ',')}}</td>
                  <td>{{$p->comment}}</td>
                  <td>
                    <a href="{{ route('pledges.edit', $p->id) }}">
                        <span class="badge badge-primary">
                          <i class="fas fa-edit "></i>
                        </span>
                    </a>

                    <a href="#">
                        <button class="btn"
                                data-id="{{$p->id}}" data-name=""
                                type="button" data-toggle="modal" data-target="#delete">
                                <span class="badge badge-danger">
                                  <i class="fas fa-trash"></i>
                                </span>
                        </button>
                    </a>
                  </td>
                </tr>
              @endforeach
              @foreach ($groupPledge as $p)
              <tr>
                <td>{{$p->pledger}}</td>
                <td>{{$p->group->name}}</td>
                <td>{{$p->activity->name}}</td>
                <td>{{myDateFormat($p->pledge_date)}}</td>
                <td>{{number_format($p->amount, 2, '.', ',')}}</td>
                <td>{{$p->comment}}</td>
                <td>
                  <a href="{{ route('pledges.edit', $p->id) }}">
                      <span class="badge badge-primary">
                        <i class="fas fa-edit "></i>
                      </span>
                  </a>

                  <a href="#">
                      <button class="btn"
                              data-id="{{$p->id}}" data-name=""
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


</script>

@endpush
