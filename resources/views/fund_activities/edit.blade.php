<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Funding Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('fund-activities.update','delete')}}" method="POST">
                @csrf
                @method('put')

                <div class="card-body">
           
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Activity<font color="red">*</font></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  name="name"  id="ename"  value="{{old('name')}}" placeholder="Funding activity" required>
                    </div>
                  </div>
                  <div class="form-group row" id="dow">
                    <label class="col-sm-3 col-form-label">Type <font color="red">*</font></label>
                    <div class="col-sm-9">
                    <select class="form-control select2" id="etype" name ="type" required>
                            <option value="">Select</option>
                        <option value="Pledgeable">Pledgeable</option>
                        <option value="Non Pledgeable">Non Pledgeable</option>
                    </select>
                    </div>
                </div>
        
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Schedule <font color="red">*</font></label>
                      <div class="col-sm-9">
                        <select class="form-control select2" id="eschedule" name ="schedule" required>
                            <option value="">Select</option>
                            <option value="Once">Once</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Yearly">Yearly</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status <font color="red">*</font></label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="status" name ="status" required>
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                      </select>
                    </div>
                </div>
      
               <input type="text" name="id" id="eid" hidden>
         
                </div>
           
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
              </form>

      </div>
    </div>
</div>
