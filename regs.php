<?php include 'includes/db.php';
	 $match='';
	 if(isset($_POST['confirm'])){
		 $date = date('Y-m-d h:i:s');
		 
		 if($_POST['password'] == $_POST['con_password']){
			 
		 
		 
		 $ins_sql= "INSERT INTO user (role, user_f_name,user_l_name,user_email,user_password,user_gender,user_marital_status,user_phone_no,user_designation,user_website,user_address,user_about_me,user_date) 
		 VALUES ('subscriber','$_POST[first_name]','$_POST[last_name]','$_POST[email]','$_POST[password]','$_POST[gender]','$_POST[marital_status]','$_POST[phone_no]','$_POST[designation]','$_POST[website]','$_POST[address]','$_POST[about_me]','$date')";
		 $run_sql=mysqli_query($conn,$ins_sql);
		 }else{
			 $match='<div class="col-sm-12 alert alert-danger">Password doesn&apos;t match</div>';
		 }
	 }
  
?>
<!DOCTYPE html>
<html>
	 <head>
	 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="assets/css/docs.css" rel="stylesheet" >
            <link rel="stylesheet" type="text/css" href="css/style.css">
	 
	 
	     <title>Dherai Sasto Deal</title>

		 <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
		 <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
		 <link rel="stylesheet" href="../bootstrap-social/bootstrap-social.css">
	 </head>
	 <body>
		 <?php include 'includes/header1.php';?>
		 <br>
		 <div class="container">
			 <article class="row">
				 <section class="col-lg-8">
					 <div class="page-header">
						 <h3>Registration Form</h3>
					 </div>
					 <form class="form-horizontal" action="regs.php" method="post" role="form">
						 <div class="form-group">
							 <label for="first_name" class="col-sm-3 control-label">First Name *</label>
							 <div class="col-sm-8">
								 <input type="text" class="form-control" name="first_name" placeholder="insert your fucking name" id="first_name" required>
							 </div>
						 </div>
						 <div class="form-group">
							 <label for="last_name" class="col-sm-3 control-label">Last Name *</label>
							 <div class="col-sm-8">
								 <input type="text" class="form-control" name="last_name" placeholder="insert your fucking name" id="last_name" required>
							 </div>
						 </div>
						 <div class="form-group">
							 <label for="email" class="col-sm-3 control-label">Email Address *</label>
							 <div class="col-sm-8">
								 <input type="email" class="form-control" name="email" placeholder="email address" id="email" required>
							 </div>
						 </div>
						 <div class="form-group">
							 <label for="password" class="col-sm-3 control-label">password *</label>
							 <div class="col-sm-8">
								 <input type="password" class="form-control" name="password" placeholder="insert your password" id="password" required>
							 </div>
						 </div>
						 <div class="form-group">
							 <label for="con_password" class="col-sm-3 control-label">Confirm password *</label>
							 <div class="col-sm-8">
								 <input type="password" class="form-control" name="con_password" placeholder="re-enter your password" id="con_password" required>
							 </div>
						 </div>
						  <?php echo $match;?>
						  
						  <div class="form-group">
							 <label for="gender" class="col-sm-3 control-label">Gender *</label>
							 <div class="col-sm-3">
								 <select class="form-control" name="gender" id="gender" required>
									 <option value="">Select Gender</option>
									 <option value="male">Male</option>
									 <option value="female">Female</option>
									 <option value="female">XXAka</option>
								 </select> 
							 </div>
						
							 <label for="marital_status" class="col-sm-2 control-label">Marital Status</label>
							 <div class="col-sm-3">
								 <select class="form-control" id="marital_status" name="marital_status">
									 <option value="">Select Status</option>
									 <option value="single">Single</option>
									 <option value="married">Married</option>
									 <option value="diversed">Diversed</option>
									 <option value="other">Other</option>
								 </select> 
							 </div>
						 </div>
						 <div class="form-group">
							 <label for="phone_no" class="col-sm-3 control-label">Phone Number: *</label>
							 <div class="col-sm-8">
								 <input type="text" class="form-control" name="phone_no" placeholder="insert your contact" id="phone_no" required>
							 </div>
						 </div>
						 <div class="form-group">
							 <label for="designation" class="col-sm-3 control-label">Designation</label>
							 <div class="col-sm-8">
								 <input type="text" class="form-control" name="designation" placeholder="insert your designation" id="designation" required>
							 </div>
						 </div>
						 <div class="form-group">
							 <label for="website" class="col-sm-3 control-label">Website</label>
							 <div class="col-sm-8">
								 <input type="text" class="form-control" name="website" placeholder="insert your official website" id="website" >
							 </div>
						 </div>
						 <div class="form-group">
							 <label for="address" class="col-sm-3 control-label">Address</label>
							 <div class="col-sm-8">
			                     <textarea class="form-control" name="address" rows="3" id="address" required></textarea>
							 </div>
						 </div>
						 <div class="form-group">
						 	 <label for="about_me" class="col-sm-3 control-label">About me:</label>
							 <div class="col-sm-8">
			                     <textarea class="form-control" name="about_me" id="about_me" rows="3" required></textarea>
							 </div>
						 </div>
						 

						<div class="form-group">
							 <label  class="col-sm-3 control-label"></label>
							 <div class="col-sm-8">
								 <input type="submit" value="Confirms" class="btn btn-default btn-block btn-danger" name="confirm">
							 </div>
						 </div>
						 
					 </form>
					 
				 </section>
				 <?php include 'includes/aside.php';?>
			 </article>
		 </div>
		<?php include 'includes/footer.php';?> 
		<script src="js/main.js"></script>
		<script src="../bootstrap/dist/js/jquery-slim.min.js"></script>
		<script src="../bootstrap/dist/js/popper.min.js"></script> 
		 <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
		

		 <script src="js/script.js"></script>
		 <script src="js/main.js"></script>
	 </body>
</html>