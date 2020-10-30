@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Group Information</h1>
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
            <label>Group Type: </label> {{$group->type->name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Group Name: </label> {{$group->name}} <br>
            <label>Description: </label> {{$group->description}}
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
             &nbsp; Group Members
           </h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
           <div class="row">
            @if ($group->members->isNotEmpty())
            <table id="mydatatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Member</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Position in Group</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($group->members as $g)
                    <tr>
                      <td>{{$g->first_name .' '.$g->middle_name . ' ' . $g->last_name}}</td>
                      <td>{{$g->gender}}</td>
                      <td>{{$g->mobile_phone}}</td>
                      <td>{{getPosition($g->pivot->position_id)}}</td>
                  
                    </tr>
                  @endforeach
                  
                
                </tbody>
            </table>
          @else
            
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-info"></i>
                  Group has no members
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
