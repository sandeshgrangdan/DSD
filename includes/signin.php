    <div class="modal fade" id="signin" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Sign In!</h2>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                              <form class=" form-horizontal" role="form" action="login.php" method="post" name="signin" onsubmit="return signinValidation()">

            <div class="card ">
                <div class="card-header">
                  <img src="images/avatar.png" class="avatar">
                <h2>Login Here</h2>
                <div class="input-group input-group-md">
                   <span class="login">
                      <i class="fa fa-envelope" for="username"></i>
                   </span>
                   <input class="form-control" type="text" placeholder="Insert Email" name="email" id="username">
                </div>
                <br>
                <div class="input-group input-group-md">
                   <span class="login">
                     <i class="fa fa-unlock-alt"></i>
                   </span>
                   <input class="form-control" type="password" placeholder="Insert Password" name="password" id="password">
                </div>
                <br>
                <input type="checkbox" name="remember" value="remember" id="s"> <label for="s"><b >Remember Me</b></label>

                <br>
                      <div class="form-group">
                      <div class="col-md-12">
                        <input type="submit" class="btn btn-success btn-block"  name="cart" id="login_btns">
                      </div> 
                </div>
                <div class="form-group">
                      <div class="col-md-12">
                        <a class="btn btn-block btn-social btn-google btn-md" id="login_btns" onclick=" window.location = '<?php echo $loginURL ?>'">
                          <span class="fa fa-google"></span> <b>Sign in with google</b>
                        </a>
                      </div>
                </div>
              </div>
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