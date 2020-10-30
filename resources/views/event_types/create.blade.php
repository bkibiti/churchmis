@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Add Event Type</h1>
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
          <h3 class="card-title">Event Type</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('event-types.store')}}" method="POST">
          @csrf
          <div class="card-body">
       
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Event Type<font color="red">*</font></label>
              <div class="col-sm-8">
                <input type="text" class="form-control"  name="name"  id="name"  value="{{old('name')}}" placeholder="Event Name" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Default Start Time<font color="red">*</font></label>
              <div class="col-sm-8">
                  <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" required id="start_time", name="start_time" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                    </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Recurrence Pattern <font color="red">*</font></label>
                <div class="col-sm-8">
                  <select class="form-control select2" id="occurance" name ="occurance" required>
                      <option value="none" selected>None</option>
                      <option value="weekly">Weekly</option>
                      <option value="monthly">Monthly</option>
                      <option value="yearly">Yearly</option>
                  </select>
                </div>
            </div>

            <div class="form-group row" id="dow">
              <label class="col-sm-2 col-form-label">Day of Week</label>
              <div class="col-sm-8">
                <select class="form-control select2" id="occurance_dow" name ="occurance_dow" required>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>\
                </select>
              </div>
          </div>
          <div class="form-group row" id="dom">
            <label class="col-sm-2 col-form-label">Day of Month</label>
            <div class="col-sm-8">
              <input type="number" class="form-control"  name="occurance_dom"  id="occurance_dom"  placeholder="Day of month e.g. 12" min="1" max="31">
            </div>
          </div>
          <div class="form-group row" id="doy">
            <label class="col-sm-2 col-form-label">Day of Year</label>
            <div class="col-sm-8">
                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input"  id="occurance_doy", name="occurance_doy" data-target="#datetimepicker2"/>
                  <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
            </div>
          </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">Save</button>
           
            <a href="{{route('event-types.index')}}">
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
    $('#dow').hide();
    $('#dom').hide();
    $('#doy').hide();
    $(document).ready(function(){
        
        $('.select2').select2()
      

        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'LT'
            });
        });

        $(function () {
          $('#datetimepicker2').datetimepicker({
              format: 'DD/MM/YYYY'
          });
        });
    
    });


    $('#occurance').on('select2:selecting', function(e) {
         
         var id = e.params.args.data.id;
        console.log(id);
        if (id=='none') {
          $('#dow').hide();
          $('#dom').hide();
          $('#doy').hide();
        }
        if (id =='weekly') {
          $('#dow').show();
          $('#dom').hide();
          $('#doy').hide();
        }
        if (id =='monthly') {
          $('#dow').hide();
          $('#dom').show();
          $('#doy').hide();
        }
        if (id =='yearly') {
          $('#dow').hide();
          $('#dom').hide();
          $('#doy').show();
        }
  
  
     });



</script>


@endpush
