@extends("layouts.master")

@section('page_css')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Badilisha Taarifa za Aina ya Tukio</h1>
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
                        <h3 class="card-title">Aina ya Tukio</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('event-types.update', $eventType->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Aina ya Tukio<font color="red">*</font></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $eventType->name }}" placeholder="Event Name" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kujirudia <font color="red">*</font></label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" id="occurance" name="occurance" required>
                                        <option value="none" {{ $eventType->occurance == 'none' ? 'selected' : '' }}>None</option>
                                        <option value="weekly" {{ $eventType->occurance == 'weekly' ? 'selected' : '' }}>Weekly</option>
                                        <option value="monthly" {{ $eventType->occurance == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                        <option value="yearly" {{ $eventType->occurance == 'yearly' ? 'selected' : '' }}>Yearly</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row" id="dow">
                                <label class="col-sm-2 col-form-label">Siky ya Wiki</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" id="occurance_dow" name="occurance_dow" required>
                                        <option value="Sunday" {{ $eventType->occurance_dow == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                        <option value="Monday" {{ $eventType->occurance_dow == 'Monday' ? 'selected' : '' }}>Monday</option>
                                        <option value="Tuesday" {{ $eventType->occurance_dow == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                        <option value="Wednesday" {{ $eventType->occurance_dow == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                        <option value="Thursday" {{ $eventType->occurance_dow == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                        <option value="Friday" {{ $eventType->occurance_dow == 'Friday' ? 'selected' : '' }}>Friday</option>
                                        <option value="Saturday" {{ $eventType->occurance_dow == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="dom">
                                <label class="col-sm-2 col-form-label">Tarehe katika Mwezi</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="occurance_dom" id="occurance_dom" value="{{ $eventType->occurance_dom }}" placeholder="Day of month e.g. 12" min="1"
                                        max="31">
                                </div>
                            </div>
                            <div class="form-group row" id="doy">
                                <label class="col-sm-2 col-form-label">Tarehe katika Mwaka</label>
                                <div class="col-sm-8">
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="occurance_doy" , name="occurance_doy" data-target="#datetimepicker2" />
                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Rangi ya Kalenda</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control my-colorpicker1" name="color" id="color" value="{{ $eventType->color }}" required>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">

                            <div class="form-group row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-2">
                                    <a href="{{ route('event-types.index') }}">
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
    <!-- bootstrap color picker -->
    <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    @include('partials.notification')

    <script>
        if ("{{ $eventType->occurance }}" == 'none') {
            $('#dow').hide();
            $('#dom').hide();
            $('#doy').hide();
        }
        if ("{{ $eventType->occurance }}" == 'weekly') {
            $('#dow').show();
            $('#dom').hide();
            $('#doy').hide();
        }
        if ("{{ $eventType->occurance }}" == 'monthly') {
            $('#dow').hide();
            $('#dom').show();
            $('#doy').hide();
        }
        if ("{{ $eventType->occurance }}" == 'yearly') {
            $('#dow').hide();
            $('#dom').hide();
            $('#doy').show();
        }

        $(document).ready(function() {
            $('.select2').select2()
            $('.my-colorpicker1').colorpicker()

            $(function() {
                $('#datetimepicker1').datetimepicker({
                    format: 'LT'
                });
            });
            $(function() {
                $('#datetimepicker2').datetimepicker({
                    format: 'DD/MM/YYYY',
                    date: moment("{{ $eventType->occurance_doy }}", 'YYYY/MM/DD')
                });
            });


        });


        $('#occurance').on('select2:selecting', function(e) {

            var id = e.params.args.data.id;

            if (id == 'none') {
                $('#dow').hide();
                $('#dom').hide();
                $('#doy').hide();
            }
            if (id == 'weekly') {
                $('#dow').show();
                $('#dom').hide();
                $('#doy').hide();
            }
            if (id == 'monthly') {
                $('#dow').hide();
                $('#dom').show();
                $('#doy').hide();
            }
            if (id == 'yearly') {
                $('#dow').hide();
                $('#dom').hide();
                $('#doy').show();
            }


        });

    </script>


@endpush
