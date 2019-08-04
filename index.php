<?php session_start();
require_once "config.php";
include 'includes/db.php';
if ( isset($_SESSION['role']) ) {
	if ($_SESSION['role'] == "admin") {
		header('Location: adminpanel/index.php');
		exit();
	}
} elseif (isset($_SESSION['access_token'])) {
		header('Location: adminpanel/index.php');
		exit();
}elseif(isset($_COOKIE['email']) && $_COOKIE['email']!= null){
	// if (!isset($_SESSION['role']) ) {
     $sql = "SELECT * from user WHERE user_email = '$_COOKIE[email]'";
		if($result = mysqli_query($conn,$sql)){				 
						 if(mysqli_num_rows($result) == 1){
						 	while($rows = mysqli_fetch_assoc($result)){
								$_SESSION['email'] = $rows['user_email'];
								$_SESSION['gender'] = $rows['user_gender'];
								$_SESSION['familyName'] = $rows['user_l_name'];
								$_SESSION['givenName'] = $rows['user_f_name'];
								$_SESSION['role'] = $rows['role'];

								if($rows['role'] == "admin")
									header('Location: adminpanel/index.php?fromcookie');
							}

		                 }
        }
}



	
	  if(isset($_GET['new_status'])) {
	  	$update = "UPDATE transactions SET received = '$_GET[new_status]' WHERE id = '$_GET[id]'";
	       if($run = mysqli_query($conn, $update)){
	       echo '<script>alert("Thank You For Your Response");</script>';
	       echo '<script>window.location="index.php"</script>';
	     }
	  }
	  $match='';


	
	if ( isset($_GET['login_error']) ) {
		echo '<script>
			alert("Login Error Please Check your email and password");
		</script>';
	}

	if ( isset($_GET['error']) ) {
		echo '<script>
			alert("Login Error Please Check your email and password");
		</script>';
		echo '<script>window.location="index.php"</script>';
	}


	$loginURL = $gClient->createAuthUrl();



	 if(isset($_POST['confirm'])){
		 $date = date('Y-m-d h:i:s'); 
		 $ins_sql= "INSERT INTO user (role, user_f_name,user_l_name,user_email,user_password,user_gender,user_phone_no,user_date) 
		 VALUES ('subscriber','$_POST[first]','$_POST[last]','$_POST[email]','$_POST[password]','$_POST[gender]','$_POST[phone_no]','$date')";
		      if(mysqli_query($conn, $ins_sql)){
		      	    $_SESSION['email'] = $_POST['email'];
		      		$_SESSION['role'] = "subscriber";
		      		$_SESSION['givenName'] = $_POST['first'];
		      		$_SESSION['familyName'] = $_POST['last'];
		      		$_SESSION['gender'] = $_POST['gender'];
		      		echo '<script>alert("User Created Sucessfully")</script>';
		      		echo '<script>window.location="index.php"</script>';
		      }
		      else echo '<script>alert("User Not Created")</script>';
		     
		 }



// session_destroy();
// echo "<pre>";
// print_r($_SESSION['shopping_cart']);

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
?>

  <!DOCTYPE html>

