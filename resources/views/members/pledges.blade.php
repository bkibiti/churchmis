@extends("layouts.members_master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Ahadi Zako</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
   
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection

@section('content')


  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-warning">
        <div class="card-header">
          <a href="{{route('member.pledges.create')}}">
              <button type="button" class="btn btn-info float-right">
                  Ahadi Mpya
              </button>
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="mydatatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Tarehe ya Ahadi</th>
                    <th>Aina ya Ahadi</th>
                    <th>Kiasi Nilicho Ahidi</th>
                    <th>Kiasi Nilicho Lipa</th>
                    <th>Kiasi Kilicho Baki</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pledges as $p)
                <tr>
                  <td>{{myDateFormat($p->pledge_date)}}</td>
                  <td>{{$p->activity}}</td>
                  <td>{{number_format($p->pledge_amount, 2, '.', ',')}}</td>
                  <td>{{number_format($p->pay_amount, 2, '.', ',')}}</td>
                  <td>{{number_format(($p->pledge_amount - $p->pay_amount), 2, '.', ',')}}</td>
            
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
            "targets": 2,
            "className": "text-right",
        },
        {
            "targets": 3,
            "className": "text-right",
        },
        {
            "targets": 4,
            "className": "text-right",
        }
        ],
    });




</script>

@endpush
