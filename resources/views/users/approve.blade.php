<div class="modal fade" id="approveUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Approve User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('users.approve')}}" method="post">
                @csrf       
                

                <div class="modal-body">
                  <p  id = "prompt_message"> </p>
                  <input type="hidden" id="userid" name="userid" value="">
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                </div>
            </form>

      </div>
        </div>
 </div>
