@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Orodha ya Ahadi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ahadi / Orododha ya Ahadi</li>
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
                  Ingiza Ahadi
              </button>
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="mydatatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Jina la Masharika</th>
                    <th>Aina ya Ahadi</th>
                    <th>Tarehe ya Ahadi</th>
                    <th>Kiasi Alichoahidi</th>
                    <th>Kiasi Alicholipa</th>
                    <th>Maelezo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pledges as $p)
                <tr>
                  <td>{{$p->name}}</td>
                  <td>{{$p->activity}}</td>
                  <td>{{myDateFormat($p->pledge_date)}}</td>
                  <td>{{number_format($p->pledge_amount, 2, '.', ',')}}</td>
                  <td>{{number_format($p->pay_amount, 2, '.', ',')}}</td>
                  <td>{{$p->pledge_comment}}</td>
                  <td>
                    <a href="{{ route('pledges.edit', $p->pledge_id) }}">
                        <span class="badge badge-primary">
                          <i class="fas fa-edit "></i>
                        </span>
                    </a>

                    {{-- <a href="#">
                        <button class="btn"
                                data-id="{{$p->pledge_id}}" data-name=""
                                type="button" data-toggle="modal" data-target="#delete">
                                <span class="badge badge-danger">
                                  <i class="fas fa-trash"></i>
                                </span>
                        </button>
                    </a> --}}
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
      'columnDefs': [
        {
            "targets": 4,
            "className": "text-right",
        },
        {
            "targets": 5,
            "className": "text-right",
        }
        ],
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
