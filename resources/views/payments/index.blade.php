@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Orodha ya Malipo</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Malipo / Orodha ya Malipo</li>
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
          <a href="{{route('payments.create')}}">
              <button type="button" class="btn btn-info float-right">
                  Lipa
              </button>
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="mydatatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Jina la Msharika</th>
                    <th>Aina ya Malipo</th>
                    <th>Tarehe ya Malipo</th>
                    <th>Kiasi</th>
                    <th>Jinsi ya Kulipia</th>
                    <th>Maelezo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @foreach ($payments as $p)
                <tr>
                  <td>{{$p->name}}</td>
                  <td>{{$p->activity}}</td>
                  <td>{{myDateFormat($p->pay_date)}}</td>
                  <td>{{number_format($p->pay_amount, 2, '.', ',')}}</td>
                  <td>{{$p->pay_method}}</td>
                  <td>{{$p->pay_comment}}</td>
                  <td>
                    <a href="{{ route('pledges.edit', $p->pay_id) }}">
                        <span class="badge badge-primary">
                          <i class="fas fa-edit "></i>
                        </span>
                    </a>

                    <a href="#">
                        <button class="btn"
                                data-id="{{$p->pay_id}}" data-name=""
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
      'columnDefs': [
        {
            "targets": 4,
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
