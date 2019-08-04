<?php 
	session_start();
	include '../includes/db.php';
	$alert = '';
	if(isset($_POST["submit"])){
		$code = $conn->real_escape_string($_POST["code"]);

 		$sql = $conn-> query("SELECT user_id FROM user WHERE reset = '$code' AND user_email = '$_SESSION[vemail]' ");

 		if ($sql->num_rows > 0) {

 			$conn -> query("UPDATE user SET reset = '' WHERE user_email = '$_SESSION[vemail]' ");
 			header('Location: reset.php');
 			exit();
 				

 		}else{
 			$alert = '<div class="alert alert-danger" role="alert">
				       Verification code in incorrect
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
					<h1 style="text-align: center;">Verification Code</h1>
					   <?php echo $alert; ?>
					  <div class="form-group">
					    <label for="exampleInputEmail1"><strong>Verification Code :</strong></label>
					    <input type="text" class="form-control" id="exampleInputEmail1" name="code" aria-describedby="emailHelp" placeholder="Enter Verification Code">
					    <small id="emailHelp" class="form-text text-muted"><strong>Please enetr your verification code that we send to your email</strong></small>
					  </div>
					  <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>