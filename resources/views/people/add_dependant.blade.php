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
                        <form id="addItemForm" >

                      

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jina <font color="red">*</font></label>
                                <div class="col-sm-8">
                                  <select class="form-control select2" id="member_id" name ="member_id" required>
                                      @foreach($members as $p)
                                        <option value="{{ $p->id }}"}}>{{ $p->name }}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Uhusiano <font color="red">*</font></label>
                                <div class="col-sm-8">
                                <select class="form-control select2" id="relation_id" name ="relation_id" required>
                                    @foreach($relations as $p)
                                        <option value="{{ $p->id }}"}}>{{ $p->name  }}</option>
                                    @endforeach
                                </select>
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
