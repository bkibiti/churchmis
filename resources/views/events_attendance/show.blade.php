@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Event Information</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
   
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-md-12">
      <div class="card">
   
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
                <label class="col-sm-2">Event Type:</label>
                <div class="col-sm-3">
                  {{$event->type->name}}
                </div>
                <label class="col-sm-1">Event Title:</label>
                <div class="col-sm-6">
                  {{$event->title}} 
                </div>
          </div>
          <div class="row">
              <label class="col-sm-2">Description:</label>
              <div class="col-sm-10">
                 {{$event->description}}
              </div>
          </div>
          <div class="row">
              <label class="col-sm-2">Start on:</label>
              <div class="col-sm-3">
                {{myDateTimeFormat($event->start)}}
              </div>
              <label class="col-sm-1">Ends on:</label>
              <div class="col-sm-6">
                {{myDateTimeFormat($event->end)}} 
              </div>
         </div>
         <div class="row">
              <label class="col-sm-2">Event Location:</label>
              <div class="col-sm-10">
                {{$event->location}}
              </div>
        </div>
        <div class="row">
              <label class="col-sm-2">Contact Person 1:</label>
              <div class="col-sm-3">
                {{$event->contact_person}}
              </div>
              <label class="col-sm-1">Mobile:</label>
              <div class="col-sm-6">
                {{$event->mobile}} 
              </div>
        </div>
        <div class="row">
            <label class="col-sm-2">Contact Person 2:</label>
            <div class="col-sm-3">
              {{$event->alt_contact_person}}
            </div>
            <label class="col-sm-1">Mobile:</label>
            <div class="col-sm-6">
              {{$event->alt_mobile}} 
            </div>
        </div>
        <div class="row">
          <label class="col-sm-2">Status:</label>
          <div class="col-sm-3">
            <span class="badge bg-success">
             @php
                  $now = new DateTime(date("Y/m/d"));
                  $end_date = new DateTime($event->end);
                  $start_date = new DateTime($event->start);
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
              </span>

          </div>
         
        </div>
            
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>


</div>


  <div class="row">
    <div class="col-md-12">
       <div class="card ">
         <div class="card-header">
           <h3 class="card-title">
             <i class="fas fa-users"></i>
             &nbsp; Event Attendance
           </h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
          
            @if ($event->attendance->isNotEmpty())
            <table id="mydatatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Male</th>
                        <th>Female</th>
                        <th>Children</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($event->attendance as $a)
                    <tr>
                      <td>{{myDateFormat($a->date)}}</td>
                      <td>{{$a->male}}</td>
                      <td>{{$a->female}}</td>
                      <td>{{$a->children}}</td>
                      <td>{{$a->children + $a->male + $a->female}}</td>

                    </tr>
                  @endforeach
                
                </tbody>
            </table>
            @else
              
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fas fa-info"></i>
                    Event has no Attendance
                </div>
            @endif
          
         </div>
         <!-- /.card-body -->
       </div>
       <!-- /.card -->
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
      });

    $(document).ready(function(){

 
  
        
    });


  
   
   
</script>


@endpush
