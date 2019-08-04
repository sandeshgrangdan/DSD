<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
require_once "config.php";
$loginURL = $gClient->createAuthUrl();
include 'include/session.php';
include '../includes/db.php'; 
include 'include/cart.php';
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Dherai Sasto Deal</title>
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
	<link rel="stylesheet" type="text/css" href="../../alert/dist/sweetalert2.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
	<link href="css/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/shop.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
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
        <?php include 'include/header.php'; ?>
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
		<!--//banner -->
		<!--/shop-->
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container">
				<div class="inner-sec-shop pt-lg-4 pt-3">
					<div class="row">
							<div class="col-lg-4 single-right-left ">
									<div class="grid images_3_of_2">
										<div class="flexslider1">
					
											<ul class="slides">
												<?php
												$sel_side="SELECT image FROM tbl_product WHERE id = '$_GET[id]' ";
												$run_side=mysqli_query($conn,$sel_side);
												while($rows=mysqli_fetch_assoc($run_side)){ 
													echo '
														<li data-thumb="../images/'.$rows['image'].'">
															<div class="thumb-image"> <img src="../images/'.$rows['image'].'" data-imagezoom="true" class="img-fluid" alt=" "> </div>
														</li>
														<li data-thumb="../images/'.$rows['image'].'">
															<div class="thumb-image"> <img src="../images/'.$rows['image'].'" data-imagezoom="true" class="img-fluid" alt=" "> </div>
														</li>
														<li data-thumb="../images/'.$rows['image'].'">
															<div class="thumb-image"> <img src="../images/'.$rows['image'].'" data-imagezoom="true" class="img-fluid" alt=" "> </div>
														</li>
													'; 
												}
												?>
												<!-- <li data-thumb="images/d2.jpg">
													<div class="thumb-image"> <img src="images/d2.jpg" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li>
												<li data-thumb="images/d1.jpg">
													<div class="thumb-image"> <img src="images/d1.jpg" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li>
					get google acount from browser in website							<li data-thumb="images/d3.jpg">
													<div class="thumb-image"> <img src="images/d3.jpg" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li> -->
											</ul>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-8 single-right-left simpleCart_shelfItem">
									<?php
												$sel_side="SELECT id,name,price,image FROM tbl_product WHERE id = '$_GET[id]' ";
												$run_side=mysqli_query($conn,$sel_side);
												while($rows=mysqli_fetch_assoc($run_side)){ 
													echo '
									<h3>'.ucfirst($rows['name']).'</h3>
									<p><span class="item_price">$'.number_format($rows['price'],3).'</span>
										<del>$'.number_format($rows['price']+5.00,3).'</del>
									</p>
									<div class="rating1">
										<ul class="stars">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="description">
										<h5>Check delivery, payment options and charges at your location</h5>
										<form action="#" method="post">
												<input class="form-control" type="text" name="Email" placeholder="Please enter..." required="">
											<input type="submit" value="Check">
										</form>
									</div>
									<div class="occasional">
										<h5>Types :</h5>
										<div class="colr ert">
											<label class="radio"><input type="radio" name="radio" checked=""><i></i> '.ucfirst($rows['name']).'(Black)</label>
										</div>
										<div class="colr">
											<label class="radio"><input type="radio" name="radio"><i></i> '.ucfirst($rows['name']).'(Grey)</label>
										</div>
										<div class="colr">
											<label class="radio"><input type="radio" name="radio"><i></i> '.ucfirst($rows['name']).'(white)</label>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="occasion-cart">
											<div class="googles single-item singlepage">
											<form method="post" action="index.php?action=add&id='.$rows["id"].'" onsubmit="return pop()">
															

																<input type="number" name="quantity" value="1" class="form-control" />

																<input type="hidden" name="hidden_name" value="'.$rows["name"].'" />

																<input type="hidden" name="hidden_price" value="'.$rows["price"].'" /> 
																<input type="hidden" name="hidden_image" value="'.$rows["image"].'" /> 
																<button type="submit" class="googles-cart pgoogles-cart" name="add_to_cart" >
																	Add to Cart
																</button>
																

														</form>
													<form action="#" method="post">
														<input type="hidden" name="cmd" value="_cart">
														<input type="hidden" name="add" value="1">
														<input type="hidden" name="googles_item" value="Farenheit">
														<input type="hidden" name="amount" value="575.00">
														
														
													</form>
		
												</div>
									</div>';
								}
							?>
									<ul class="footer-social text-left mt-lg-4 mt-3">
											<li>Share On : </li>
											<li class="mx-2">
												<a href="#">
													<span class="fab fa-facebook-f"></span>
												</a>
											</li>
											<li class="mx-2">
												<a href="#">
													<span class="fab fa-twitter"></span>
												</a>
											</li>
											<li class="mx-2">
												<a href="#">
													<span class="fab fa-google-plus-g"></span>
												</a>
											</li>
											<li class="mx-2">
												<a href="#">
													<span class="fab fa-linkedin-in"></span>
												</a>
											</li>
											<li class="mx-2">
												<a href="#">
													<span class="fas fa-rss"></span>
												</a>
											</li>
											
										</ul>
										
									
			
								</div>
								<div class="clearfix"> </div>
								

								<!--/tabs-->
								
								<div class="responsive_tabs">
									<div id="horizontalTab">
										<ul class="resp-tabs-list">
											<li>Description</li>
											<li>Reviews</li>
											<li>Information</li>
										</ul>
										<div class="resp-tabs-container">
											<!--/tab_one-->
											<?php
												$sel_side="SELECT Description,name FROM tbl_product WHERE id = $_GET[id] ";
												$run_side=mysqli_query($conn,$sel_side);
												while($rows=mysqli_fetch_assoc($run_side)){ 
													echo '
														<div class="tab1">
								
															<div class="single_page">
																<h6>'.ucfirst($rows['name']).'</h6>
																<p>'.$rows['Description'].'</p>
															</div>
														</div>';
												}
											?>
											<!--//tab_one-->
											<div class="tab2">
					
												<div class="single_page">
													<div class="bootstrap-tab-text-grids">
														<div class="bootstrap-tab-text-grid">
															<div class="bootstrap-tab-text-grid-left">
																<img src="images/team1.jpg" alt=" " class="img-fluid">
															</div>
															<div class="bootstrap-tab-text-grid-right">
																<ul>
																	<li><a href="#">Admin</a></li>
																	<li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li>
																</ul>
																<p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget.Ut enim ad minima veniam,
																	quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis
																	autem vel eum iure reprehenderit.</p>
															</div>
															<div class="clearfix"> </div>
														</div>
														<div class="add-review">
															<h4>Add a review</h4>
															<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>
															<!-- <form action="#" method="post">
																	<input class="form-control" type="text" name="Name" placeholder="Enter your email..." required="">
																<input class="form-control" type="email" name="Email" placeholder="Enter your email..." required="">
																<textarea name="Message" required=""></textarea>
																<input type="submit" value="SEND">
															</form>  -->
														</div>
													</div>
					
												</div>
											</div>
											<!-- /tab_three -->
											<?php
												$sel_side="SELECT info,name FROM tbl_product WHERE id = $_GET[id] ";
												$run_side=mysqli_query($conn,$sel_side);
												while($rows=mysqli_fetch_assoc($run_side)){ 
													echo '
														<div class="tab3">
								
															<div class="single_page">
																<h6>'.ucfirst($rows['name']).'  (Black)</h6>
																<p>'.$rows['info'].'</p>
															</div>
														</div>';
												}
											?>
											<!-- //tab_three -->
										</div>
									</div>
								</div>
								<!--//tabs-->
					
					</div>
				</div>
			</div> 				<div class="container-fluid">
					<!--/slide-->
					<div class="slider-img mid-sec mt-lg-5 mt-2 px-lg-5 px-3">
						<!--//banner-sec-->
						<h3 class="tittle-w3layouts text-left my-lg-4 my-3">Featured Products</h3>
						<div class="mid-slider">
							<div class="owl-carousel owl-theme row">
								<?php
								$sel_side="SELECT id,c_id,name,image,price,display FROM tbl_product WHERE display = 'on' AND c_id = $_GET[c_id] ORDER BY id DESC LIMIT 8 ";
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
														<form method="post" action="single.php?action=add&id='.$rows["id"].'" onsubmit="return pop()">
															

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
					<!--//slider-->
				</div>
		</section>
		<!--footer -->
		<?php include 'include/footer.php';?>
		<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>  
		<!-- //footer -->
		<script src="../../alert/dist/sweetalert2.min.js"></script>
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
		<!-- price range (top products) -->
		<script src="js/jquery-ui.js"></script>
		<script>
			//<![CDATA[ 
			$(window).load(function () {
				$("#slider-range").slider({
					range: true,
					min: 0,
					max: 9000,
					values: [50, 6000],
					slide: function (event, ui) {
						$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
					}
				});
				$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

			}); //]]>
		</script>
		<!-- //price range (top products) -->

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

		<!-- single -->
		<script src="js/imagezoom.js"></script>
		<!-- single -->
		<!-- script for responsive tabs -->
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
		<!-- FlexSlider -->
		<script src="js/jquery.flexslider.js"></script>
		<script>
			// Can also be used with $(document).ready()
			$(window).load(function () {
				$('.flexslider1').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				});
			});
		</script>
		<!-- //FlexSlider-->

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
		<script src="js/bootstrap.js"></script>
		<!-- js file -->
</body>

</html>