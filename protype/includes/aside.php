
<aside class="col-md-4">
			<div>
				<?php if(!isset($_SESSION['email']) ) { ?>
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
												<input type="submit" class="btn btn-success btn-block"  name="submitlogin" id="login_btns">
											</div> 
								</div>
								<div class="form-group">
											<div class="col-md-12">
												<div class="input-group input-group-md">
												<a class="btn btn-block btn-social btn-google btn-md" id="login_btns" onclick=" window.location = '<?php echo $loginURL ?>'">
													<span class="fa fa-google"></span> <b>Sign in with google</b>
												</a>
											</div>
										</div>
								</div>
							</div>
						</div>
				     </form>

				     <br>
				     <?php } else { ?>
                    
                     <h2><strong>Total Transaction With DSD:</strong></h2>
                     <?php 
                     $tran = array();
                     $cur = 0.00;
                     $sql = "SELECT * FROM customers WHERE email = '$_SESSION[email]'";
                        $Total = mysqli_query($conn,$sql);
                         while( $rows= mysqli_fetch_assoc($Total) ){
                         	array_push( $tran, $rows );
                         }

                         foreach ($tran as $t) {
                         	 
                         	 $amount = "SELECT * FROM transactions where customer_id = '$t[id]'";
                         	 $camount = mysqli_query($conn,$amount);
                         	 while ( $row = mysqli_fetch_assoc($camount)) {
                         	 	$cur = $cur + $row['amount']/100;
                         	 }
                         }


                     ?>
                    <h2 style="font-size: 50px;"><b><?php echo  sprintf('%.2f' ,$cur).'$'; ?></b><h2>

					<table class="table table-dark" style="font-size: 24px;">
							<caption>Order Detail</caption>
					             	<thead>
					             		<tr>
					             			<th>Iteam</th>
					             			<th>Receved</th>
					             			<th>Claim</th>
					             		</tr>
					             		
					             	</thead>
					             	<tbody>
					             		<?php
					             		
             		                  foreach ($tran as $t) {
                         	 
                                    	 $amount = "SELECT * FROM transactions where customer_id = '$t[id]' ORDER BY id DESC LIMIT 5";
                         	             $camount = mysqli_query($conn,$amount);
                         	             while ( $row = mysqli_fetch_assoc($camount)) {
                         	          	if ( $row['received'] == "yes") {
                         	       		$s = "fa-check";
                         	         	}else 
                             	 		$s = "fa-times";
                         	        	echo '<tr>
                         	 				<td>'.ucfirst($row['product']).'</td>
                         	 				<td><span style="font-size: 20px;" class="fa '.$s.'"></span></td>
                         	 				<td>'.($row['received'] == 'yes' ? '<a href="index.php?new_status=no&id='.$row['id'].'" class="btn btn-danger btn-xs">No</a>' : 
                                         '<a href="index.php?new_status=yes&id='.$row['id'].'" class="btn btn-success btn-xs">Yes</a>').'
                                        </td>


                         	 	      </tr>';	
                         	 }
                         }
                    ?>
             		
             	</tbody>



             </table>

 <?php  } ?>
       <div>
					
					
 </aside>