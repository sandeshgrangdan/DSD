 <?php 
 include '../../includes/db.php';
 $msg = "";
 if (isset($_POST["submit"])) {
 	$name = $conn->real_escape_string($_POST["name"]);
 	$email = $conn->real_escape_string($_POST["email"]);
 	$password = $conn->real_escape_string($_POST["password"]);
 	$cpassword = $conn->real_escape_string($_POST["cpassword"]);

 	if( $name == "" || $email == "" || $password != $cpassword )
 		$msg = "Please check your input ";
 	else{
 		$sql =  $conn->query("SELECT user_id FROM user WHERE user_email='$email'");
 		if ($sql->num_rows > 0) {
 			$msg = "Email  Already Existed";
 		}else{
 			$token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789!@$%^&*()-=';
 			$token = str_shuffle($token);

 			$hp = password_hash($password, PASSWORD_BCRYPT);

 			$conn->query( "INSERT INTO user (user_f_name,user_email,user_password,token) VALUES('$name','$email','$hp','$token')");

 			    $mailto = $email;
			    $mailSub = "Verify your account";
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
								This is email verification for Dherai Sasto Deal!
							</div>
							<div class='email-container' style='max-width: 500px;background: white;font-family: sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px;text-align: center;'>
								<h1>Please Verify You Email To Register!</h1>
							</div>
							<br>
							<img src='https://i.postimg.cc/9FGBbr4h/DSD.png' style='max-width: 200px;border-radius: 50%;display: block;margin-left: auto;margin-right: auto;'>
							<p style='margin: 20px;font-size: 18px;font-weight: 300;line-height: 1.5;color: #666666;text-align: center;'>Dherai Sasto Deal(DSD) want you to confirm the email for registration for your security features,
							Thank You!</p>
							<div class='cat' style='margin: 20px;text-align: center;'>
								<a href='http://localhost/Phpweb/protype/emailverification/verify.php?email=$email&token=$token' style='text-decoration: none;display: inline-block;background: #3d87f5;padding: 10px 20px 10px;color: white;border-radius: 5px;text-align: center;'>Verify Password!</a>
							</div>
							<div class='footer-junk' style='text-align: center;'>
								Visit Our Page <a href='http://localhost/Phpweb/protype/index.php'>Dherai Sasto Deal</a>
							</div>
						</div>
					</body>

			   ";
			   // $mail ->AltBody = "";
			   $mail ->AddAddress($mailto);

			   if(!$mail->Send())
			   {
			   
			       echo '<style type="text/css">
			    div.messages{
			      background-color: #ff6b6b;
			      color: #f7fff7;
			      font-size: 20px;
			    }
			    ul.messages{
			      list-style-type: none;
			    }
			  </style>

			    <div class="messages">

			    <ul class="messages">
			      <li style="text-align: center;">Please Insert Valid Email!</li>
			    </ul>

			    </div>';
			   }
			   else
			   {
			   	$conn->query( "INSERT INTO user (user_f_name,user_email,user_password,token) VALUES('$name','$email','$hp','$token')");
			       echo '<style type="text/css">
			    div.messages{
			      background-color: #ff6b6b;
			      color: #f7fff7;
			      font-size: 20px;
			    }
			    ul.messages{
			      list-style-type: none;
			    }
			  </style>

			    <div class="messages">

			    <ul class="messages">
			      <li style="text-align: center;">You have been registed! Please verify your email</li>
			    </ul>

			    </div>';
			   }
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
				
				<form method="post" action="register.php">
					<input class="form-control" type="" name="name" placeholder="Names......."><br>
					<input class="form-control" type="email" name="email" placeholder="Email...."><br>
					<input class="form-control" type="password" name="password" placeholder="Password....."><br>
					<input class="form-control" type="password" name="cpassword" placeholder="Confirm Password ....."><br>
					<input class="btn btn-danger" type="submit" name="submit" value="Register"> 
				</form>
			</div>
		</div>
	</div>



</body>
</html>