<div class="modal fade" id="disableUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          {{-- <div class="modal-content">

          <form action="{{route('users.deactivate')}}" method="POST">
              @csrf

              <div class="modal-body">
                <p class="text-center" id = "prompt_message"> </p>
                <input type="hidden" id="userid" name="userid" value="">
                <input type="hidden" id="status" name="status" value="">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-warning btn-sm">Yes</button>
              </div>
            </form>

          </div> --}}
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deactivate User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('users.deactivate')}}" method="post">
                @csrf
          
                
                

                <div class="modal-body">
                  <p  id = "prompt_message"> </p>
                  <input type="hidden" id="userid" name="userid" value="">
                  <input type="hidden" id="status" name="status" value="">
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                </div>
            </form>

      </div>
        </div>
 </div>
