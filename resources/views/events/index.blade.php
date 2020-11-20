@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Orodha ya Matukio</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Matukio</li>
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
          <a href="{{route('events.create')}}">
              <button type="button" class="btn btn-info float-right">
                  Ongeza Tukio
              </button>
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="mydatatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Aina ya Tukio</th>
                    <th>Tukio</th>
                    <th>Maelezo ya Tukio</th>
                    <th>Kuanza</th>
                    <th>Kumaliza</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($event as $e)
              <tr>
                <td>{{$e->type->name}}</td>
                <td>{{$e->title}}</td>
                <td>{{$e->description}}</td>
                <td>{{myDateTimeFormat($e->start)}}</td>
                <td>{{myDateTimeFormat($e->end)}}</td>
                <td>
                    @php
                        $now = new DateTime(date("Y/m/d"));
                        $end_date = new DateTime($e->end);
                        $start_date = new DateTime($e->start);
                        $var = '';
                      
                        if (($start_date < $now) && $end_date > $now ) {
                            $var= "Ongoing";
                        }
                        if ($end_date < $now) {
                            $var=  "Completed";
                        }
                        if ($start_date > $now) {
                            $var= "Upcoming";
                        }
                        echo $var;
                 
                    @endphp
                    
                </td>

                <td>
                  <a href="{{ route('events.show', $e->id) }}">
                      <span class="badge badge-success">
                        <i class="fas fa-eye"></i>
                      </span>
                  </a>

                  <a href="{{ route('events.edit', $e->id) }}">
                      <span class="badge badge-primary">
                        <i class="fas fa-edit "></i>
                      </span>
                  </a>
                  
                  <a href="#">
                      <button class="btn"
                              data-id="{{$e->id}}" data-name="{{$e->title}}"
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
@include('events.delete')

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
