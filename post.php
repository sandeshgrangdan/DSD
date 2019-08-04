 <?php session_start();?>
 <!DOCTYPE html>
<?php  include 'includes/db.php'?>
<html>
     <head>
	         <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="../assets/css/docs.css" rel="stylesheet" >
            <link rel="stylesheet" type="text/css" href="CSS/btn.css">
            <link rel="stylesheet" type="text/css" href="CSS/style.css">
	 
	 
	     <title>Dherai Sasto Deal</title>

		 <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
		 <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
		 <link rel="stylesheet" href="../bootstrap-social/bootstrap-social.css">
	 </head>
	 <body>
	     <?php include 'includes/header1.php';?>
		 <br>
		 <div class="container">
		     <article class="row">
			     <section class="col-lg-8">
                      <?php
					  if(isset($_GET['post_id'])){
						$sel_sql ="SELECT *FROM post WHERE id = '$_GET[post_id]'";
						 $run_sql = mysqli_query($conn,$sel_sql);
						 while($rows = mysqli_fetch_assoc($run_sql)){
							 echo '
							     <div class="panel panel-default">
									<div class="panel-body">
										<div class="panel-header">
											<h2>'.$rows['title'].'</h2>
										</div>
										<img src="'.$rows['image'].'" width="100%">
										<p>'.$rows['discription'].'</p>
									</div>
								 </div>
							 ';
						 }
					  }else {
						  echo '<div class="alert alert-danger"><h3>No Post You&apos;ve Selected to Show You Have <a href="index.php">click here to select the post</a></h3></div>';
					  }
				      ?>		
			     </section>
			 
			    <?php include 'includes/aside.php';?>
			 </article>
		 </div>
		 
		 <?php include 'includes/footer.php';?> 
		 		 
		 <script src="js/main.js"></script>
		<script src="../bootstrap/dist/js/jquery-slim.min.js"></script>
		<script src="../bootstrap/dist/js/popper.min.js"></script> 
		 <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
		

		 <script src="js/script.js"></script>
		 <script src="js/main.js"></script>
	 </body>
</html>