<html>
     <head> 
	        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="../bootstrap/assets/css/docs.css" rel="stylesheet" >
            <link rel="stylesheet" type="text/css" href="CSS/btn.css">
            <link rel="stylesheet" type="text/css" href="CSS/style.css">
            <link rel="stylesheet" type="text/css" href="../alert/dist/sweetalert2.css">
	 
	 
	     <title>Dherai Sasto Deal</title>

		 <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
		 <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
		 <link rel="stylesheet" href="../bootstrap-social/bootstrap-social.css">
		 <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
	</head>
	 <body style="background : #eeeeee;">
	 	<?php include 'includes/modal.php'?>
	     <?php include 'includes/header.php'; ?>
	     <?php include 'includes/slider.php'; ?>
	     <br>

		 <div class="container">

		 <?php echo $match;?> 
		     <article class="row">	
		     	

			 <div class="col-md-4" style="align-items: center;">
			 	<h2 style="font-size: 55px ;color: #black;">Payment</h2>
			 	<p style="align-content: center;">Stripe is the best software platform for running an internet business. We handle billions of dollars every year for forward-thinking businesses around the world.</p>
			    <div class="box">
					<div class="icon"><i class="fa fa-cc-stripe"></i></div>
					<div class="content">
						<h3>Online Payment</h3>
						<p>Stripe builds the most powerful and flexible tools for internet commerce.
						</p> 
					</div>
				</div>
			</div>
			<div class="col-md-4" style="align-items: center;">
				<h2 style="font-size: 55px ;color: #black;">Use Map</h2>
				<p style=" align: center;">DSD offer use of web mapping service developed by Google. It offers satellite imagery, street maps, 360° panoramic views of streets,  and route for getting delivery location.</p>
				<div class="box" style="background: #16800f;">
					<div class="icon" style="background: #0b6704;"><i class="fa fa-map"></i></div>
					<div class="content">
						<h3>Google Map</h3>
						<p>Find a place. Your location. Trails. Dedicated lanes.
						</p> 
					</div>
				</div>
			</div>
			<?php include 'includes/aside.php';?>

			 </article>	 
			 
			 
			    <?php include 'includes/content.php';?>
		</div>

		<?php 
		if(!isset($_SESSION['email']))
		      include 'includes/form.php';
	    ?> 
		<section id="wrapper" class="skewed">

				    <div class="layer bottom">
				    	
				      <div class="content-wrap">
				      	<h2>About US</h2>
				        <div class="content-body">
				          <h2>Look Sharp</h2>
				          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quisquam temporibus dolore vero reiciendis atque debitis. Sequi at consequatur deserunt?</p>
				        </div>
				        <img src="images/DSDf.png" alt="">
				      </div>
				    </div>

				    <div class="layer top">
				        <div class="content-wrap">
				        	<h2 style="color: #fff;">About US</h2>
				          <div class="content-body">
				            <h2>Dherai Sasto Deal</h2>
				            <p>Welcome to Dherai Sasto Deal and the world most advance shoping technology.No lines, no checkout just grab and go.
				            Thanks For Visiting Us</p>
				          </div>
				          <img src="images/DSD.png" " 
				          alt="">
				        </div>
				      </div>

				       <div class="handle"></div>
				 </section>
		
		 <?php include 'includes/footer.php';?> 
		 <?php
          include 'includes/feadback.php';
          include 'includes/mail.php'; ?>
		 
		 
		 
		  <script src="js/main.js"></script>
		<script src="../bootstrap/dist/js/jquery-slim.min.js"></script>
		<script src="../bootstrap/dist/js/popper.min.js"></script> 
		 <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
		 <script src="../alert/dist/sweetalert2.min.js"></script>
		 <script src="js/script.js"></script>
		 <script src="js/main.js"></script>
		 <script type="text/javascript" src="js/validation.js"></script>
		 <script type="text/javascript" src="js/regs.js"></script>
		 <script type="text/javascript" src="js/modal.js"></script>
		 <script type="text/javascript">
		 	let sliderImages = document.querySelectorAll(".slide"),
			  arrowLeft = document.querySelector("#arrow-left"),
			  arrowRight = document.querySelector("#arrow-right"),
			  current = 0;
			  var boolen = 'true';
				var time = 5000;	// Time Between Switch
				// alert( sliderImages.);

				
				function changeImg(){
					reset();
					sliderImages[current].style.display = "block";
					if(current < sliderImages.length - 1){
					  current++; 
					} else { 
						current = 0;
					}
					
					  setTimeout("changeImg()", time);
					

				}
				changeImg();
				// Run function when page loads
				window.onload=changeImg();
			//Clear all images
			function reset() {
			  for (let i = 0; i < sliderImages.length; i++) {
			    sliderImages[i].style.display = "none";
			  }
			}

			// Init slider
			function startSlide() {
			  reset();
			  sliderImages[0].style.display = "block";
			}

			// Show prev
			function slideLeft() {
			  reset();
			  sliderImages[current - 1].style.display = "block";
			  current--;
			}

			// Show next
			function slideRight() {
			  reset();
			  sliderImages[current + 1].style.display = "block";
			  current++;
			}

			// Left arrow click
			arrowLeft.addEventListener("click", function() {
			  if (current === 0) {
			    current = sliderImages.length;
			    boolen = 'false';
			  }
			  slideLeft();
			});

			// Right arrow click
			arrowRight.addEventListener("click", function() {
			  if (current === sliderImages.length - 1) {
			    current = -1;
			    boolen = 'false';
			  }
			  slideRight();
			});

			startSlide();

		 </script>
		   <script>
			     CKEDITOR.replace( 'editor1' );
			 </script>
	 </body>
</html>