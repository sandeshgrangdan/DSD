<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php session_start();
require_once "config.php";
require_once "gconfig.php";
$loginURL = $gClient->createAuthUrl();
$gloginURL = $ggClient->createAuthUrl();
include 'include/session.php';
include '../includes/db.php';
if(isset($_POST['form'])){
		 $date = date('Y-m-d h:i:s'); 
		 $fname = $conn->real_escape_string($_POST["first"]);
		 $lname = $conn->real_escape_string($_POST["last"]);
	 	$email = $conn->real_escape_string($_POST["email"]);
	 	$password = $conn->real_escape_string($_POST["password"]);
	 	$gender = $conn->real_escape_string($_POST["gender"]);
	 	$phone = $conn->real_escape_string($_POST["phone_no"]);

	 	$sql =  $conn->query("SELECT user_id FROM user WHERE user_email='$email'");
	 	$sql1 =  $conn->query("SELECT user_id FROM user WHERE user_phone_no ='$phone'");
	 	if ($sql->num_rows > 0) {
 			echo '<script>alert("Email is already existed");</script>';
 		}elseif ($sql1->num_rows > 0) {
 			echo '<script>alert("Phone Number Is Already Existed");</script>';
 		}else{
 			$token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789';
 			$token = str_shuffle($token);

 			$hp = password_hash($password, PASSWORD_BCRYPT);

 			

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
								<a href='http://localhost/Phpweb/protype/verify.php?email=$email&token=$token' style='text-decoration: none;display: inline-block;background: #3d87f5;padding: 15px 25px 15px;color: white;border-radius: 50px;text-align: center;
								    -webkit-box-shadow: 15px 10px 35px 10px rgba(0,0,0,1);
									-moz-box-shadow: 15px 10px 35px 10px rgba(0,0,0,1);
									box-shadow: 15px 10px 35px 10px rgba(0,0,0,1);'>Verify Password!</a>
																</div>
																<div class='footer-junk' style='text-align: center;'>
																<small>© 2019 Dhera Sasto Deal., All Rights Reserved.<br>
									New Baneshwor, Kathmandu Nepal, NP +(977)<br>
									Thanks for having with us.</small>
									<br>
							
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
				   	$conn->query( "INSERT INTO user (role, user_f_name,user_l_name,user_email,user_password,user_gender,user_phone_no,token,user_date) VALUES('subscriber','$fname','$lname','$email','$hp','$gender','$phone','$token','$date')");
				       
				       header('Location: verify.php');
						exit();
			   }
 		}
		 // $ins_sql= "INSERT INTO user (role, user_f_name,user_l_name,user_email,user_password,user_gender,user_phone_no,user_date) 
		 // VALUES ('subscriber','$_POST[first]','$_POST[last]','$_POST[email]','$_POST[password]','$_POST[gender]','$_POST[phone_no]','$date')";
		 //      if(mysqli_query($conn, $ins_sql)){
		 //      	    $_SESSION['email'] = $_POST['email'];
		 //      		$_SESSION['role'] = "subscriber";
		 //      		$_SESSION['givenName'] = $_POST['first'];
		 //      		$_SESSION['familyName'] = $_POST['last'];
		 //      		$_SESSION['gender'] = $_POST['gender'];
		 //      		include 'include/user.php';
		 //      		// echo '<script>alert("User Created Sucessfully")</script>';
		 //      		// echo '<script>window.location="index.php"</script>';
		 //      }
		 //      else 
		 //      	include 'include/nouser.php';
		     
}
include 'include/cart.php';
if(isset($_GET['login_error'])){
	 include 'include/message.php';
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Dherai Sasto Deal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Dherai Sasto Deal" />
	<meta property="og:locale" content="ne_NP" />
	<meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Your Website Title" />
  <meta property="og:description"   content="Your description" />
  <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
	<script>
		addEventListener("load" , function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link rel="stylesheet" type="text/css" href="../../alert/dist/sweetalert2.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
	<link href="css/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/shop.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
</head>
<?php if(!isset($_SESSION['gid'])) { ?>
	 <!-- <body onload = "window.location = '<?php echo $gloginURL ?>'"> -->
	 <body>
 <?php }else { ?>
 	 <body>
 <?php } ?>

	<b>
	<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<?php include 'include/header.php';?>
		<!-- //header -->
		<!-- banner -->
		<div class="banner">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<div class="carousel-caption text-center">
							<h3>Nepali Guitar
								<span>Made In Nepal</span>
							</h3>
							<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
						</div>
					</div>
					<div class="carousel-item item2">
						<div class="carousel-caption text-center">
							<h3>Women’s eyewear
								<span>Want to Look Your Best?</span>
							</h3>
							<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

						</div>
					</div>
					<div class="carousel-item item3">
						<div class="carousel-caption text-center">
							<h3>Men’s eyewear
								<span>Cool summer sale 50% off</span>
							</h3>
							<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

						</div>
					</div>
					<div class="carousel-item item4">
						<div class="carousel-caption text-center">
							<h3>Women’s eyewear
								<span>Want to Look Your Best?</span>
							</h3>
							<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!--//banner -->
		</div>
	</div>
	<!--//banner-sec-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 my-4">New Nepali Product Arrivals for you </h3>
				<div class="row">
					<!-- /womens -->
					<?php
						$sel_side="SELECT id,c_id,name,image,price,display FROM tbl_product WHERE display = 'on' ORDER BY id DESC LIMIT 8";
						$run_side=mysqli_query($conn,$sel_side);
						while($rows=mysqli_fetch_assoc($run_side)){ 
							echo '
								<div class="col-md-3 product-men women_two">
						<div class="product-googles-info googles">
							<div class="men-pro-item">
								<div class="men-thumb-item">
									<img src="../images/'.$rows['image'].'" class="img-fluid" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single.php?id='.$rows['id'].'&c_id='.$rows['c_id'].'" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
									<span class="product-new-top">New</span>
								</div>
								<div class="item-info-product">
									<div class="info-product-price">
										<div class="grid_meta">
											<div class="product_price">
												<h4>
													<a href="single.php?id='.$rows['id'].'&c_id='.$rows['c_id'].'">'.ucfirst($rows['name']).'</a>
												</h4>
												<div class="grid-price mt-2">
													<span class="money ">$'.$rows['price'].'</span>
												</div>
											</div>
											<ul class="stars">
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="fa fa-star-half-o" aria-hidden="true"></i>
													</a>
												</li>
											</ul>
										</div>
										
											<form method="post" action="index.php?action=add&id='.$rows["id"].'" onsubmit="return pop()">
															

																<input type="hidden" name="quantity" value="1" class="form-control" />

																<input type="hidden" name="hidden_name" value="'.$rows["name"].'" />

																<input type="hidden" name="hidden_price" value="'.$rows["price"].'" /> 
																<input type="hidden" name="hidden_image" value="'.$rows["image"].'" /> 

																<button type="submit" name="add_to_cart" class="googles-cart pgoogles-cart">
																	<i class="fas fa-cart-plus"></i>
																</button>

														</form>

										
									</div>
									<div class="clearfix"></div>
								</div>

							</div>
						</div>
					</div>
														
								';
						}
					?>
					<!-- /mens -->
				</div>
				<!--//row-->
				<!--/meddle-->
				<!-- <div class="row">
					<div class="col-md-12 middle-slider my-4">
						<div class="middle-text-info ">

							<h3 class="tittle-w3layouts two text-center my-lg-4 mt-3">Summer Flash sale</h3>
							<div class="simply-countdown-custom" id="simply-countdown-custom"></div>

						</div>
					</div>
				</div> -->
				<!--//meddle-->
				<!--/slide-->
				<div class="slider-img mid-sec">
					<!--//banner-sec-->
					<div class="mid-slider">
						<div class="owl-carousel owl-theme row">
							<?php
								$sel_side="SELECT id,c_id,name,image,price,display FROM tbl_product WHERE display = 'on' ORDER BY id DESC LIMIT 8 ";
								$run_side=mysqli_query($conn,$sel_side);
								while($rows=mysqli_fetch_assoc($run_side)){ 
									echo '<div class="item">
								<div class="gd-box-info text-center">
									<div class="product-men women_two bot-gd">
										<div class="product-googles-info slide-img googles">
											<div class="men-pro-item">
												<div class="men-thumb-item">
													<img src="../images/'.$rows['image'].'" class="img-fluid" alt="">
													<div class="men-cart-pro">
														<div class="inner-men-cart-pro">
															<a href="single.php?id='.$rows['id'].'&c_id='.$rows['c_id'].'" class="link-product-add-cart">Quick View</a>
														</div>
													</div>
													<span class="product-new-top">New</span>
												</div>
												<div class="item-info-product">

													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a href="single.php?id='.$rows['id'].'&c_id='.$rows['c_id'].'">'.$rows['name'].' </a>
																</h4>
																<div class="grid-price mt-2">
																	<span class="money ">'.$rows['price'].'</span>
																</div>
															</div>
															<ul class="stars">
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-half-o" aria-hidden="true"></i>
																	</a>
																</li>
																<li>
																	<a href="#">
																		<i class="fa fa-star-o" aria-hidden="true"></i>
																	</a>
																</li>
															</ul>
														</div>
														<form method="post" action="index.php?action=add&id='.$rows["id"].'" onsubmit="return pop()">
															

																<input type="hidden" name="quantity" value="1" class="form-control" />

																<input type="hidden" name="hidden_name" value="'.$rows["name"].'" />

																<input type="hidden" name="hidden_price" value="'.$rows["price"].'" /> 
																<input type="hidden" name="hidden_image" value="'.$rows["image"].'" /> 

																<button type="submit" name="add_to_cart" class="googles-cart pgoogles-cart">
																	<i class="fas fa-cart-plus"></i>
																</button>

														</form>

													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>'; 
						}

							?>

						</div>
					</div>
				</div>
				<!-- /testimonials -->
				<!-- <div class="testimonials py-lg-4 py-3 mt-4">
					<div class="testimonials-inner py-lg-4 py-3">
						<h3 class="tittle-w3layouts text-center my-lg-4 my-4">Tesimonials</h3>
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<div class="carousel-item active">
									<div class="testimonials_grid text-center">
										<h3>Anamaria
											<span>Customer</span>
										</h3>
										<label>United States</label>
										<p>Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem, ac scelerisque nisl nibh vel lacus.
											Proin eget gravida odio. Donec ullamcorper est eu accumsan cursus.</p>
									</div>
								</div>
								<div class="carousel-item">
									<div class="testimonials_grid text-center">
										<h3>Esmeralda
											<span>Customer</span>
										</h3>
										<label>United States</label>
										<p>Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem, ac scelerisque nisl nibh vel lacus.
											Proin eget gravida odio. Donec ullamcorper est eu accumsan cursus.</p>
									</div>
								</div>
								<div class="carousel-item">
									<div class="testimonials_grid text-center">
										<h3>Gretchen
											<span>Customer</span>
										</h3>
										<label>United States</label>
										<p>Maecenas interdum, metus vitae tincidunt porttitor, magna quam egestas sem, ac scelerisque nisl nibh vel lacus.
											Proin eget gravida odio. Donec ullamcorper est eu accumsan cursus.</p>
									</div>
								</div>
								<a class="carousel-control-prev test" href="#carouselExampleControls" role="button" data-slide="prev">
									<span class="fas fa-long-arrow-alt-left"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next test" href="#carouselExampleControls" role="button" data-slide="next">
									<span class="fas fa-long-arrow-alt-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>

								</a>
							</div>
						</div>
					</div>
				</div> -->
				<!-- //testimonials -->
				<!-- <div class="row galsses-grids pt-lg-5 pt-3">
					<div class="col-lg-6 galsses-grid-left">
						<figure class="effect-lexi">
							<img src="images/banner4.jpg" alt="" class="img-fluid">
							<figcaption>
								<h3>Editor's
									<span>Pick</span>
								</h3>
								<p> Express your style now.</p>
							</figcaption>
						</figure>
					</div>
					<div class="col-lg-6 galsses-grid-left">
						<figure class="effect-lexi">
							<img src="images/banner1.jpg" alt="" class="img-fluid">
							<figcaption>
								<h3>Editor's
									<span>Pick</span>
								</h3>
								<p>Express your style now.</p>
							</figcaption>
						</figure>
					</div>
				</div> -->
				<!-- /grids -->
				<div class="bottom-sub-grid-content py-lg-5 py-3">
					<div class="row">
						<div class="col-lg-4 bottom-sub-grid text-center">
							<div class="bt-icon">

								<span class="far fa-hand-paper"></span>
							</div>

							<h4 class="sub-tittle-w3layouts my-lg-4 my-3">Satisfaction Guaranteed</h4>
							<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
							<p>
								<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
							</p>
						</div>
						<!-- /.col-lg-4 -->
						<div class="col-lg-4 bottom-sub-grid text-center">
							<div class="bt-icon">
								<span class="fas fa-rocket"></span>
							</div>

							<h4 class="sub-tittle-w3layouts my-lg-4 my-3">Fast Shipping</h4>
							<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
							<p>
								<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
							</p>
						</div>
						<!-- /.col-lg-4 -->
						<div class="col-lg-4 bottom-sub-grid text-center">
							<div class="bt-icon">
								<span class="far fa-map"></span>
							</div>

							<h4 class="sub-tittle-w3layouts my-lg-4 my-3">Use Map</h4>
							<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
							<p>
								<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
							</p>
						</div>
						<!-- /.col-lg-4 -->
					</div>
				</div>
				<!-- //grids -->
				<!-- /clients-sec -->
				<div class="testimonials p-lg-5 p-3 mt-4">
					<div class="row last-section">
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-gift"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Genuine Product</h3>
								<p>Lorem ipsum dolor sit amet, consectetur</p>
							</div>
						</div>
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-shield-alt"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Secure Products</h3>
								<p>Lorem ipsum dolor sit amet, consectetur</p>
							</div>
						</div>
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-dollar-sign"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Online Payment</h3>
								<p>Lorem ipsum dolor sit amet, consectetur</p>
							</div>
						</div>
						<div class="col-lg-3 footer-top-w3layouts-grid-sec">
							<div class="mail-grid-icon text-center">
								<i class="fas fa-truck"></i>
							</div>
							<div class="mail-grid-text-info">
								<h3>Easy Delivery</h3>
								<p>Lorem ipsum dolor sit amet, consectetur</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //clients-sec -->
			</div>
		</div>
	</section>
	<!-- about -->
	<!--footer -->
	<?php include 'include/footer.php';?>
	<!-- //footer -->

	<!--jQuery-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- newsletter modal -->
	<!-- Modal -->
	<!-- Modal -->
	<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center p-5 mx-auto mw-100">
					<h6>Join our newsletter and get</h6>
					<h3>50% Off for your first Pair of Eye wear</h3>
					<div class="login newsletter">
						<form action="#" method="post">
							<div class="form-group">
								<label class="mb-2">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="" required="">
							</div>
							<button type="submit" class="btn btn-primary submit mb-4">Get 50% Off</button>
						</form>
						<p class="text-center">
							<a href="#">No thanks I want to pay full Price</a>
						</p>
					</div>
				</div>

			</div>
		</div>
	</div> -->
	<script>
		$(document).ready(function () {
			$("#myModal").modal();
		});
	</script>
	<!-- // modal -->

	<!--search jQuery-->
	
	<script src="../../alert/dist/sweetalert2.min.js"></script>
	<script src="js/modernizr-2.6.2.min.js"></script>
	
	<script src="js/classie-search.js"></script>
	<script src="js/demo1-search.js"></script>
	<!--//search jQuery-->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		googles.render();

		googles.cart.on('googles_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>
	<!-- carousel -->
	<!-- Count-down -->
	<script src="js/simplyCountdown.js"></script>
	<link href="css/simplyCountdown.css" rel='stylesheet' type='text/css' />
	<script>
		var d = new Date();
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
	</script>
	<!--// Count-down -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function () {
			$('.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 2,
						nav: false
					},
					900: {
						items: 3,
						nav: false
					},
					1000: {
						items: 4,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		})
	</script>

	<!-- //end-smooth-scrolling -->


	<!-- dropdown nav -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- <script>
		$(document).ready(function(){
			$('#text_search').keyup(function(){
				var txt = $(this).val();
				if (txt != '') {
					$.ajax({
						url:"fetch.php",
						method:"post",
						data:{search:txt},
						dataType:"text",
						success:function(data){
							$('#result').html(data);
						}
					});
				}else{
					$('#result').html('');
				}
			});
		});
	</script> -->
	<script>
		$(document).ready(function(){
			$('#emailHelps').keyup(function(){
				var email = $(this).val();
				if (email != '') {
					$.ajax({
						url:"email.php",
						method:"post",
						data:{valid:email},
						dataType:"text",
						success:function(data){
							$('#alertemail').html(data);
						}
					});
				}else{
					$('#alertemail').html('');
				}
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$('#phone_no').keyup(function(){
				var number = $(this).val();
				if (number != '') {
					$.ajax({
						url:"email.php",
						method:"post",
						data:{num:number},
						dataType:"text",
						success:function(data){
							$('#phone_num').html(data);
						}
					});
				}else{
					$('#phone_num').html('');
				}
			});
		});
	</script>
	<!-- //dropdown nav -->
  <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('php,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->

	<script src="js/bootstrap.js"></script>
	<!-- js file -->
</body>

</html>