 <!DOCTYPE html>
<?php  include '../includes/db.php'?>
<html>
     <head>
	     <title>CMS System</title>
		 <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.css">
		 <script src="../../bootstrap/js/bootstrap.jss"></script>
		 <script src="../../../js/jquery.js"></script>
	 </head>
	 <body>
	     <?php include 'header.php';?>
		 
		 <div class="container">
		 <div style="width:50px;height:50px;"></div>
		 <div style="width:50px;height:50px;"></div>
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
										<img src="../../'.$rows['image'].'" width="100%">
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
			 
			    <?php include 'aside.php';?>
			 </article>
		 </div>
		 
		 <?php include '../includes/footer.php';?> 
		 		 
		 
	 </body>
</html>