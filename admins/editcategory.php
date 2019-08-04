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
	  
	 $result = '';
	 if(isset($_POST['update_category'])){
		 $category = strip_tags($_POST['category']);
		// $sql = "INSERT INTO category (category_name) VALUE ('$_POST[category]')";
		 $sql = "UPDATE category SET category_name = '$category' WHERE  c_id = $_POST[cat_id]";
		 if(mysqli_query($conn,$sql)){
			 $result= '<div class="alert alert-success"><h3>you edit category '.$_POST['category'].'</h3></div>';
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
		 <? echo $result;?>
		 <?php
		     if(isset($_GET['cat_id'])){ 
				 
					 $sql ="SELECT * FROM category WHERE c_id = '$_GET[cat_id]'";
					 $run = mysqli_query($conn, $sql);
					 while($rows = mysqli_fetch_assoc($run)){
						 
					 
				 ?>
		   <div style="width:50px;height:50px;"></div>
			 <div class="page-header"><h1>Edit Category</h1></div>
			     <div class="container-fluid">
					 <form class="form-horizontal col-lg-5" action="editcategory.php" method="post" enctype="multipart/form-data">
					     <div class="form-group">
						   <input type="hidden" name="cat_id" value="<?php echo $_GET['cat_id']; ?>">
							 <label for="cstegory">Category Name</label>
							 <input id="category" type="text" value="<?php echo $rows['category_name']; ?>" name="category" class="form-control" required>
						 </div>
						 <div class="form-group">
							 <input type="submit" name="update_category" class="btn btn-success btn-block">
						 </div>
					 </form>
				</div>
			 <?php	}
					 } else {
			           echo  '<div class="panel panel-primary">
					   <div panel-heading>
					   <a href="category_list.php"><h3>click here to go to category</h3></a>
					   </div>
					   </div>';
		 }      header('Location: category_list.php');
		 ?>
		
						
		    </div>
		 
		 <?php include 'includes/footer.php';?>
	 </body>
	 
</html>