<div class="modal fade" id="addMember" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ongeza Mtegemezi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('dependants.store') }}" method="POST">
                        @csrf                      

                            <input type="hidden" name="person_id" value="{{$person_id}}">
                            <input type="hidden" name="parent_name" value="{{$parent_name}}">


                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jina <font color="red">*</font></label>
                                <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Jina">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jinsia <font color="red">*</font></label>
                                <div class="col-sm-8">
                                <select class="form-control select2" id="gender" name ="gender" required>
                                    <option value="">--Chagua--</option>
                                    <option value="Me" {{ old('gender') == 'Me' ? 'selected' : '' }}>Mwanaume</option>
                                    <option value="Ke" {{ old('gender') == 'Ke' ? 'selected' : '' }}>Mwanamke</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Uhusiano <font color="red">*</font></label>
                                <div class="col-sm-8">
                                <select class="form-control select2" id="relation_id" name ="relation_id" required>
                                    <option value="">--Chagua--</option>
                                    @foreach($relations as $p)
                                        <option value="{{ $p->id }}">{{ $p->name  }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kuzaliwa </label>
                            <div class="col-sm-8">
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" value="{{ old('date_confirmation') }}" id="dob" name="dob"
                                        data-target="#datetimepicker1" />
                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Funga</button>
                            <button type="submit" class="btn btn-primary" >Ongeza</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
