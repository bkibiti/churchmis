@extends("layouts.members_master")

@section('page_css')

@endsection

@section('content-header')
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Michango Uliyotoa</h1>
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
      
        <!-- /.card-header -->
        <div class="card-body">
          <table id="mydatatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tarehe ya Malipo</th>
                    <th>Aina ya Malipo</th>
                    <th>Kiasi</th>
                    <th>Jinsi ya Kulipia</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($payments as $p)
                <tr>
                  <td>{{myDateFormat($p->pay_date)}}</td>
                  <td>{{$p->activity}}</td>
                  <td>{{number_format($p->pay_amount, 2, '.', ',')}}</td>
                  <td>{{$p->pay_method}}</td>
    
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
            "targets": 4,
            "className": "text-right",
        }
        ],
    });



</script>

@endpush
