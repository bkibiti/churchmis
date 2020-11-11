@extends("layouts.master")

@section('page_css')
<link rel="stylesheet" href="{{asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Update User Role</h1>
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
          <h3 class="card-title">Role</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('roles.update')}}" method="POST">
          @csrf
          <div class="card-body">
            <input type="hidden" name="id" value="{{$role->id}}">
       
            <div class="form-group row">
                  <label  class="col-md-2 col-form-label">Role:<font color="red">*</font> </label>
                  <div class="col-md-8">
                    <input id="role" type="text" class="form-control" name="name" value="{{$role->name}}" required autofocus>

                  </div>
          </div>
          <div class="form-group row">
              <label  class="col-md-2 col-form-label">Description: </label>
              <div class="col-md-8">
                <input id="description" type="text" class="form-control" name="description" value="{{$role->description}}" >

              </div>
          </div>

          <div class="form-group row">
              <label  class="col-md-2 col-form-label ">Permissions:<font color="red">*</font> </label>
              <div class="col-md-10">
                      <div class="form-group row">
                              <div class="col-sm-2">
                                      <div class="icheck-success d-inline">
                                          <input type="checkbox" id="check_all">
                                          <label for="check_all" class="cr">Check All</label>
                                      </div>
                              </div>
                      </div>

                  <div class="form-group row">
                    @foreach ($permissionsAll as $permission)
                      <div class="col-sm-4">
                              <div class="icheck-success d-inline">
                                  <input type="checkbox" name="permissions[]" id="{{$permission->id}}" value="{{$permission->id}}">
                                  <label for="{{$permission->id}}" class="cr"> {{$permission->name}}</label>
                              </div>
                      </div>
                    @endforeach

                  </div>
              </div>
          </div>

         
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">Update</button>
           
            <a href="{{route('roles.index')}}">
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

$(document).ready(function() {

  $('#check_all').click(function() {
            var c = this.checked;
            $(':checkbox').prop('checked',c);
    });

    var permissions = @json($permissionsAssigned);


    $('input[type=checkbox]').each(function () {
              var id = $(this).val();
              if (ValueExist(id,permissions)==1) {
                      $(this).attr('checked', true);
              }
    });

    function ValueExist(value,arr){
        var status = '0';

        for(var i=0; i<arr.length; i++){
                var name = arr[i];
                if(name == value){
                        status = '1';
                        break;
                }
        }
        return status;
    }

});

</script>


@endpush
