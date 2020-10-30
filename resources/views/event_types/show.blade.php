@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">{{$family->name}} - Family</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
   
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-info"></i> 
             &nbsp; {{$family->name}}
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h6><i class="fas fa-phone-alt"></i> {{$family->mobile_phone}}</h6>
            <h6><i class="fas fa-mobile-alt"></i> {{$family->alt_mobile}}</h6>
            <h6><i class="fas fa-envelope"></i> {{$family->email}}</h6>
            <h6><i class="fas fa-calendar-day"></i> Wedding Date: {{$family->wedding_date}}</h6>
            <h6><i class="fas fa-map-marker-alt"></i> {{$family->address}}</h6>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

    <div class="col-md-8">
        <div class="row">
          <div class="card col-md-12">
        
            <div class="card-body">
              <button type="button" class="btn btn-outline-warning ">Deactivate Family</button>
              <button type="button" class="btn btn-outline-danger">Delete Family</button>
              <button type="button" class="btn btn-outline-info ">Add Pledge</button>
              <button type="button" class="btn btn-outline-dark ">Add Note</button>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="row">
          <div class="card col-md-12">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-sticky-note"></i> 
                &nbsp; Notes
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </div>
    
    
  </div>
  <!-- /.row -->

<div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-users"></i>
            &nbsp; Family Members
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">

            @foreach ($family->members as $m)
              <div class="col-md-4">
                    <div class="callout callout-info">
                          <h5><p class="text-info">{{$m->first_name . ' ' . $m->last_name}}</p></h5>
                          <h6><p class="text-success">
                            @if ($m->gender =='M')
                              <i class="fas fa-male"></i> {{getPersonRole($m->person_role_id)}}
                            @else
                              <i class="fas fa-female"></i> {{getPersonRole($m->person_role_id)}}
                            @endif </p>
                          </h6>
                          <h6><i class="fas fa-phone-alt"></i> {{$m->mobile_phone}}</h6>
                          {{-- <h6><i class="fas fa-mobile-alt"></i> {{$m->alt_mobile}}</h6> --}}
                          <h6><i class="fas fa-envelope"></i> {{$m->email}}</h6>
                          <h6><i class="fas fa-birthday-cake"></i> {{$m->dob}}</h6>
                  </div>
              </div>
            @endforeach
     
          </div>
       

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
  

  <div class="row">
    <div class="col-md-12">
      <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-money-check-alt"></i>
              &nbsp; Pledges & Payments
            </h3>
          </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
     
         
          <div class="card-body">
       
 
      
 
          </div>
      
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
        
   
        
    });



</script>


@endpush
