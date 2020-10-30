@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Update Family</h1>
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
          <h3 class="card-title">Family Info</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('family.update',$family->id)}}" method="POST">
          @csrf
          @method("PUT")
          <div class="card-body">
       
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Family Name<font color="red">*</font></label>
              <div class="col-sm-4">
                <input type="text" class="form-control"  name="name"  id="name"  value="{{$family->name}}" placeholder="Family Name" required>
              </div>
              <label class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" value="{{$family->address}}" name="address" id="address" placeholder="Address">
              </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control"  value="{{$family->mobile_phone}}" name="mobile_phone" id="mobile_phone" placeholder="Mobile Phone">
                </div>
                <label class="col-sm-2 col-form-label">Alternate Mobile</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control"  value="{{$family->alt_phone}}" name="alt_phone" id="alt_phone" placeholder="Alternate Mobile">
                </div>
            </div>

            <div class="form-group row">
                      
              <label class="col-sm-2 col-form-label">E-mail</label>
              <div class="col-sm-4">
                <input type="email" class="form-control" value="{{$family->email}}"  id="email" name="email" placeholder="Email">
              </div>
              <label class="col-sm-2 col-form-label">Wedding Date</label>
              <div class="col-sm-4">
                  <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input"  id="wedding_date", name="wedding_date" data-target="#datetimepicker1"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
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
              <label class="col-sm-2 col-form-label">Latitude</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" value="{{$family->latitude}}" name="latitude" id="latitude">
                </div>
                <label class="col-sm-2 col-form-label">Longitude</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" value="{{$family->longitude}}" name="longitude" id="longitude">
                </div>  
            </div>
      
            <hr>
      
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="mb-2">Family Members</h5>
                </div>
                <label class="col-sm-2 col-form-label">Add Member <font color="red">*</font></label>
                <div class="col-sm-4">
                  <select class="form-control select2" id="member_id" name ="member_id">
                      <option value="">--Select Member--</option>
                      @foreach($people as $p)
                        <option value="{{ $p->id }}"}}>{{ $p->first_name .' ' . $p->last_name .'; from '. $p->address  }}</option>
                      @endforeach
                  </select>
                </div>
               
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                  <table id="members" class="table table-bordered table-striped">
            
                  </table>
                </div>
            </div>

            <input type="hidden" name="member_ids" id="member_ids" >
 
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">Update</button>
           
            <a href="{{route('family.index')}}">
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

        $(function () {
          $('#datetimepicker1').datetimepicker({
              format: 'DD/MM/YYYY',
              date: moment("{{$family->wedding_date}}", 'YYYY/MM/DD')
          });
        });
        
    });



    var members_table = $('#members').DataTable({
        searching: false,
        bPaginate: false,
        ordering: true,
        bInfo: false,
        scrollY:  "300px",
        scrollCollapse: true,
        columns: [
            { title: "Name" },
            { title: "Gender" },
            { title: "Address" },
            { title: "Role" },
            { title: "Classification" },
            { title: "Action", defaultContent:  '<button type="button" id="delete_btn" class="btn btn-icon btn-rounded btn-sm btn-danger"> <i class="fas fa-trash"></i></button>'},
            
        ]
    });
    var members_list = []; //hold data displayed in members table
    var member_ids = []; //hold member ids for saving in db
    
    loadMembers();

    $('#member_id').on('select2:selecting', function(e) {
      
        var data = []; //hold selected member values
        var member_id = e.params.args.data.id;
        var people = @json($people);
        var name = '';
        $.each(people, function(index, value) { 
          if(value.id == member_id){
            data.push(name.concat(value.first_name,' ',value.middle_name,' ', value.last_name));
            data.push(value.gender);
            data.push(value.address);
            data.push('role'); 
            data.push('classy');
            member_ids.push(value.id);
          }
        });
                
        members_list.push(data);
        members_table.clear();
        members_table.rows.add(members_list).draw();
        $('#member_ids').val(JSON.stringify(member_ids)); 

    });

    $('#members tbody').on('click', '#delete_btn', function () {
        var index = members_table.row($(this).parents('tr')).index();
        members_list.splice(index, 1);
        member_ids.splice(index, 1);
        members_table.clear();
        members_table.rows.add(members_list);
        members_table.draw();
        $('#member_ids').val(JSON.stringify(member_ids)); 
        console.log(member_ids);
    });


    function loadMembers(){
        var people = @json($memberList);
        var name = '';
        $.each(people, function(index, value) { 
            var data = []; 
            data.push(name.concat(value.first_name,' ',value.middle_name,' ', value.last_name));
            data.push(value.gender);
            data.push(value.address);
            data.push('role'); 
            data.push('classy');
            member_ids.push(value.id);
            members_list.push(data);
        });
        members_table.clear();
        members_table.rows.add(members_list).draw();
        $('#member_ids').val(JSON.stringify(member_ids)); 
    }


</script>


@endpush
