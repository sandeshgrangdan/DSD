<?php
	session_start();
require_once "config.php";
$loginURL = $gClient->createAuthUrl();
include 'include/session.php';
include '../includes/db.php';
 $desc = "";
                 
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Payment | Dherai Sasto Deal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
	<link href="css/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/shop.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/checkout.css">
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
</head>

<body>
	<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<?php include'include/header.php';?>
    </div>
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.html">Home</a>
							<i>|</i>
						</li>
						<li>Payment </li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
		<!--// header_top -->
		<!--Payment-->
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container">
				<div class="inner-sec-shop px-lg-4 px-3">
					<h3 class="tittle-w3layouts my-lg-4 mt-3">Payment </h3>
					<!--/tabs-->
					<div class="responsive_tabs">
						<div id="horizontalTab">
							<ul class="resp-tabs-list">
								<li>Cash on delivery (COD)</li>
								<li>Credit/Debit</li>
								<li>Net Banking</li>
								<li>Paypal Account</li>
							</ul>
							<div class="resp-tabs-container">
								<!--/tab_one-->
								<div class="tab1">
									<div class="pay_info">
										<div class="vertical_post check_box_agile">
											<h5>COD, We don't have this policy</h5>
											<div class="checkbox">
												<div class="check_box_one cashon_delivery">
													<label class="anim">
														<!-- <input type="checkbox" class="checkbox"> -->
														<span> We also accept Credit/Debit card on delivery. Please Check with the agent.</span>
													</label>
												</div>

											</div>
										</div>
									</div>

								</div>
								<!--//tab_one-->
								<div class="tab2">
									<div class="pay_info">
										<form action="charge.php" method="post" id="payment-form" class="creditly-card-form agileinfo_form">
											<section class="creditly-wrapper wthree, w3_agileits_wrapper">
												<div class="credit-card-wrapper">
													<div class="first-row form-group">
														<h2 style="color: black; text-align: center;"><?php echo "Total Amount : $<small>",number_format($_SESSION["full_price"],3)."</small>"; ?></h2>
														<?php 
															foreach($_SESSION["shopping_cart"] as $keys => $values){
										                              $desc = $desc.','.ucfirst($values['item_name']);
										                              echo '<h2 style="color: black; text-align: center;">Item :
										                            '.ucfirst($values['item_name']).'</h2>';
										                    } 
										                    $_SESSION['description'] = $desc;
                        								?>
														<div class="controls">
															<label class="control-label">Name on Card</label>
															<input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name" value="<?php echo $_SESSION['givenName']." ".$_SESSION["familyName"];?>">
														</div>
														<div class="controls">
															<label class="control-label">Email Address</label>
															<input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address" value="<?php echo $_SESSION['email'];?>">
														</div>
														<div class="controls">
															<label class="control-label">Card Number</label>
															<div id="card-element" class="form-control">
												          <!-- a Stripe Element will be inserted here. -->
												       		 </div>
														</div>
														
														 <div id="card-errors" role="alert"></div>
														<button>Submit Payment</button>
												</div>
											</section>
										

									</div>
								</div>
								<div class="tab3">

									<div class="pay_info">
										<div class="vertical_post">
											<form action="#" method="post">
												<h5>Select From Popular Banks</h5>
												<div class="swit-radio">
													<div class="check_box_one">
														<div class="radio_one">
															<label>
																<input type="radio" name="radio" checked="">
																<i></i>Syndicate Bank</label>
														</div>
													</div>
													<div class="check_box_one">
														<div class="radio_one">
															<label>
																<input type="radio" name="radio">
																<i></i>Bank of Baroda</label>
														</div>
													</div>
													<div class="check_box_one">
														<div class="radio_one">
															<label>
																<input type="radio" name="radio">
																<i></i>Canara Bank</label>
														</div>
													</div>
													<div class="check_box_one">
														<div class="radio_one">
															<label>
																<input type="radio" name="radio">
																<i></i>ICICI Bank</label>
														</div>
													</div>
													<div class="check_box_one">
														<div class="radio_one">
															<label>
																<input type="radio" name="radio">
																<i></i>State Bank Of India</label>
														</div>
													</div>
													<div class="clearfix"></div>
												</div>
												<h5>Or SELECT OTHER BANK</h5>
												<div class="section_room_pay">
													<select class="year">
														<option value="">=== Other Banks ===</option>
														<option value="ALB-NA">Allahabad Bank NetBanking</option>
														<option value="ADB-NA">Andhra Bank</option>
														<option value="BBK-NA">Bank of Bahrain and Kuwait NetBanking</option>
														<option value="BBC-NA">Bank of Baroda Corporate NetBanking</option>
														<option value="BBR-NA">Bank of Baroda Retail NetBanking</option>
														<option value="BOI-NA">Bank of India NetBanking</option>
														<option value="BOM-NA">Bank of Maharashtra NetBanking</option>
														<option value="CSB-NA">Catholic Syrian Bank NetBanking</option>
														<option value="CBI-NA">Central Bank of India</option>
														<option value="CUB-NA">City Union Bank NetBanking</option>
														<option value="CRP-NA">Corporation Bank</option>
														<option value="DBK-NA">Deutsche Bank NetBanking</option>
														<option value="DCB-NA">Development Credit Bank</option>
														<option value="DC2-NA">Development Credit Bank - Corporate</option>
														<option value="DLB-NA">Dhanlaxmi Bank NetBanking</option>
														<option value="FBK-NA">Federal Bank NetBanking</option>
														<option value="IDS-NA">Indusind Bank NetBanking</option>
														<option value="IOB-NA">Indian Overseas Bank</option>
														<option value="ING-NA">ING Vysya Bank (now Kotak)</option>
														<option value="JKB-NA">Jammu and Kashmir NetBanking</option>
														<option value="JSB-NA">Janata Sahakari Bank Limited</option>
														<option value="KBL-NA">Karnataka Bank NetBanking</option>
														<option value="KVB-NA">Karur Vysya Bank NetBanking</option>
														<option value="LVR-NA">Lakshmi Vilas Bank NetBanking</option>
														<option value="OBC-NA">Oriental Bank of Commerce NetBanking</option>
														<option value="CPN-NA">PNB Corporate NetBanking</option>
														<option value="PNB-NA">PNB NetBanking</option>
														<option value="RSD-DIRECT">Rajasthan State Co-operative Bank-Debit Card</option>
														<option value="RBS-NA">RBS (The Royal Bank of Scotland)</option>
														<option value="SWB-NA">Saraswat Bank NetBanking</option>
														<option value="SBJ-NA">SB Bikaner and Jaipur NetBanking</option>
														<option value="SBH-NA">SB Hyderabad NetBanking</option>
														<option value="SBM-NA">SB Mysore NetBanking</option>
														<option value="SBT-NA">SB Travancore NetBanking</option>
														<option value="SVC-NA">Shamrao Vitthal Co-operative Bank</option>
														<option value="SIB-NA">South Indian Bank NetBanking</option>
														<option value="SBP-NA">State Bank of Patiala NetBanking</option>
														<option value="SYD-NA">Syndicate Bank NetBanking</option>
														<option value="TNC-NA">Tamil Nadu State Co-operative Bank NetBanking</option>
														<option value="UCO-NA">UCO Bank NetBanking</option>
														<option value="UBI-NA">Union Bank NetBanking</option>
														<option value="UNI-NA">United Bank of India NetBanking</option>
														<option value="VJB-NA">Vijaya Bank NetBanking</option>
													</select>
												</div>
												<input type="submit" value="PAY NOW">
											</form>
										</div>
									</div>
								</div>
								<div class="tab4">
									<div class="pay_info row">
										<div class="col-md-6 tab-grid">
											<img class="pp-img" src="images/paypal.png" alt="Image Alternative text" title="Image Title">
											<p>Important: You will be redirected to PayPal's website to securely complete your payment.</p>
											<a class="btn btn-primary">Checkout via Paypal</a>
										</div>
										<div class="col-md-6">
										<form action="#" method="post" class="cc-form">
												<div class="clearfix">
													<div class="form-group form-group-cc-number">
														<label>Card Number</label>
														<input class="form-control" placeholder="xxxx xxxx xxxx xxxx" type="text">
														<span class="cc-card-icon"></span>
													</div>
													<div class="form-group form-group-cc-cvc">
														<label>CVV</label>
														<input class="form-control" placeholder="xxxx" type="text">
													</div>
												</div>
												<div class="clearfix">
													<div class="form-group form-group-cc-name">
														<label>Card Holder Name</label>
														<input class="form-control" type="text">
													</div>
													<div class="form-group form-group-cc-date">
														<label>Valid Thru</label>
														<input class="form-control" placeholder="mm/yy" type="text">
													</div>
												</div>
												<div class="checkbox checkbox-small mt-4">
													<label>
														<input class="i-check" type="checkbox" checked="">Add to My Cards</label>
												</div>
												<input class="btn btn-primary submit mt-4" type="submit" value="Proceed Payment">
											</form>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--//tabs-->
				</div>

			</div>
			<!-- //payment -->
		</section>
		<!--//Payment-->
		<!--footer -->
		<?php include'include/footer.php';?>
		<script src="../js/validation.js"></script>
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
		  <script src="https://js.stripe.com/v3/"></script>
  		  <script src="js/charge.js"></script>
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
		<!-- easy-responsive-tabs -->
		<script src="js/easy-responsive-tabs.js"></script>
		<script>
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true, // 100% fit in a container
					closed: 'accordion', // Start closed if in accordion view
					activate: function (event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#tabInfo');
						var $name = $('span', $info);
						$name.text($tab.text());
						$info.show();
					}
				});
				$('#verticalTab').easyResponsiveTabs({
					type: 'vertical',
					width: 'auto',
					fit: true
				});
			});
		</script>

		<!-- credit-card -->
		<script type="text/javascript" src="js/creditly.js"></script>
		<link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />

		<script type="text/javascript">
			$(function () {
				var creditly = Creditly.initialize(
					'.creditly-wrapper .expiration-month-and-year',
					'.creditly-wrapper .credit-card-number',
					'.creditly-wrapper .security-code',
					'.creditly-wrapper .card-type');

				$(".creditly-card-form .submit").click(function (e) {
					e.preventDefault();
					var output = creditly.validate();
					if (output) {
						// Your validated credit card output
						console.log(output);
					}
				});
			});
		</script>
		<!-- //credit-card -->
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
                $('html,body').animate({
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
		<!-- //smooth-scrolling-of-move-up -->
		<script src="js/bootstrap.js"></script>
		<!-- js file -->
</body>

</html>