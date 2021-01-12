@extends("layouts.members_master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">  Pending Approval</h1>
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
                <div class="card card-outline card-warning">
                
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="alert alert-warning alert-dismissible">
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                            Your account is waiting for approval. Please check back later

                          </div>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>

        </div>

    </div><!-- /.container-fluid -->
@endsection

@push('page_scripts')
 

@endpush
