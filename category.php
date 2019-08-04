  <!DOCTYPE html>
<?php   session_start();
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
} ?>
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
		 <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
	</head>
	<?php include 'includes/modal.php';?>
	 <body>
	     <?php include 'includes/header1.php';
	       include 'includes/feadback.php';
           include 'includes/mail.php'; ?>

		 <br>
		 
		 <div class="container" >
		 	<?php echo '<h2 style="font-size: 50px;">'.ucfirst($_GET['name']).'</h2>' ?>
		 	<br>
		     <article class="row">
		     	
		     	<?php	


									$query = "SELECT * FROM tbl_product where display = 'on' AND c_id ='$_GET[cat_id]' ";
									$result = mysqli_query($conn, $query);
									if(mysqli_num_rows($result) > 0)
									{
										
										while($row = mysqli_fetch_array($result))
										{ 
											
?>
					
				  <div class="col-4">
					<form method="post" action="category.php?action=add&id=<?php echo $row["id"]; ?>&cat_id=<?php echo $_GET['cat_id'];?>&name=<?php echo $_GET['name'];?>">
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
			
<?php
		}

}else{
  echo '<h2 style="font-size: 50px;"> NO '.ucfirst($_GET['name']).' Found Please Try Other Category</h2> <br><br>';

}

?> 

			    <!--  <section class="col-lg-8">
				     <?php
					     $sel_sql ="SELECT *FROM post WHERE category = '$_GET[cat_id]' AND status='published'";
						 $run_sql = mysqli_query($conn,$sel_sql);
						 while($rows = mysqli_fetch_assoc($run_sql)){
							 echo '
							 <div class="panel panel-info">
						           <div class="panel-heading">
							        <h3><a href="post.php?post_id='.$rows['id'].'">'.$rows['title'].'</a></h3>
						           </div> 
							       <div class="panel-body">
									
										  <div class="col-lg-4">
											 <img src="'.$rows['image'].'" width="100%">
										  </div>
										  <div class="col-lg-8">
											<p>'.substr($rows['discription'],0,300).'...... </p>
										 </div>
					            	 <a href="post.php?post_id='.$rows['id'].'" class="btn btn-primary">Read more</a>
					               </div>
					          </div>
					 
							 ';
						 }
					 ?>
				 
				     
		
			 	</section>
			  -->
		
			 </article>
		 </div>
		 </br>
		 <?php include 'includes/footer.php';?> 
		 
		 
		 
		  <script src="../alert/dist/sweetalert2.min.js"></script>
		 <script src="js/modal.js"></script>
		<script src="../bootstrap/dist/js/jquery-slim.min.js"></script>
		<script src="../bootstrap/dist/js/popper.min.js"></script> 
		 <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
		 <script src="js/script.js"></script>
		 <script>
			     CKEDITOR.replace( 'editor1' );
			 </script>
	 </body>
</html>