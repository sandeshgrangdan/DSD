<?php session_start();
require_once "config.php";
include 'includes/db.php';
if ( isset($_SESSION['role']) ) {
	if ($_SESSION['role'] == "admin") {
		header('Location: adminpanel/index.php');
		exit();
	}
} elseif (isset($_SESSION['access_token'])) {
		header('Location: adminpanel/index.php');
		exit();
}elseif(isset($_COOKIE['email']) && $_COOKIE['email']!= null){
	// if (!isset($_SESSION['role']) ) {
     $sql = "SELECT * from user WHERE user_email = '$_COOKIE[email]'";
		if($result = mysqli_query($conn,$sql)){				 
						 if(mysqli_num_rows($result) == 1){
						 	while($rows = mysqli_fetch_assoc($result)){
								$_SESSION['email'] = $rows['user_email'];
								$_SESSION['gender'] = $rows['user_gender'];
								$_SESSION['familyName'] = $rows['user_l_name'];
								$_SESSION['givenName'] = $rows['user_f_name'];
								$_SESSION['role'] = $rows['role'];

								if($rows['role'] == "admin")
									header('Location: adminpanel/index.php?fromcookie');
							}

		                 }
        }
}
	 if(isset($_POST['submit_contact'])){
		 $date = date('Y-m-d h:i:s');
		 
		 $ins_sql= "INSERT INTO comments (name,email,subject,comment,date) VALUES ('$_POST[name]','$_POST[email]','$_POST[subject]','$_POST[comment]','$date')";
		 $run_sql=mysqli_query($conn,$ins_sql);
	 }
  
?>
<!DOCTYPE html>
<html>
	 <head>
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="../assets/css/docs.css" rel="stylesheet" >
            <link rel="stylesheet" type="text/css" href="CSS/btn.css">
            <link rel="stylesheet" type="text/css" href="CSS/style.css">
	 
	 
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
						 <h2>Contact Us Form</h2>
					 </div>
					 <form class="form-horizontal" action="contact.php" method="post" role="form">
						 <div class="form-group">
							 <label for="name" class="col-sm-2 control-label">Name *</label>
							 <div class="col-sm-8">
								 <input type="text" class="form-control" name="name" placeholder="insert your fucking name" id="name" required>
							 </div>
						 </div>
						 <div class="form-group">
							 <label for="email" class="col-sm-2 control-label">Email Address *</label>
							 <div class="col-sm-8">
								 <input type="email" class="form-control" name="email" placeholder="email address" id="email" required>
							 </div>
						 </div>
						 <div class="form-group">
							 <label for="subject" class="col-sm-2 control-label">Subeject *</label>
							 <div class="col-sm-8">
								 <input type="text" class="form-control" name="subject" placeholder="insert your fucking subject" id="subject" required>
							 </div>
						 </div>
						 <div class="form-group">
							 <label for="comments" class="col-sm-2 control-label">comment *</label>
							 <div class="col-sm-8">
								 <textarea class="form-control" name="comment" rows="10" style="resize:none"></textarea>
							 </div>
						 </div>
						 <div class="form-group">
							 <label  class="col-sm-2 control-label"></label>
							 <div class="col-sm-8">
								 <input type="submit" value="Submit your Form" class="btn btn-default btn-block btn-danger btn-sm" name="submit_contact">
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