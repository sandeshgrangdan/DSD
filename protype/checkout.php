<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php session_start();
include '../includes/db.php'; 
	  require_once "config.php";
$loginURL = $gClient->createAuthUrl();
include 'include/session.php';
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				include 'include/cartrmessage.php';
			}
		}
	}
}
if(isset($_GET["d_id"])){
	foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["d_id"])
			{
				if( $_SESSION["shopping_cart"][$keys]['item_quantity'] == 1)
					unset($_SESSION["shopping_cart"][$keys]);
				else{
						$_SESSION["shopping_cart"][$keys]['item_quantity'] = $values["item_quantity"] - 1;
						echo ' 	<style type="text/css">
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
				      <li style="text-align: center;">Iteam Increased by 1</li>
				    </ul>

				    </div>';
				}
			}
		}
}
if(isset($_GET["i_id"])){
	foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["i_id"])
			{
				$_SESSION["shopping_cart"][$keys]['item_quantity'] = $values["item_quantity"] + 1;
			}
		}
}
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
	<script src="../../alert/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap-social.css">
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
	<b>
	<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<?php include'include/header.php';?>
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.php">Home</a>
							<i>|</i>
						</li>
						<li>Checkout </li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
	</div>
	<!--// header_top -->
	<!--checkout-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 mt-3" style="text-align: center;">Checkout For Item</h3>
				<div class="checkout-right">
					<h4 style="text-align: center;">
						<span><?php if(isset($_SESSION["shopping_cart"])) {
										if( count($_SESSION["shopping_cart"]) == 0 ){
											echo "No item for checkout"; 
											echo "<br>";
										    echo '<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4" style="color:black;">Shop Now</a>';
										}else{
											echo "Your shopping cart contains:".count($_SESSION["shopping_cart"]);	
										}
											
									}
									else{
										echo "No iteam for checkout";
										echo "<br>";
										echo '<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4" style="color:black;">Shop Now</a>';
										}
									?>		
						</span>
					</h4>
					<?php if(!empty($_SESSION["shopping_cart"])) { ?>
						<table class="timetable_sub">
							<thead>
								<tr>
									<th>SL No.</th>
									<th>Product</th>
									<th>Quantity</th>
									<th>Product Name</th>

									<th>Price</th>
									<th>Remove</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; 
								   foreach($_SESSION["shopping_cart"] as $keys => $values) { 

								?>

									<tr class="rem1">
										<td class="invert"><?php echo $i; ?></td>
										<td class="invert-image">
											<a href="single.php?id=<?php echo $values["item_id"]; ?>">
												<img src="../images/<?php echo $values["image"]; ?>" alt=" " class="img-responsive">
											</a>
										</td>
										<td class="invert">
											<div class="quantity">
												<div class="quantity-select">
													<div id="<?php echo $values["item_id"]."minus"; ?>" class="entry value-minus">&nbsp;</div>
														<div class="entry value">
															<span id="<?php echo $values["item_id"]."span"; ?>"><?php echo $values["item_quantity"]; ?></span>
														</div>
															<input id="<?php echo $values["item_id"]; ?>" type="hidden" value="<?php echo $values["item_id"]; ?>">
													       <div id="<?php echo $values["item_id"]."plus"; ?>" class="entry value-plus active">&nbsp;</div>
												</div>
											</div>
										</td>
										<td class="invert"><?php echo $values["item_name"]; ?></td>

										<td id="<?php echo $values["item_id"]."total"; ?>" class="invert"><?php echo number_format( $values["item_quantity"] * $values["item_price"], 2); ?></td>
										<td class="invert">
											<div class="rem">
											<a href="checkout.php?action=delete&id=<?php echo $values["item_id"]; ?>"><div class="close1"> </div></a>
												
											</div>

										</td>
									</tr>

								<?php
									$i++;
									}
								 ?>
								
							</tbody>
						</table>
				    <?php  } ?>
				</div>
				
				<div class="checkout-left row">
					<?php if(!empty($_SESSION["shopping_cart"])) { ?>
					<div class="col-md-4 checkout-left-basket">
						<h4>Continue to basket</h4>
						<ul>
							<?php if(!empty($_SESSION["shopping_cart"])) { 
								$sc = 0.00;
								$total = 0.00;
								   $i=1; 
								   foreach($_SESSION["shopping_cart"] as $keys => $values) { 
								   	echo '
								   	<li>Product'.$i.'
										<i>-</i>
										<span id="'.$values["item_id"].'basket">$'.number_format( $values["item_quantity"] * $values["item_price"], 3).'</span>
									</li>
									';
									$c = $values["item_quantity"] * $values["item_price"];
									
									$total  = $total + $c;
									$sc  += $values["item_quantity"]*2.00;
									$i++;
								   }
							} ?>
							<li>Total Service Charges
								<i>-</i>
								<span id="service">
									<?php echo '$'.number_format($sc); ?>
									
								</span>
							</li>
							<hr>
							<li>Total
								<i>-</i>
								<span id="total_p"><?php echo '$'.number_format($total+$sc,3);?></span>
							</li>
						</ul>
					</div>
					<?php } ?>
					<div class="col-md-8 address_form">
						<?php if(!isset($_SESSION['email']) ) { ?>
							<h4>Please LOgin !</h4>
		
										<button class="submit check_out"  data-toggle="modal" data-target="#signin">Sign Up !</button>
							
						<?php } else { ?>
						<?php if(isset($_SESSION['email']) && isset($_SESSION['shopping_cart'])){ ?>
							<?php if( count($_SESSION["shopping_cart"]) != 0 ) { ?>
								<div class="checkout-right-basket">
									<a href="payment.php">Make a Payment </a>
								</div>
							<?php } ?>
						<?php }
							
						}
						?>

					</div>

					<div class="clearfix"> </div>

				</div>
			

			</div>

		</div>
	</section>
	<!--//checkout-->
	<!--footer -->
	<?php 
		include 'include/footer.php';
	?>
	<!-- //footer -->
	<!--jQuery-->
	<script src="../../alert/dist/sweetalert2.min.js"></script>
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
<!-- cart start !-->
<?php 
if(isset($_SESSION["shopping_cart"]))
	foreach($_SESSION["shopping_cart"] as $keys => $values){
		echo "<script>
				$(document).ready(function(){
					$('#".$values["item_id"]."plus"."').click(function(){
						
							var txt = $('#".$values["item_id"]."').val();
								$.ajax({
									url:'add.php',
									method:'post',
									data: {add:txt},
									dataType:'text',
									success:function(value){
										var data = value.split("."','".");
										$('#".$values["item_id"]."span"."').html(data[0]);

										$('#".$values["item_id"]."total').html(data[1]);
										$('#".$values["item_id"]."basket').html(data[1]);
									}
								});
						
						
					});
				});

		</script>
		<script>
				$(document).ready(function(){
					$('#".$values["item_id"]."minus"."').click(function(){
						var txt = $('#".$values["item_id"]."').val();
							$.ajax({
								url:'add.php',
								method:'post',
								data: {sub:txt},
								dataType:'text',
								success:function(value){
									var data = value.split("."','".");
									$('#".$values["item_id"]."span"."').html(data[0]);

									$('#".$values["item_id"]."total').html(data[1]);
									$('#".$values["item_id"]."basket').html(data[1]);
								}
							});
						
					});
				});

		</script>

		";

		
	}

?>
<!-- if(confirm('Are you sure you want to increase?')){
	}else{

						} -->	
<script src="js/cart.js"></script>

<!-- cart !-->
	<script>
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
	</script>

	<!--quantity-->
	
	
	<!--quantity-->
	<!--close-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>
	<!--//close-->

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

</html>