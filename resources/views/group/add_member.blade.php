<div class="modal fade" id="addMember" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="panel-body">
                        <form id="addItemForm" >

                      

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Person <font color="red">*</font></label>
                                <div class="col-sm-8">
                                  <select class="form-control select2" id="member_id" name ="member_id" required>
                                      <option value="">--Select Person--</option>
                                      @foreach($people as $p)
                                        <option value="{{ $p->id }}"}}>{{ $p->first_name .' ' . $p->last_name }}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Person Position <font color="red">*</font></label>
                                <div class="col-sm-8">
                                <select class="form-control select2" id="position_id" name ="position_id" required>
                                    <option value="">--Select Person--</option>
                                    @foreach($position as $p)
                                        <option value="{{ $p->id }}"}}>{{ $p->name  }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                        

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Add</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
