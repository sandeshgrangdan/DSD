<?php 
    session_start();
	include '../includes/db.php';
	$alert = '';
	if(isset($_POST["submit"])){
		$email = $conn->real_escape_string($_POST["email"]);
		$token = '123456789ABCD';
 		$token = str_shuffle($token);
 		$token = substr($token, 0,6);

 		$sql = $conn-> query("SELECT user_id FROM user WHERE user_email = '$email' ");

 		if ($sql->num_rows > 0) {

 			$conn -> query("UPDATE user SET reset = '$token' WHERE user_email = '$email' ");
 				$mailto = $email;
			    $mailSub = "Verification Code";
			    $mailMsg = $token;
			   require '../PHPMailer/PHPMailerAutoload.php';
			   $mail = new PHPMailer();
			   $mail ->IsSmtp();
			   $mail ->SMTPDebug = 0;
			   $mail ->SMTPAuth = true;
			   $mail ->SMTPSecure = 'ssl';
			   $mail ->Host = "smtp.gmail.com";//smtp.gmail.com
			   $mail ->Port = 465; // or  465
			   $mail ->IsHTML(true);
			   $mail ->Username = "dheraisastodeal@gmail.com";
   				$mail ->Password = "dheraisastodeal123";
   				$mail ->SetFrom("dheraisastodeal@gmail.com");
			  // $mail ->addAttachment('walpaper/concert.jpg');
			   $mail ->Subject = $mailSub;
			    $mail ->Body = "
			   			<body>
						<div class='email-background' style='background: #eeeeee;padding: 10px;'>
							<div class='pre-header' style='max-width: 500px;background: #eeeeee;font-family: sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px;text-align: center;color: #eeeeee;font-size: 5px;'>
								This is verification code for acount of Dherai Sasto Deal(DSD)!
							</div>
							<div class='email-container' style='max-width: 500px;background: white;font-family: sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px;text-align: center;'>
								<h1>Verification Code</h1>
							</div>
							<br>
							<img src='https://i.postimg.cc/9FGBbr4h/DSD.png' style='max-width: 200px;border-radius: 50%;display: block;margin-left: auto;margin-right: auto;'>
							<p style='margin: 20px;font-size: 18px;font-weight: 300;line-height: 1.5;color: #666666;text-align: center;'>Your Verification code is <strong>$token</strong>, enter your verification code to reset password ,Thank You!</p>
							<div class='footer-junk' style='text-align: center;'>
								Visit Our Page <a href='http://localhost/Phpweb/protype/index.php'>Dherai Sasto Deal</a>
							</div>
						</div>
					</body>

			   ";
			   $mail ->AddAddress($mailto);
			   if(!$mail->Send()){
			   		echo 'not';
			   }else{
			   	$_SESSION["vemail"] = $email;
			   	header( 'Location: confirm.php');
			   	exit();
			   }

 		}else{
 			$alert = '<div class="alert alert-danger" role="alert">
				       Please enter a valid email address!
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
					<h1 style="text-align: center;">Forget Password</h1>
					   <?php echo $alert; ?>
					  <div class="form-group">
					    <label for="exampleInputEmail1"><strong>Email address :</strong></label>
					    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
					    <small id="emailHelp" class="form-text text-muted"><strong>Please Enetr your Email Address</strong></small>
					  </div>
					  <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
					  <hr>
					  <a href="../index.php" class="btn btn-danger btn-block">Return Home</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>