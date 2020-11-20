@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Mahudhurio</h1>
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
          <h3 class="card-title">Mahudhurio</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('events-attendance.store')}}" method="POST">
          @csrf
          <div class="card-body">
       
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Tukio<font color="red">*</font></label>
              <div class="col-sm-10">
                    <select class="form-control select2" id="event_id" name ="event_id" required>
                        <option value="">--Changua--</option>
                      @foreach ($event as $e)
                        <option value={{$e->id}} >{{$e->title}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="form-group row" >
              <label class="col-sm-2 col-form-label">Tarehe<font color="red">*</font></label>
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
                <label class="col-sm-2 col-form-label">Wanaume</label>
                <div class="col-sm-4">
                  <input type="number" class="form-control"  name="male"  id="male" required >
                </div>
                <label class="col-sm-2 col-form-label">Wanawake</label>
                <div class="col-sm-4">
                  <input type="number" class="form-control"  name="female"  id="female" required >
                </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Watoto</label>
              <div class="col-sm-10">
                <input type="number" class="form-control"  name="children"  id="children" required >
              </div>
          </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Maelezo</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  name="notes"  id="notes">
                </div>
            </div>



          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="form-group row">
              <div class="col-sm-8"></div>
              <div class="col-sm-2">
                  <a href="{{ route('events-attendance.index') }}">
                      <button type="button" class="btn btn-danger btn-block">Rudi Nyuma</button>
                  </a>
              </div>
              <div class="col-sm-2">
                  <button type="submit" class="btn btn-success float-right btn-block">Hifadhi</button>
              </div>
          </div>
     
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
        });
    });





</script>


@endpush
