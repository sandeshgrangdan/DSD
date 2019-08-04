<?php if(isset($_POST['form'])){
		 $date = date('Y-m-d h:i:s'); 
		 $ins_sql= "INSERT INTO user (role, user_f_name,user_l_name,user_email,user_password,user_gender,user_phone_no,user_date) 
		 VALUES ('subscriber','$_POST[first]','$_POST[last]','$_POST[email]','$_POST[password]','$_POST[gender]','$_POST[phone_no]','$date')";
		      if(mysqli_query($conn, $ins_sql)){
		      	    $_SESSION['email'] = $_POST['email'];
		      		$_SESSION['role'] = "subscriber";
		      		$_SESSION['givenName'] = $_POST['first'];
		      		$_SESSION['familyName'] = $_POST['last'];
		      		$_SESSION['gender'] = $_POST['gender'];
		      		echo '<script>alert("User Created Sucessfully")</script>';
		      		echo '<script>window.location="index.php"</script>';
		      }
		      else echo '<script>alert("User Not Created")</script>';
		     
		 }
?>
         <div class="loginbox" style="position: relative;">
         	<div class="container">
			 <article class="row" style=" width: 100%;">
			 	
				 <section class="col-lg-11">
						 <b><h2>Registration Form</h2></b>
					 <form class="form-horizontal" action="index.php" method="post" role="form" name="form" onsubmit="return formvalidate()">
						 <div class="form-group">
						 	<div class="col-md-10 ml-md-auto control-label" >
						 		<label for="first_name" >First Name *</label>
						 	</div>
							 <div class="col-md-10 ml-md-auto">
								 <input type="text" class="form-control" name="first" placeholder="Insert Your First Name" id="first_name" style="background: blanchedalmond;">
							 </div>
						 </div>
						 <div class="form-group">
						 	<div class="col-md-10 ml-md-auto control-label" >
						 		<label for="last_name">Last Name *</label>
						 	</div>
							 <div class="col-md-10 ml-md-auto">
								 <input type="text" class="form-control" name="last" placeholder="Insert Your Last Name" id="last_name" style="background: blanchedalmond;">
							 </div>
						 </div>
						 <div class="form-group">
						 	<div class="col-md-10 ml-md-auto control-label" >
						 		<label for="email" >Email Address *</label>
						 	</div>
							 
							 <div class="col-md-10 ml-md-auto">
								 <input type="text" class="form-control" name="email" placeholder="Email Address" id="email" style="background: blanchedalmond;">
							 </div>
						 </div>
						 <div class="form-group">
						 	<div class="col-md-10 ml-md-auto control-label" >
						 		 <label for="passwor">password *</label>
						 	</div>
							
							 <div class="col-md-10 ml-md-auto">
								 <input type="password" class="form-control" name="password" placeholder="Insert Your Password" id="passwor" style="background: blanchedalmond;">
							 </div>
						 </div>
						 <div class="form-group">
						 	<div class="col-md-10 ml-md-auto control-label" >
						 		<label for="con_password">Confirm password *</label>
						 	</div>
							 
							 <div class="col-md-10 ml-md-auto">
								 <input type="password" class="form-control" name="con_password" placeholder="Re-Enter Your Password" id="con_password" style="background: blanchedalmond;">
							 </div>
						 </div>
						 <? echo $match; ?>
						  
						  <div class="col-md-10 ml-md-auto">
							 <label for="gender">Gender *</label>
							 <div class="col-sm-3">
								 <select class="form-control" name="gender" id="gender" style="background: blanchedalmond;">
									 <option value="">Select Gender</option>
									 <option value="male">Male</option>
									 <option value="female">Female</option>
								 </select> 
							 </div>
						   </div>

						 <br>
						 <div class="form-group">
						 	<div class="col-md-10 ml-md-auto control-label" >
						 		<label for="phone_no" >Phone Number: *</label>
						 	</div>
							 
							 <div class="col-md-10 ml-md-auto">
								 <input type="text" class="form-control" name="phone_no" placeholder="Insert Your Contact Number" id="phone_no" style="background: blanchedalmond;">
							 </div>
						 </div>
						 

						<div class="form-group">
							 
							 <div class="col-md-10 ml-md-auto">
								 <input type="submit" value="Confirms" class="btn btn-default btn-block btn-danger" name="form">
							 </div>
						 </div>
						 
					 </form>
					 
				 </section>
				 
			 </article>
			</div>
		</div>

