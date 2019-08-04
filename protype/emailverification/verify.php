<!DOCTYPE html>
<html>
<head>
	<title>Verify</title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php 
				session_start();
				    include '../includes/db.php';
					function Redirect(){
						header('Location: register.php');
						exit();
					}
					if (!isset($_GET['email']) || !isset($_GET['token'])) {
						Redirect();
					}else{

						$email = $conn->real_escape_string($_GET["email"]);
						$token = $conn->real_escape_string($_GET["token"]);
						$test  = substr($token, 0 ,10);
						echo $email;
						echo "<br>";
						echo $test;
						echo "<br>";

						$sql = $conn-> query("SELECT user_id,user_f_name,user_l_name,user_email,user_gender FROM user WHERE user_email = '$email' AND Confirmed=0 AND token = '$test' ");

						if ($sql->num_rows > 0) {
							$conn -> query("UPDATE user SET Confirmed = 1 ,token = '' WHERE user_email = '$email' ");

							$data = $sql -> fetch_array();

							$_SESSION['email'] = $data['user_email'];
				      		$_SESSION['role'] = "subscriber";
				      		$_SESSION['givenName'] = $data['user_f_name'];
				      		$_SESSION['familyName'] = $data['user_l_name'];
				      		$_SESSION['gender'] = $data['user_gender'];

							echo '
									<div class="jumbotron">
										  <h1 class="display-4">Your email has been verified!</h1>
										  <p class="lead">Dherai Sasto Deal(DSD) wants to thanks for registring your account </p>
										  <hr class="my-4">
										  <p>Now you can order whant you want</p>
										  <a class="btn btn-primary btn-lg" href="index.php" role="button">Shop Now</a>
									</div>
							';
						}else{
							echo '
									<div class="jumbotron">
										  <h1 class="display-4">Please Verify Your Email!</h1>
										  <p class="lead">Dherai Sasto Deal(DSD) Send Email for Verification </p>
										  <hr class="my-4">
										  <a class="btn btn-primary btn-lg" href="https://mail.google.com/mail/u/0/#inbox" role="button">Verify Email</a>
									</div>
							';
						}
					}
				?>
			</div>		
		</div>
	</div>
	

</body>
</html>