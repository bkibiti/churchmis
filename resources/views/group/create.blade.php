@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Add Group</h1>
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
          <h3 class="card-title">Group Info</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('groups.store')}}" method="POST">
          @csrf
          <div class="card-body">
       
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Group Type <font color="red">*</font></label>
              <div class="col-sm-4">
                <select class="form-control select2" id="group_type_id" name ="group_type_id" required>
                    <option value="">--Select Type--</option>
                    @foreach($groupType as $g)
                      <option value="{{ $g->id }}"}}>{{ $g->name  }}</option>
                    @endforeach
                </select>
              </div>
              <label class="col-sm-2 col-form-label">Group Name<font color="red">*</font></label>
              <div class="col-sm-4">
                <input type="text" class="form-control"  name="name"  id="name"  value="{{old('name')}}" placeholder="Family Name" required>
              </div>
         
            </div>
       
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Group Description<font color="red">*</font></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="description" id="description" required>
                </div>
               
            </div>

         
      <hr>
            <div class="row">
              <div class="col-sm-6">
                  <h5 class="mb-2">Group Members</h5>
              </div>
                <div class="col-sm-6">
                  <button type="button"
                    class="btn  btn-rounded btn-icon btn-warning float-right"
                    data-toggle="modal" data-target="#addMember">Add Member
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
            <input type="hidden" name="position_ids" id="position_ids" >

 
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">Save</button>
           
            <a href="{{route('groups.index')}}">
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
@include('group.add_member')

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
            { title: "Position in Group" },
            { title: "Action", defaultContent:  '<button type="button" id="delete_btn" class="btn btn-icon btn-rounded btn-sm btn-danger"> <i class="fas fa-trash"></i></button>'},
            
        ]
    });
    var members_list = []; //hold data displayed in members table
    var member_ids = []; //hold member ids for saving in db
    var positions = []; //hold member position

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
                data.push($("#position_id option:selected").text()); 
                member_ids.push(value.id);
                positions.push(parseInt(values.position_id));

              }
            });

                   
            members_list.push(data);
            members_table.clear();
            members_table.rows.add(members_list).draw();
            $('#member_ids').val(JSON.stringify(member_ids)); 
            $('#position_ids').val(JSON.stringify(positions)); 
  
            $('#addMember').modal('hide');
                        
        });

        $('#members tbody').on('click', '#delete_btn', function () {
            var index = members_table.row($(this).parents('tr')).index();
            members_list.splice(index, 1);
            member_ids.splice(index, 1);
            positions.splice(index, 1);
            members_table.clear();
            members_table.rows.add(members_list);
            members_table.draw();
            $('#member_ids').val(JSON.stringify(member_ids)); 
            $('#position_ids').val(JSON.stringify(positions)); 
        });

   
</script>


@endpush
