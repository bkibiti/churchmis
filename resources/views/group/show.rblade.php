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
            <label>Event Type: </label> {{$event->type->name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Event Title: </label> {{$event->title}} <br>
            <label>Description: </label> {{$event->description}} <br>
            <label>Event Start Date: </label> {{$event->start}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Event End Date: </label> {{$event->end}} <br>
            <label>Event Location: </label> {{$event->end}} <br>
            <label>Contact Person 1: </label> {{$event->contact_person}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Mobile: </label> {{$event->mobile}} <br>
            <label>Contact Person 2: </label> {{$event->alt_contact_person}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Mobile: </label> {{$event->alt_mobile}} <br>
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
           <div class="row">
            @if ($event->attendance->isNotEmpty())
            <table id="mydatatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Males</th>
                        <th>Females</th>
                        <th>Children</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($event->attendance as $a)
                    <tr>
                      <td>{{$a->date}}</td>
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
         </div>
         <!-- /.card-body -->
       </div>
       <!-- /.card -->
     </div>
 </div>
   
  
 
</div><!-- /.container-fluid -->
@endsection

@push("page_scripts")

@include('partials.notification')

<script>
    $(document).ready(function(){
        
  
        
    });


  
   
   
</script>


@endpush
