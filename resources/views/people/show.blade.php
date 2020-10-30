@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Person Profile</h1>
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
          <h3 >
             <p class="text-info">{{$person->first_name.' '. $person->middle_name .' '. $person->last_name .' ('.$person->gender.')' }}  </p>
          </h3>
        </div>
        <div class="card-body">
  
            <label>Person Role: </label> {{$person->personRole->name}} <br>
            <label>Person Classification: </label>  {{$person->classification->name}} <br>
            <label>Mobile: </label> {{$person->mobile_phone}} <br>
            <label>Alt Mobile: </label> {{$person->alt_mobile}} <br>
            <label>E-Mail: </label> {{$person->email}} <br>
            <label>Date of Birth: </label>  {{$person->dob}} <br>
            <label>Address: </label> {{$person->address}} <br>
            <label>Region: </label> {{$person->region}} <br>
            <label>District: </label> {{$person->district}} <br>
            <label>Date of Membership: </label> {{$person->membership_date}} <br>
            <label>Date of Confirmation: </label> {{$person->date_confirmation}} <br>
            <label>Date of Marriage: </label> {{$person->date_marriage}} <br>

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
          <div class="col-md-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="person-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="family-tab" data-toggle="pill" href="#family" role="tab" aria-controls="family" aria-selected="true">Family Members</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="groups-tab" data-toggle="pill" href="#groups" role="tab" aria-controls="groups" aria-selected="false">Assigned Groups</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="notes-tab" data-toggle="pill" href="#notes" role="tab" aria-controls="notes" aria-selected="false">Notes</a>
                  </li>
            
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="person-tabContent">
                  <div class="tab-pane fade show active" id="family" role="tabpanel" aria-labelledby="family-tab">
                      @if ($members->isNotEmpty())
                        <table id="mydatatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Member</th>
                                    <th>Gender</th>
                                    <th>Mobile</th>
                                    <th>Role</th>
                                    <th>Classification</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($members as $p)
                              <tr>
                                <td>{{$p->first_name .' '.$p->middle_name . ' ' . $p->last_name}}</td>
                                <td>{{$p->gender}}</td>
                                <td>{{$p->mobile_phone}}</td>
                                <td>{{$person->personRole->name}}</td>
                                <td>{{$p->classification->name}}</td>
                            
                              </tr>
                              @endforeach
                              
                            
                            </tbody>
                        </table>
                      @else
                        
                          <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-info"></i>
                              Person has no family members
                          </div>
                      @endif
            
                      
                  </div>
                  <div class="tab-pane fade" id="groups" role="tabpanel" aria-labelledby="groups-tab">
                      @if ($person->group->isNotEmpty())
                            <table id="mydatatable" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>Group Name</th>
                                      <th>Group Type</th>
                                      <th>Description</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($person->group as $g)
                                <tr>
                                  <td>{{$g->name}}</td>
                                  <td>{{$g->type->name}}</td>
                                  <td>{{$g->description}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                       
                      @else
                          <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-info"></i>
                              Person is not in any group
                          </div>
                      @endif
                  </div>

                  <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                      @if ($person->notes->isNotEmpty())
                        @foreach ($person->notes as $note)
                            <div class="callout callout-warning">
                               <h6> {{$note->created_at}}</h6>
                               {{$note->note}}
                            </div>
                        @endforeach
                      @else
                          <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-info"></i>
                              No notes found
                          </div>
                      @endif
        
                  </div>
                
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    
  </div>
  <!-- /.row -->



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
