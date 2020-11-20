@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Ingiza Malipo</h1>
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
                        <h3 class="card-title">Taarifa za Malipo</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('payments.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Aina ya Malipo<font color="red">*</font></label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="pledged" name="pledged">
                                        <option value="1">Malipo Mapya</option>
                                        <option value="2">Malipo ya Ahadi</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Paymet without previous pledge -->

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Aina ya Ahadi<font color="red">*</font></label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" id="activity_id" name="activity_id" required>
                                            <option value="">--Chagua--</option>
                                            @foreach ($fundActivity as $a)
                                                <option value={{ $a->id }}>{{ $a->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id='pledger_group_div'>

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

                            </div>




                            <div class="form-group row" id="pledger_name">
                                <label class="col-sm-2 col-form-label">Ahadi kutoka<font color="red">*</font></label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" id="pledge_id" name="pledge_id">

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tarehe ya Malipo <font color="red">*</font></label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id='pay_date' name='pay_date' data-target="#datetimepicker1" />
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Kiasi <font color="red">*</font></label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="amount" id="amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jinsi ya Kulipia<font color="red">*</font></label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" id="payment_method_id" name="payment_method_id" required>
                                        @foreach ($paymentMethod as $p)
                                            <option value={{ $p->id }}>{{ $p->name }}</option>
                                        @endforeach
                                    </select>
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
                                  <a href="{{ route('payments.index') }}">
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
        $('#person').show();
        $('#pledger_name').hide();

        $(document).ready(function() {
            $('.select2').select2()

        });


        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'DD/MM/YYYY',
            });
        });

        $('#pledged').on('select2:selecting', function(e) {
            var id = e.params.args.data.id;
            if (id == '1') {
                $('#pledger_group_div').show();
                $('#pledger_div').show();
                $('#pledger_name').hide();
            }

            if (id == '2') {
                $('#pledger_group_div').hide();
                $('#pledger_div').hide();
                $('#pledger_name').show();
                $('#person_id').prop('required', false);
                $('#pledger').prop('required', false);
            }

        });



        //on change of activity load pledges for this activity

        $('#activity_id').on('select2:selecting', function(e) {
            if ($('#pledged').val() == "2") {
                var id = e.params.args.data.id;
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('payments.pledges') }}",
                    method: "POST",
                    data: {
                        _token: _token,
                        activity_id: id
                    },
                    success: function(result) {
                        $('#pledge_id').html(result);
                    }
                })
            }

        });

    </script>


@endpush
