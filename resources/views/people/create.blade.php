@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Msharika Mpya</h1>
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
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('people.store') }}" method="POST">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Taarifa Binafsi</h3>
                        </div>
                        <!-- /.card-header -->

                        @csrf
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jina la Msharika<font color="red">*</font></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Jina">
                                </div>
                                <label class="col-sm-2 col-form-label">Jinsi (Me/Ke) <font color="red">*</font></label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="gender" name="gender" required>
                                        <option value="">--Chagua--</option>
                                        <option value="Me" {{ old('gender') == 'Me' ? 'selected' : '' }}>Mwanaume</option>
                                        <option value="Ke" {{ old('gender') == 'Ke' ? 'selected' : '' }}>Mwanamke</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tarehe ya Kuzaliwa</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="{{ old('dob') }}" id="dob" , name="dob" data-target="#datetimepicker1" />
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">Mahali Alipozaliwa</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="birth_place" id="birth_place">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hali ya Ndoa</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="marriage_status" name="marriage_status">
                                        <option value="">--Chagua--</option>
                                        <option value="Ameoa" {{ old('marriage_status') == 'Ameoa' ? 'selected' : '' }}>Ameoa</option>
                                        <option value="Hajaoa" {{ old('marriage_status') == 'Hajaoa' ? 'selected' : '' }}> Hajaoa</option>
                                        <option value="Ameolewa" {{ old('marriage_status') == 'Ameolewa' ? 'selected' : '' }}> Ameolewa</option>
                                        <option value="Hajaoa" {{ old('marriage_status') == 'Hajaoa' ? 'selected' : '' }}> Hajaoa </option>
                                        <option value="Mjane" {{ old('marriage_status') == 'Mjane' ? 'selected' : '' }}> Mjane </option>
                                        <option value="Talaka" {{ old('marriage_status') == 'Talaka' ? 'selected' : '' }}>Talaka</option>
                                        <option value="Wametengana" {{ old('marriage_status') == 'Wametengana' ? 'selected' : '' }}>Wametengana</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Aina ya Ndoa</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="marriage_type" name="marriage_type">
                                        <option value="">--Chagua--</option>
                                        <option value="Kikristo" {{ old('marriage_status') == 'Kikristo' ? 'selected' : '' }}>
                                            Kikristo</option>
                                        <option value="SioKikristo" {{ old('marriage_status') == 'SioKikristo' ? 'selected' : '' }}>Sio Kikristo
                                        </option>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Tarehe ya Ndoa</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="{{ old('date_marriage') }}" id="date_marriage" , name="date_marriage"
                                            data-target="#datetimepicker2" />
                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jina la Mwenzi</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('partner_name') }}" name="partner_name" id="partner_name">
                                </div>
                                <label class="col-sm-3 col-form-label">Mahali pa Kufunga Ndoa</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" value="{{ old('marriage_place') }}" name="marriage_place" id="marriage_place">
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="mb-2">Wategemezi</h5>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn  btn-rounded btn-icon btn-warning float-right" 
                                    data-toggle="modal" data-target="#addMember">Ongeza Mtegemezi
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                  <table id="dependants" class="table table-bordered table-striped">
                            
                                  </table>
                                </div>
                            </div>
                
                            <input type="hidden" name="dependant_ids" id="dependant_ids" >
                            <input type="hidden" name="relation_ids" id="relation_ids">



                        </div>
                        <!-- /.card-body -->

                        {{-- Mawasiliano --}}
                        <div class="card-header">
                            <h3 class="card-title">Mawasiliano na Makazi</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Namba ya Simu</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('mobile_phone') }}" name="mobile_phone" id="mobile_phone">
                                </div>
                                <label class="col-sm-2 col-form-label">Namba ya Mwenzi</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('partner_phone') }}" name="partner_phone" id="partner_phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sanduku la Barua</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('address') }}" name="address" id="address">
                                </div>
                                <label class="col-sm-2 col-form-label">Namba ya Nyumba</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('house_no') }}" name="house_no" id="house_no">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Baruapepe</label>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jina la Eneo Anaishi</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('residential_area') }}" name="residential_area" id="residential_area">
                                </div>
                                <label class="col-sm-2 col-form-label">Block No.</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('block_no') }}" name="block_no" id="block_no">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Usharika wa Zamani</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('previous_church') }}" name="previous_church" id="previous_church">
                                </div>
                                <label class="col-sm-2 col-form-label">Jina la Fellowship</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('fellowship') }}" name="fellowship" id="fellowship">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Msharika Jirani</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="neighbour" name="neighbour">
                                        <option value="">--Chagua--</option>
                                        @foreach ($members as $m)
                                            <option value={{ $m->id }} {{ old('neighbour') == $m->id ? 'selected' : '' }}> {{ $m->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Jina la Mzee wa Kanisa</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="church_elder" name="church_elder">
                                        <option value="">--Chagua--</option>
                                        @foreach ($members as $e)
                                            @if ($e->position_id == 2)
                                                <option value={{ $e->id }} {{ old('church_elder') == $e->id ? 'selected' : '' }}> {{ $e->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        {{-- Elimu Fani kazi --}}
                        <div class="card-header">
                            <h3 class="card-title">Elimu, Fani na Kazi</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kazi/Shughuli</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('occupation') }}" name="occupation" id="occupation">
                                </div>
                                <label class="col-sm-2 col-form-label">Mahali pa Kazi</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('work_place') }}" name="work_place" id="work_place">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Elimu</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('education') }}" id="education" name="education">
                                </div>
                                <label class="col-sm-2 col-form-label">Ujuzi/Fani</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ old('profession') }}" id="profession" name="profession">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kujitolea Kutumika Kanisani</label>
                                <div class="col-sm-3">
                                    <select class="form-control select2" id="volunteer" name="volunteer">
                                        <option value="">--Chagua--</option>
                                        <option value="Hapana" {{ old('volunteer') == 'Kikristo' ? 'selected' : '' }}> Ndiyo</option>
                                        <option value="Ndiyo" {{ old('volunteer') == 'SioKikristo' ? 'selected' : '' }}>Hapana </option>
                                    </select>
                                </div>

                            </div>
                        </div>


                        {{-- Huduma za kiroho --}}
                        <div class="card-header">
                            <h3 class="card-title">Huduma za Kiroho</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ubatizo</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="baptised" name="baptised">
                                        <option value="">--Chagua--</option>
                                        <option value="Hapana" {{ old('baptised') == 'Hapana' ? 'selected' : '' }}> Ndiyo
                                        </option>
                                        <option value="Ndiyo" {{ old('baptised') == 'Ndiyo' ? 'selected' : '' }}>Hapana
                                        </option>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Tarehe ya Ubatizo</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="{{ old('date_baptism') }}" id="date_baptism" name="date_baptism"
                                            data-target="#datetimepicker3" />
                                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kipaimara</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="confirmation" name="confirmation">
                                        <option value="">--Chagua--</option>
                                        <option value="Hapana" {{ old('confirmation') == 'Hapana' ? 'selected' : '' }}>Ndiyo
                                        </option>
                                        <option value="Ndiyo" {{ old('confirmation') == 'Ndiyo' ? 'selected' : '' }}>Hapana
                                        </option>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Tarehe ya Kipaimara</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="{{ old('date_confirmation') }}" id="date_confirmation" name="date_confirmation"
                                            data-target="#datetimepicker4" />
                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Anashiriki Sakramenti ya Meza ya Bwana</label>
                                <div class="col-sm-2">
                                    <select class="form-control select2" id="eucharist" name="eucharist">
                                        <option value="">--Chagua--</option>
                                        <option value="Hapana" {{ old('eucharist') == 'Hapana' ? 'selected' : '' }}> Ndiyo
                                        </option>
                                        <option value="Ndiyo" {{ old('eucharist') == 'Ndiyo' ? 'selected' : '' }}>Hapana
                                        </option>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Nafasi katika Usharika</label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="position_id" name="position_id">
                                        <option value="">--Chagua--</option>
                                        @foreach ($position as $e)
                                            <option value={{ $e->id }} {{ old('position_id') == $e->id ? 'selected' : '' }}> {{ $e->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>

                        {{-- Ushiriki huduma za Kanisa --}}
                        <div class="card-header">
                            <h3 class="card-title">Ushiriki wa Huduma za Kanisa na Vikundi</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Anashiriki Ibada ya Nyumba kwa Nyumba</label>
                                <div class="col-sm-2">
                                    <select class="form-control select2" id="active_community_prayers" name="active_community_prayers">
                                        <option value="">--Chagua--</option>
                                        <option value="Hapana" {{ old('active_community_prayers') == 'Hapana' ? 'selected' : '' }}> Ndiyo
                                        </option>
                                        <option value="Ndiyo" {{ old('active_community_prayers') == 'Ndiyo' ? 'selected' : '' }}>Hapana
                                        </option>
                                    </select>
                                </div>
                                <label class="col-sm-3 col-form-label">Jina la Nyumba kwa Nyumba</label>
                                <div class="col-sm-3">
                                    <select class="form-control select2" id="community_name" name="community_name">
                                        <option value="">--Chagua--</option>

                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Sababu ya Kutoshiriki</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ old('participation_reason') }}" name="participation_reason" id="participation_reason">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jina la Mwenyekiti wa Nyumba kwa Nyumba</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" id="community_leader" name="community_leader">
                                        <option value="">--Chagua--</option>
                                        @foreach ($members as $m)
                                            @if ($m->position_id == 3)
                                                <option value={{ $m->id }} {{ old('community_leader') == $m->id ? 'selected' : '' }}> {{ $m->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Huduma Usharikani</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" multiple="multiple" id="services" name="services[]">
                                        <option value="">--Chagua--</option>
                                        @foreach ($service as $e)
                                            <option value={{ $e->id }} {{ old('services') == $e->id ? 'selected' : '' }}> {{ $e->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Namba ya Ahadi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ old('pledge_no') }}" name="pledge_no" id="pledge_no">
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tarehe ya Kujaza/Kurudisha fomu</label>
                                <div class="col-sm-8">
                                    <div class="input-group date" id="datetimepicker5" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" value="{{ old('form_return_date') }}" id="form_return_date" name="form_return_date"
                                            data-target="#datetimepicker5" />
                                        <div class="input-group-append" data-target="#datetimepicker5" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer">

                            <div class="form-group row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-2">
                                    <a href="{{ route('people.index') }}">
                                        <button type="button" class="btn btn-danger btn-block">{{ __('msg.back')}}</button>
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success float-right btn-block">{{ __('msg.save')}}</button>
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
    @include('people.add_dependant')
    
    <script>
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            $(function() {
                $('#datetimepicker1').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
            $(function() {
                $('#datetimepicker2').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
            $(function() {
                $('#datetimepicker3').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
            $(function() {
                $('#datetimepicker4').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
            $(function() {
                $('#datetimepicker5').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });

        });



        
    var members_table = $('#dependants').DataTable({
        searching: false,
        bPaginate: false,
        ordering: false,
        bInfo: false,
        scrollY:  "300px",
        scrollCollapse: true,
        columns: [
            { title: "Jina" },
            { title: "Jinsia" },
            { title: "Uhusiano" },
            { title: "Ondoa", defaultContent:  '<button type="button" id="delete_btn" class="btn btn-icon btn-rounded btn-sm btn-danger"> <i class="fas fa-trash"></i></button>'},
            
        ]
    });

        var dependants_list = []; //hold data displayed in members table
        var dependants_ids = []; //hold dependants ids for saving in db
        var relations = []; //hold dependants relations

        //add dependat to list of dependants on click of modal form
        $('#addItemForm').submit(function(event) {
            event.preventDefault();

            var values = {};
            $.each($(this).serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });

            var data = []; //hold selected dependant values
            var member_id = values.member_id;
            var people = @json($members);

            $.each(people, function(index, value) {
                if (value.id == member_id) {
                    data.push(value.name);
                    data.push(value.gender);
                    data.push($("#relation_id option:selected").text());
                    dependants_ids.push(value.id);
                    relations.push(parseInt(values.relation_id));

                }
            });


            dependants_list.push(data);
            members_table.clear();
            members_table.rows.add(dependants_list).draw();
            $('#dependant_ids').val(JSON.stringify(dependants_ids));
            $('#relation_ids').val(JSON.stringify(relations));

            $('#addMember').modal('hide');

        });

        $('#dependants tbody').on('click', '#delete_btn', function() {
            var index = members_table.row($(this).parents('tr')).index();
            dependants_list.splice(index, 1);
            dependants_ids.splice(index, 1);
            relations.splice(index, 1);
            members_table.clear();
            members_table.rows.add(dependants_list);
            members_table.draw();
            $('#dependant_ids').val(JSON.stringify(dependants_ids));
            $('#relation_ids').val(JSON.stringify(relations));
        });
    </script>


@endpush
