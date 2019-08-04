    <div class="modal fade" id="regs" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Sign Up!</h2>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                               <form class="form-horizontal" action="index.php" method="post" role="form" name="modal" onsubmit="return modalvalidate()">
                                 <div class="form-group">
                                   <label for="fname">First Name *</label>
                                  
                                     <input type="text" class="form-control" name="first" placeholder="Insert Your First Name" id="first_name">
                                   
                                 </div>
                                 <div class="form-group">
                                   <label for="last_name">Last Name *</label>
                              
                                     <input type="text" class="form-control" name="last" placeholder="Insert your Last Name" id="last_name" >
                                  
                                 </div>
                                 <div class="form-group">
                                   <label for="email">Email Address *</label>
                                  
                                     <input type="text" class="form-control" name="email" placeholder="Email Address" id="email" >
                                  
                                 </div>
                                 <div class="form-group">
                                   <label for="password">password *</label>
                        
                                     <input type="password" class="form-control" name="password" placeholder="Insert Your Password" id="password" >
                                   
                                 </div>
                                 <div class="form-group">
                                   <label for="con_password">Confirm password *</label>
                                     <input type="password" class="form-control" name="con_password" placeholder="Re-Enter Your Password" id="con_password" >
                                 </div>
                                  
                                  <div class="form-group">
                                   <label for="gender">Gender *</label>
                                   <div class="col-sm-6">
                                     <select class="form-control" name="gender" id="gender" >
                                       <option value="">Select Gender</option>
                                       <option value="male">Male</option>
                                       <option value="female">Female</option>
                                       <option value="female">XXAka</option>
                                     </select> 
                                   </div>
                                 </div>
                                
                                 <div class="form-group">
                                   <label for="phone_no">Phone Number: *</label>
                                     <input type="text" class="form-control" name="phone_no" placeholder="Insert Your Contact Number" id="phone_no">
                                 </div>
                                 <div class="form-group">
                                                <input type="submit" value="Confirms" class="btn btn-default btn-block btn-danger" name="confirm">
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