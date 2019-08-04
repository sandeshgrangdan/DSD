    <div class="modal fade" id="addpage" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Send FeadBack!</h2>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                               <form class="form-horizontal" action="#" method="post" role="form" name="feadback" onsubmit=" return feadbackvalid() ">
                                      
                           
                                     <div class="form-group">
                                       <label for="address" >Feadback</label>
                                                   <textarea class="form-control" name="editor1" id="address" Placeholder="Insert Your Feadback" required></textarea>
                                      </div>
                                     <div class="form-group">
                                                    <input type="submit" value="Confirms" class="btn btn-default btn-block btn-danger" name="mail">
                                            </div>

                                   
                                     
                                   </form>
                </div>
                <div class="modal-footer">
                  <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                     
                </div>
              </div>
        </div>
    </div>
    <script >
      function feadbackvalid() {
        var feadback = document.feadback.editor1.value;
        if(feadback.trim() == ''){
          document.feadback.editor1.focus();
          swal ( "Feadback is empty!" ,  "Please give some feadback to us" ,  "error" );
          return false;
        }

        return true
      }
    </script>