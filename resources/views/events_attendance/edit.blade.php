@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Update Attendance</h1>
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
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Event Attendance</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('events-attendance.update',$eventsAttendance->id)}}" method="POST">
          @csrf
          @method('put')
          <div class="card-body">
       
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Event<font color="red">*</font></label>
              <div class="col-sm-10">
                    <select class="form-control select2" id="event_id" name ="event_id" required>
                        <option value="">Select Event</option>
                      @foreach ($event as $e)
                        <option value={{$e->id}} {{ ($e->id == $eventsAttendance->event_id ? "selected":"") }} >{{$e->title}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="form-group row" >
              <label class="col-sm-2 col-form-label">Attendance Date<font color="red">*</font></label>
              <div class="col-sm-4">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" id='date' name='date' required data-target="#datetimepicker1"/>
                  <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Male</label>
                <div class="col-sm-4">
                <input type="number" class="form-control"  name="male"  id="male" value="{{$eventsAttendance->male}}" required >
                </div>
                <label class="col-sm-2 col-form-label">Female</label>
                <div class="col-sm-4">
                  <input type="number" class="form-control"  name="female"  id="female" value="{{$eventsAttendance->female}}" required >
                </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Children</label>
              <div class="col-sm-10">
                <input type="number" class="form-control"  name="children"  id="children" value="{{$eventsAttendance->children}}" required >
              </div>
          </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Notes</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  name="notes"  id="notes" value="{{$eventsAttendance->notes}}">
                </div>
            </div>



          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">Update</button>
           
            <a href="{{route('events-attendance.index')}}">
              <button type="button" class="btn btn-danger ">Cancel</button>
           </a>
          </div>
          <!-- /.card-footer -->
        </form>
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
        
        $('.select2').select2()
    
    });


    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD/MM/YYYY',
            date: moment("{{$eventsAttendance->date}}", 'YYYY/MM/DD')
        });
    });





</script>


@endpush
