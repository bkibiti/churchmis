<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Funding Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('fund-activities.store')}}" method="POST">
                @csrf
                <div class="card-body">
           
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Activity<font color="red">*</font></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  name="name"  id="name"  value="{{old('name')}}" placeholder="Funding activity" required>
                    </div>
                  </div>
                  <div class="form-group row" id="dow">
                    <label class="col-sm-3 col-form-label">Type <font color="red">*</font></label>
                    <div class="col-sm-9">
                    <select class="form-control select2" id="type" name ="type" required>
                            <option value="">Select</option>
                        <option value="Pledgeable">Pledgeable</option>
                        <option value="Non Pledgeable">Non Pledgeable</option>
                    </select>
                    </div>
                </div>
        
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Schedule <font color="red">*</font></label>
                      <div class="col-sm-9">
                        <select class="form-control select2" id="schedule" name ="schedule" required>
                            <option value="">Select</option>
                            <option value="Once">Once</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Yearly">Yearly</option>
                        </select>
                      </div>
                  </div>
      
               
         
                </div>
           
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
              </form>

      </div>
    </div>
</div>
