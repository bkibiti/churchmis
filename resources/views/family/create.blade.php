@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Add Family</h1>
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
          <h3 class="card-title">New Family</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('family.store')}}" method="POST">
          @csrf
          <div class="card-body">
       
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Family Name<font color="red">*</font></label>
              <div class="col-sm-4">
                <input type="text" class="form-control"  name="name"  id="name"  value="{{old('name')}}" placeholder="Family Name" required>
              </div>
              <label class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" value="{{old('address')}}" name="address" id="address" placeholder="Address">
              </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control"  value="{{old('mobile_phone')}}" name="mobile_phone" id="mobile_phone" placeholder="Mobile Phone">
                </div>
                <label class="col-sm-2 col-form-label">Alternate Mobile</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control"  value="{{old('alt_phone')}}" name="alt_phone" id="alt_phone" placeholder="Alternate Mobile">
                </div>
            </div>

            <div class="form-group row">
                      
              <label class="col-sm-2 col-form-label">E-mail</label>
              <div class="col-sm-4">
                <input type="email" class="form-control" value="{{old('email')}}"  id="email" name="email" placeholder="Email">
              </div>
              <label class="col-sm-2 col-form-label">Wedding Date</label>
              <div class="col-sm-4">
                  <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" value="{{old('wedding_date')}}"  id="wedding_date", name="wedding_date" data-target="#datetimepicker1"/>
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
                  <input type="text" class="form-control" name="latitude" id="latitude">
                </div>
                <label class="col-sm-2 col-form-label">Longitude</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="longitude" id="longitude">
                </div>  
            </div>
         
      
            <div class="row">
                <div class="col-sm-10">
                    <h5 class="mb-2">Family Members</h5>
                </div>
                <div class="col-sm-2">
                  <button type="button"
                      class="btn btn-sm btn-warning float-right selectProducts"
                      data-toggle="modal" data-target="#addMember">Add
                  </button>
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
            <button type="submit" class="btn btn-info float-right">Save</button>
           
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

@include('family.add_member')

@push("page_scripts")

@include('partials.notification')

<script>
    $(document).ready(function(){
        
        $('.select2').select2()

        $(function () {
          $('#datetimepicker1').datetimepicker({
              format: 'DD/MM/YYYY'
          });
        });
        
    });


    $('#mydatatable').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });

    var members_table = $('#members').DataTable({
        searching: false,
        bPaginate: false,
        ordering: false,
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
     
    //add members to list of members on click of modal form
    $( '#addItemForm' ).submit(function( event ) {
            event.preventDefault();

            var values = {};
            $.each($(this).serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });

            var data = []; //hold selected member values
            var member_id = values.member_id;
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
  
            $('#addMember').modal('hide');
                        
        });
        $('#members tbody').on('click', '#delete_btn', function () {
            var index = members_table.row($(this).parents('tr')).index();
            members_list.splice(index, 1);
            member_ids.splice(index, 1);
            members_table.clear();
            members_table.rows.add(members_list);
            members_table.draw();
            $('#member_ids').val(JSON.stringify(member_ids)); 
        });


</script>


@endpush
