@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Add Event</h1>
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
          <h3 class="card-title">Event Info</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('events.store')}}" method="POST">
          @csrf
          <div class="card-body">
       
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Event Type<font color="red">*</font></label>
              <div class="col-sm-10">
                    <select class="form-control select2" id="type_id" name ="type_id" required>
                        <option value="">Select Event Type</option>
                      @foreach ($etype as $e)
                        <option value={{$e->id}} >{{$e->name}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Event Title <font color="red">*</font></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  name="title"  id="title" required >
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Event Description <font color="red">*</font></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  name="description"  id="description" required>
                </div>
            </div>

     
          <div class="form-group row" >
            <label class="col-sm-2 col-form-label">Event Start Date</label>
            <div class="col-sm-4">
                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input"  id="start", name="start" data-target="#datetimepicker2"/>
                  <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
            </div>
            <label class="col-sm-2 col-form-label">End Date</label>
            <div class="col-sm-4">
              <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" id='end' name='end' data-target="#datetimepicker1"/>
                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
            </div>
          </div>
          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Event Location<font color="red">*</font></label>
              <div class="col-sm-10">
                <input type="text" class="form-control"  name="location"  id="location" required>
              </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Contact Person 1</label>
            <div class="col-sm-4">
              <input type="text" class="form-control"  name="contact_person"  id="contact_person" >
            </div>
            <label class="col-sm-2 col-form-label">Mobile</label>
            <div class="col-sm-4">
              <input type="text" class="form-control"  name="mobile"  id="mobile" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Contact Person 2</label>
            <div class="col-sm-4">
              <input type="text" class="form-control"  name="alt_contact_person"  id="alt_contact_person" >
            </div>
            <label class="col-sm-2 col-form-label">Mobile</label>
            <div class="col-sm-4">
              <input type="text" class="form-control"  name="alt_mobile"  id="alt_mobile" >
            </div>
          </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">Save</button>
           
            <a href="{{route('events.index')}}">
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
            format: 'DD/MM/YYYY hh:mm A',
        });
    });
    $(function () {
        $('#datetimepicker2').datetimepicker({
          format: 'DD/MM/YYYY hh:mm A',
        });
    });





</script>


@endpush
