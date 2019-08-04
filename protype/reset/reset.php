<?php 
	include '../includes/db.php';
	session_start();
	// $_SESSION["vemail"] = "sandesht801@gmail.com";
	$alert = "";
	if(isset($_POST["submit"])){
		$pass = $conn->real_escape_string($_POST["pass"]);
		$cpass = $conn->real_escape_string($_POST["cpass"]);

		$hp = password_hash($pass, PASSWORD_BCRYPT);

 		

 		if ($pass == $cpass) {

 			$conn -> query("UPDATE user SET user_password = '$hp' WHERE user_email = '$_SESSION[vemail]' ");
 			session_destroy();
 			header('Location: ../index.php');
 			exit();
 				

 		}else{
 			$alert = '<div class="alert alert-danger" role="alert">
				       Password doesnapos;t match
				      </div>';
 		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forget Password</title>
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<style type="text/css">
		body{
			background-color: #212529ad ;
		}
		.form-container{
			background-color: white;
			border:0px solid #010b15;
			padding: 50px 60px;
			margin-top: 20vh;
			border-radius: 10px;
			-webkit-box-shadow: 0px 4px 27px 20px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 4px 27px 20px rgba(0,0,0,0.75);
			box-shadow: 0px 4px 27px 20px rgba(0,0,0,0.75);
		}
	</style>
</head>
<body>
	<div class="container fluid">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12"></div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<form class="form-container" action="" method="post">
					<h1 style="text-align: center;">Set Password</h1>
					   <?php echo $alert; ?>
					  <div class="form-group">
					    <label for="exampleInputEmail1"><strong>Reset Password :</strong></label>
					    <input type="password" class="form-control" id="exampleInputEmail1" name="pass" aria-describedby="emailHelp" placeholder="Enter Password">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail1"><strong>Confirm Password :</strong></label>
					    <input type="password" class="form-control" id="exampleInputEmail1" name="cpass" aria-describedby="emailHelp" placeholder="Re-Enter Password">
					  </div>
					  <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>