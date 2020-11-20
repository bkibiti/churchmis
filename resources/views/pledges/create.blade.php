@extends("layouts.master")

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
                        <h3 class="card-title">Taarifa ya Ahadi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('pledges.store') }}" method="POST">
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

                            <div class="form-group row" id="person">
                                <label class="col-sm-2 col-form-label">Msharika<font color="red">*</font></label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" id="person_id" name="person_id">
                                        <option value="">--Chagua--</option>

                                        @foreach ($person as $p)
                                            @php
                                            $address = '';
                                            if ($p->address <> '') {
                                                $address =', kutoka '. $p->address;
                                                }
                                                @endphp
                                                <option value="{{ $p->id }}" }}>{{ $p->name . ' ' . $address }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

        
                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label">Tarehe ya Ahadi <font color="red">*</font></label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id='pledge_date' name='pledge_date' data-target="#datetimepicker1" />
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Kiasi <font color="red">*</font></label>
                                <div class="col-sm-4">
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
                                    <a href="{{ route('pledges.index') }}">
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


        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'DD/MM/YYYY',
            });
        });




    </script>


@endpush
