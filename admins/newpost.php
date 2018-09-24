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
	 
	 $error ='';
	 if(isset($_POST['submit_post'])){
		 $title = strip_tags($_POST['title']);
		 $date = date('Y-m-d h:i:s');
		 if(isset($_FILES['image'])){
			 $image_name = $_FILES['image']['name'];
			 $image_tmp = $_FILES['image']['tmp_name'];
			 $image_size = $_FILES['image']['size'];
			 $image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
			 $image_path = '../images/'.$image_name;
			 $image_db_path = 'images/'.$image_name;
			 
			 if($image_size < 3000000){
				 if($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif' ){
					if(move_uploaded_file($image_tmp,$image_path)){
						$ins_sql ="INSERT INTO post (title, discription, image, status, category, date, author) VALUES 
						('$title', '$_POST[description]','$image_db_path', '$_POST[status]', '$_POST[category]', '$date', '$_SESSION[user]')";
						if(mysqli_query($conn, $ins_sql)){
							header('Location: view_post.php');
						}
						else {
							$error = '<div class="alert alert-danger">FUCK the Query is not working</div>';
						}
					}else{
						$error  = '<div class="alert alert-danger">Sorry, Unfortunately Image has not been upload!</div>';
					}
				 }else{
					 $error= '<div class="alert alert-danger">Image Formate was not Correct</div>';
				 }
				 
				 
			 }else {
				 $error = '<div class="alert alert-danger">Image File is much bigger then Expect bitch!</div>';
			 }
			 
		 }else {
			 $ins_sql ="INSERT INTO post (title, discription, status, category, date, author) VALUES 
						('$title', '$_POST[description]', '$_POST[status]', '$_POST[category]', '$date', '$_SESSION[user]')";
						if(mysqli_query($conn, $ins_sql)){
							header('Location: view_post.php');
						}
						else {
							$error = '<div class="alert alert-danger">FUCK the Query is not working</div>';
						}
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
		  
		 <?php echo $error;  include 'includes/side.php';?>
		 <div class="col-lg-10">
		   <div style="width:50px;height:50px;"></div>
			 <div class="page-header"><h1>New Post</h1></div>
			     <div class="container-fluid">
					 <form class="form-horizontal" action="newpost.php" method="post" enctype="multipart/form-data">
					     <div class="form-group">
							 <label for="image">Upload the Image</label>
							 <input id="image" type="file" name="image" class="btn btn-success" required>
						 </div>
						 <div class="form-group">
							 <label for="title">Title</label>
							 <input id="title" type="text" name="title" class="form-control" required>
						 </div>
						 <div class="form-group">
							 <label for="category">Category</label>
								 <select id="category" name="category"class="form-control" required>
								     <option value="">Select Any Category</option>
									<?php 
										 $sel_sql = "SELECT * FROM category";
										 $run_sql = mysqli_query($conn, $sel_sql);
										 while($rows = mysqli_fetch_assoc($run_sql)){
											 if($rows['category_name'] == 'home'){
												 continue;
											 }
											 echo '<option value="'.$rows['c_id'].'">'.ucfirst($rows['category_name']).'</option>';
										 }
									?>
								 </select>
							 </div>
						 <div class="form-group">
							 <label for="description">Description</label>
							 <textarea id="description" class="form-control" name="description" required></textarea>
						 </div>
						 <div class="form-group">
							 <label for="status">Status</label>
							 <select id="status" name="status" class="form-control">
								 <option value="draft">Draft</option>
								 <option value="published">Published</option> 
							 </select>
						 </div>
						 <div class="form-group">
							 <input type="submit" name="submit_post" class="btn btn-danger btn-block">
						 </div>
						 
					 </form>
				 </div>
				 <div style="width:50px;height:50px;"></div>
				 <div style="width:50px;height:50px;"></div>
		 </div>
		 
		 <?php include 'includes/footer.php';?>
	 </body>
	 
</html>