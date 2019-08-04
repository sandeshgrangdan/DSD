<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php session_start();
require_once "config.php";
$loginURL = $gClient->createAuthUrl();
include 'include/session.php';
include '../includes/db.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Dherai Sasto Deal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Dherai Sasto Deal" />
	<script>
		addEventListener("load", function () {
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
	<link href="css/contact.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
</head>

<body>
	<b>
	<div class="banner-top container-fluid" id="home">
		<!-- header -->
        <?php include 'include/header.php'; 
        	  include '../includes/mail.php';
        ?>

		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.php">Home</a>
							<i>|</i>
						</li>
						<li>Single Page</li>
					</ul>
				</div>
			</div>

		</div>
		
	</div>
	<!--// header_top -->
	<!-- top Products -->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<h3 class="tittle-w3layouts text-center my-lg-4 my-4">Contact</h3>
			<div class="inner_sec">
				<p class="sub text-center mb-lg-5 mb-3">We love to discuss your idea</p>
				<div class="address row">

					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="far fa-map"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Address</h6>
								<p> Kathmandu, Nepal

								</p>
							</div>
						</div>

					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="far fa-envelope"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Email</h6>
								<p>Email :
									<a href="mailto:dheraisastodeal@gmail.com"> dheraisastodeal@gmail.com</a>

								</p>
							</div>

						</div>
					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-3 address-left text-center">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<div class="col-md-9 address-right text-left">
								<h6>Phone</h6>
								<p>+977 9866558715</p>

							</div>

						</div>
					</div>
				</div>
				<div class="contact_grid_right">
					<form action="contact.php" method="post">
						<div class="row contact_left_grid">
						<div class="col-md-12 con-right">
								<div class="form-group">
									<label>Message</label>
									<textarea id="textarea" name="editor1" placeholder="Please Enter Your Feed Back" required=""></textarea>
								</div>
								<input class="form-control" type="submit" name="mail" value="Submit">

							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</section>
	<div class="contact-map">

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.9320005629597!2d85.33935231459154!3d27.688496482799664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1991388fadf1%3A0xb9466756a12f03b0!2z4KS44KSr4KWN4KSf4KSo4KWH4KSqIOCkquCljeCksOCkvi4g4KSy4KS_Lg!5e0!3m2!1sne!2snp!4v1557299196335!5m2!1sne!2snp" width="100%" height="100%" frameborder="0" style="border:0px; border-radius: 10px;" allowfullscreen></iframe>
	</div>

	<!--footer -->
	<?php include'include/footer.php';?>
	<script src="../../alert/dist/sweetalert2.min.js"></script>
	<!-- //footer -->

	<!--jQuery-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- newsletter modal -->
	<!--search jQuery-->
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
    <!--// end-smoth-scrolling -->


	<script src="js/bootstrap.js"></script>
	<!-- js file -->
</body>
<html