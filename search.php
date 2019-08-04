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
}include 'includes/db.php';?>
<!DOCTYPE html>
<html>
	 <head>
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="../assets/css/docs.css" rel="stylesheet" >
            <link rel="stylesheet" type="text/css" href="CSS/btn.css">
            <link rel="stylesheet" type="text/css" href="CSS/style.css">
            <link rel="stylesheet" type="text/css" href="../alert/dist/sweetalert2.css">
	 
	 
	     <title>Dherai Sasto Deal</title>

		 <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
		 <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
		 <link rel="stylesheet" href="../bootstrap-social/bootstrap-social.css">
	 </head>

	 <body>
		 <?php include 'includes/header1.php';
		 		include 'includes/modal.php';
		 		include 'includes/feadback.php';
		 		include 'includes/mail.php';
		 ?>
		 <br>
		 <div class="container">
			 <article class="row">
				     <?php
					  if(isset($_GET['search'])){
						  echo '<div class="col-md-12" style="left : 370px;"><h1 >You Search For "'.ucfirst($_GET['search']).'"</h1></div>';
						  ?>
			</article>
			<article class="row">
						  <?php
				   
					     $sel_sql ="SELECT *FROM tbl_product WHERE name LIKE '%$_GET[search]%' OR price LIKE '%$_GET[search]%'";
						 $run_sql = mysqli_query($conn,$sel_sql);
						 while($row = mysqli_fetch_assoc($run_sql)){
					     ?>
					     	<div class="col-4">
					<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
						<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:10px;" align="center">
							<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" width="100px" height="110px" /><br/>

							<h4 class="text-info"><?php echo $row["name"]; ?></h4>

							<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

							<input type="text" name="quantity" value="1" class="form-control" />

							<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

							<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

							<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

						</div>
					</form>
				</div>
			</br>
						 <?php
						 }
					  }else{ echo "<b>Not Found ";}
					  
					 ?>
			 </article>
		 </div>
		 <br>
		 <?php include 'includes/footer.php';?>
		 <script src="../alert/dist/sweetalert2.min.js"></script>
		 <script src="js/modal.js"></script> 
		<script src="../bootstrap/dist/js/jquery-slim.min.js"></script>
		<script src="../bootstrap/dist/js/popper.min.js"></script> 
		 <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
		 <script src="js/script.js"></script>
		 
	 </body>
</html>