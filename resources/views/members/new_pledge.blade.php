@extends("layouts.members_master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Weka Ahadi</h1>
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
                        <h3 class="card-title">Ahadi Mpya</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('member.pledges.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Aina ya Ahadi<font color="red">*</font></label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" id="activity_id" name="activity_id" required>
                                        <option value="">--Chagua--</option>
                                        @foreach ($FundActivity as $a)
                                            <option value={{ $a->id }}>{{ $a->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
           

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kiasi <font color="red">*</font></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="amount" id="amount" required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Maelezo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="comment" id="comment">
                                </div>
                            </div>





                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="form-group row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-2">
                                    <a href="{{ route('member.pledges') }}">
                                        <button type="button" class="btn btn-danger btn-block">Rudi Nyuma</button>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success float-right btn-block">Hifadhi</button>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->

            </div>

        </div>

    </div><!-- /.container-fluid -->
@endsection

@push('page_scripts')

    @include('partials.notification')

    <script>
  

        $(document).ready(function() {
            $('.select2').select2()

        });


    </script>


@endpush
