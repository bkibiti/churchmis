@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Taarifa za Kikundi</h1>
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
            <label>Jina la Kikundi: </label> {{$service->name}} <br>
            <label>Maelezo ya Kikundi: </label> {{$service->description}}
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
             &nbsp; Wanachama
           </h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
           <div class="row">
            @if ($service->members->isNotEmpty())
            <table id="mydatatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Jina</th>
                        <th>Jinsia</th>
                        <th>Simu</th>
                        <th>Nafasi katika Kundi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($service->members as $g)
                    <tr>
                      <td>{{$g->name}}</td>
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
                  Kundi halina Wanachama
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
