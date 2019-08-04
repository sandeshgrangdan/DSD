 <?php 
 include '../../includes/db.php';
 $msg = "";
 if (isset($_POST["submit"])) {
 	$email = $conn->real_escape_string($_POST["email"]);
 	$password = $conn->real_escape_string($_POST["password"]);

 
 	

 	if( $email == "" || $password == "" )
 		$msg = "Please check your input ss";
 	else{
 		$sql =  $conn->query("SELECT user_id,user_password,user_email,Confirmed FROM user WHERE user_email='$email' ");
 		if ($sql->num_rows > 0) {
 			$data = $sql -> fetch_array();
 			if (password_verify($password, $data['user_password'])) {
 				if( $data["Confirmed"] == 0 ) {
 					$msg = "Please Verify Your Email!";
 				}else{
 					echo "<h1>Success</h1>";
 				}
 			}else{
 				$msg = "Please Check Your Input ff";
 			}
 		}else{
 			$msg = "PLease Verify Your Password";
 		}

 	}
 	
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="../../../bootstrap/assets/css/docs.css" rel="stylesheet" >
            
	 
	 
	     <title>Dherai Sasto Deal</title>

		 <link rel="stylesheet" href="../../../bootstrap/dist/css/bootstrap.min.css">
		 <link rel="stylesheet" href="../../../font-awesome/css/font-awesome.min.css">
		 <link rel="stylesheet" href="../../../bootstrap-social/bootstrap-social.css">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">
				<?php echo $msg; ?>
				
				<form method="post" action="login.php">
					
					<input class="form-control" type="email" name="email" placeholder="Email...."><br>
					<input class="form-control" type="password" name="password" placeholder="Password....."><br>
					
					<input class="btn btn-danger" type="submit" name="submit" value="Register"> 
				</form>
			</div>
		</div>
	</div>



</body>
</html>