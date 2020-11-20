@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Mahududhurio</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Mahududhurio</li>
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
          <a href="{{route('events-attendance.create')}}">
              <button type="button" class="btn btn-info float-right">
                  Ingiza Mahudhurio
              </button>
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="mydatatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tukio</th>
                    <th>Tarehe</th>
                    <th>Wanaume</th>
                    <th>Wanawake</th>
                    <th>Watoto</th>
                    <th>Jumla</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($event as $e)
              @foreach ($e->attendance as $a)
                  <tr>
                    <td>{{$e->title}}</td>
                    <td>{{myDateFormat($a->date)}}</td>
                    <td>{{$a->male}}</td>
                    <td>{{$a->female}}</td>
                    <td>{{$a->children}}</td>
                    <td>{{$a->children + $a->male + $a->female}}</td>
                    <td>
                      <a href="{{ route('events-attendance.edit', $a->id) }}">
                          <span class="badge badge-primary">
                            <i class="fas fa-edit "></i>
                          </span>
                      </a>
                      <a href="#">
                          <button class="btn"
                                  data-id="{{$a->id}}" data-name="{{myDateFormat($a->date)}}"
                                  type="button" data-toggle="modal" data-target="#delete">
                                  <span class="badge badge-danger">
                                    <i class="fas fa-trash"></i>
                                  </span>
                          </button>
                      </a>
                     </td>
                  </tr>
                @endforeach
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
@include('events_attendance.delete')

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
