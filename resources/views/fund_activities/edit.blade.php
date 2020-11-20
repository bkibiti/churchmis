<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Aina ya Ahadi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('fund-activities.update','delete')}}" method="POST">
                @csrf
                @method('put')

                <div class="card-body">
           
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Aina ya Ahadi<font color="red">*</font></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control"  name="name"  id="ename"  value="{{old('name')}}" placeholder="Funding activity" required>
                    </div>
                  </div>

        
                  <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Kujirudia <font color="red">*</font></label>
                      <div class="col-sm-8">
                        <select class="form-control select2" id="eschedule" name ="schedule" required>
                          <option value="">--Chagua--</option>
                            <option value="Mara Moja">Mara Moja</option>
                            <option value="Kila Wiki">Kila Wiki</option>
                            <option value="Kila Mwezi">Kila Mwezi</option>
                            <option value="Kila Miezi Mitatu">Kila Miezi Mitatu</option>
                            <option value="Kila Mwaka">Kila Mwaka</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Status <font color="red">*</font></label>
                    <div class="col-sm-8">
                      <select class="form-control select2" id="status" name ="status" required>
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                      </select>
                    </div>
                </div>
      
               <input type="text" name="id" id="eid" hidden>
         
                </div>
           
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Funga</button>
                    <button type="submit" class="btn btn-primary btn-sm">Hifadhi</button>
                </div>
              </form>

      </div>
    </div>
</div>
