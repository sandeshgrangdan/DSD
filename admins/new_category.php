<?php session_start();
     include'includes/db.php';
	 if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		 $sel_sql ="SELECT * FROM user WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
		 if($run_sql = mysqli_query($conn, $sel_sql)){
			 if(mysqli_num_rows($run_sql) == 1 ){
			
			 }else{
				 header('Location: ../index.php');
			 }
		 }
	 }else{
		 header('Location: ../index.php');
	 }
	 
	 $result ='';
	 if(isset($_POST['submit_category'])){
		 strip_tags($_POST['category']);
		 $sql = "INSERT INTO category (category_name) VALUE ('$_POST[category]')";
		 if(mysqli_query($conn,$sql)){
			 $result= '<div class="alert alert-success"><h3>you created new category '.$_POST['category'].'</h3></div>';
		 }
	 }
?>
<html>
	 <head>
		 <title>Admin panel</title>
		 <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
		 <script src="../../js/jquery.js"></script>
		 <script src="../../bootstrap/js/bootstrap.js"></script>
		 
	 </head>
	 <body>
		 <?php include 'includes/header.php';?>
		  <div style="width:50px;height:50px;"></div>
		  
		 <?php echo $result; include 'includes/side.php';?>
		 <div class="col-lg-10">
		   <div style="width:50px;height:50px;"></div>
			 <div class="page-header"><h1>New Post</h1></div>
			     <div class="container-fluid">
					 <form class="form-horizontal col -lg-5" action="new_category.php" method="post" enctype="multipart/form-data">
					     <div class="form-group">
							 <label for="cstegory">Title</label>
							 <input id="cstegory" type="text" name="category" class="form-control">
						 </div>
						 <div class="form-group">
							 <input type="submit" name="submit_category" class="btn btn-success btn-block">
						 </div>
					 </form>
				</div>
						
		    </div>
		 
		 <?php include 'includes/footer.php';?>
	 </body>
	 
</html>