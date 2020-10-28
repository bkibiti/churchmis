@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Update Person</h1>
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
          <h3 class="card-title">Update Information</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('people.update',$person->id)}}" method="POST">
          @csrf
          @method("PUT")
          
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-2">
                <select class="form-control select2" id="title" name ="title">
                    <option >--Select Salutation--</option>
                    @foreach($salute as $r)
                      <option value="{{ $r->name }}" {{ ($person->title == $r->name ? "selected":"") }}>{{ $r->name }}</option>
                    @endforeach
                </select>
              </div>
              
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">First Name<font color="red">*</font></label>
              <div class="col-sm-4">
                <input type="text" class="form-control"  name="first_name"  id="first_name"  value="{{$person->first_name}}" placeholder="First Name">
              </div>
              <label class="col-sm-2 col-form-label">Middle Name</label>
              <div class="col-sm-4">
                <input type="text" class="form-control"  name="middle_name"  id="middle_name" value="{{$person->middle_name}}" placeholder="Middle Name">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Last Name<font color="red">*</font></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="last_name" value="{{$person->last_name}}" id="last_name" placeholder="Last Name">
              </div>
              <label class="col-sm-2 col-form-label">Gender<font color="red">*</font></label>
              <div class="col-sm-4">
                <select class="form-control select2" id="gender" name ="gender" required>
                    <option value="">--Select Gender--</option>
                    <option value="M" {{ ($person->gender == "M" ? "selected":"") }}>Male</option>
                    <option value="F"{{ ($person->gender== "F" ? "selected":"") }}>Female</option>
                </select>
              </div>

            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Date of Birth</label>
              <div class="col-sm-4">
                  <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input"  id="dob", name="dob" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
              </div>
              <label class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" value="{{$person->address}}" name="address" id="address" placeholder="Address">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Region</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="region" id="region">
                </div>
                <label class="col-sm-2 col-form-label">District</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="district" id="district">
                </div>  
            </div>
             
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control"  value="{{$person->mobile_phone}}" name="mobile_phone" id="mobile_phone" placeholder="Mobile Phone">
                </div>
                <label class="col-sm-2 col-form-label">Alt Mobile</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control"  value="{{$person->alt_phone}}" name="alt_phone" id="alt_phone" placeholder="Alternate Mobile">
                </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">E-mail</label>
              <div class="col-sm-4">
                <input type="email" class="form-control" value="{{$person->email}}"  id="email" name="email" placeholder="Email">
              </div>
             
            </div>

            <hr>

             <div class="form-group row">
                <label class="col-sm-2 col-form-label">Classification</label>
                <div class="col-sm-4">
                  <select class="form-control select2" id="classification_id" name ="classification_id" required>
                      <option value="">--Select Classification--</option>
                      @foreach($classification as $c)
                        <option value="{{ $c->id }}" {{ ($person->classification_id == $c->id ? "selected":"") }}>{{ $c->name }}</option>
                      @endforeach
                  </select>
                </div>
                <label class="col-sm-2 col-form-label">Family Role</label>
                <div class="col-sm-4">
                  <select class="form-control select2" id="family_role_id" name ="family_role_id" required>
                      <option value="">--Select Family Role--</option>
                      @foreach($role as $r)
                        <option value="{{ $r->id }}" {{ ($person->family_role_id == $r->id ? "selected":"") }}>{{ $r->name }}</option>
                      @endforeach
                  </select>
                </div>

              </div>
              
              <hr>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Membership Date</label>
                <div class="col-sm-4">
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" value="{{$person->membership_date}}" id="membership_date", name="membership_date" data-target="#datetimepicker2"/>
                      <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                </div>
                <label class="col-sm-2 col-form-label">Date of Baptism</label>
                <div class="col-sm-4">
                  <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" value="{{$person->date_baptism}}" id="date_baptism", name="date_baptism" data-target="#datetimepicker3"/>
                      <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                </div>
              </div>
         
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Date of Eucharist</label>
                <div class="col-sm-4">
                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" value="{{$person->date_eucharist}}" id="date_eucharist", name="date_eucharist" data-target="#datetimepicker4"/>
                      <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                </div>
                <label class="col-sm-2 col-form-label">Date of Confirmation</label>
                <div class="col-sm-4">
                  <div class="input-group date" id="datetimepicker5" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" value="{{$person->date_confirmation}}" id="date_confirmation", name="date_confirmation" data-target="#datetimepicker5"/>
                      <div class="input-group-append" data-target="#datetimepicker5" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Date of Marriage</label>
                <div class="col-sm-4">
                    <div class="input-group date" id="datetimepicker6" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" value="{{$person->date_marriage}}" id="date_marriage", name="date_marriage" data-target="#datetimepicker6"/>
                      <div class="input-group-append" data-target="#datetimepicker6" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                </div>
              
              </div>
           

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">Update</button>
           
            <a href="{{route('people.index')}}">
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
        //Initialize Select2 Elements
        $('.select2').select2()
      
        $(function () {
          $('#datetimepicker1').datetimepicker({
              format: 'DD/MM/YYYY',
              date: moment("{{$person->dob}}", 'YYYY/MM/DD')
          });
        });
        $(function () {
          $('#datetimepicker2').datetimepicker({
            format: 'DD/MM/YYYY'
          });
        });
        $(function () {
          $('#datetimepicker3').datetimepicker({
            format: 'DD/MM/YYYY'
          });
        });
        $(function () {
          $('#datetimepicker4').datetimepicker({
            format: 'DD/MM/YYYY'
          });
        });
        $(function () {
          $('#datetimepicker5').datetimepicker({
            format: 'DD/MM/YYYY'
          });
        });
        $(function () {
          $('#datetimepicker6').datetimepicker({
            format: 'DD/MM/YYYY'
          });
        });
       
    });
</script>


@endpush
