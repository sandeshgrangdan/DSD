<?php session_start();
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
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
</head>
<body>
	<?php include'include/header.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="form-group">	
							<div class="input-group">
								<input class="form-control " type="text" name="text_search" id="text_search" placeholder="Search">
							</div>
							
				</div>
				<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
					<div class="container-fluid">
						<div class="inner-sec-shop px-lg-4 px-3">
							<div class="row" id="result">
					
					
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>



	<?php include'include/footer.php'; ?>

	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- newsletter modal -->
	<!-- Modal -->
	<!-- Modal -->
	<script>
		$(document).ready(function () {
			$("#myModal").modal();
		});
	</script>
	<!-- // modal -->
	<script src="../../alert/dist/sweetalert2.min.js"></script>

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
            
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						

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

</body>
</html>