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
	 if(isset($_GET['new_status'])){
		 $new_status = $_GET['new_status'];
		 $sql = "UPDATE post SET status='$new_status' WHERE id = $_GET[id]";
	     if($run = mysqli_query($conn, $sql)){
			 $result = '<div class="alert alert-success"><h3>We Just Upadated the Status Fuckers</h3></div>';
		 }
	 }
	 
	 if(isset($_GET['del_id'])){
		 $del_id = $_GET['del_id'];
		 $sql =" DELETE FROM post WHERE id = '$del_id'";
		 if($run = mysqli_query($conn, $sql)){
			 $result = '<div class="alert alert-danger"><h3>You Deleted The Row n0. '.$del_id.' From Database <b>FUCK YOU</b></h3></div>';
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
		  
		 <?php include 'includes/side.php';?>
		 
		 <div class="col-lg-10">
		 
		 <div style="width:50px;height:50px;"></div>
		 <?php echo $result;?>
				 
			 <!-- User Area->
				
			 
			 <!---- Post lists Starts----->
			 
			 <div class="panel panel-primary">
			     <div class="panel-heading"><h3>Post</h3></div>
				 <div class=" panel-body">
					 <table class="table table-striped">
						 <thead>
							  <tr>
								 <th>S.No</th>
								 <th>Date</th>
								 <th>Image</th>			 
								 <th>Title</th>
								 <th>Description</th>
								 <th>Category</th>
								 <th>Author</th>
								 <th>Status</th>
								 <th>Action</th>
								 <th>Edit Post</th>
								 <th>View Post</th>
								 <th>Delete Post</th>
							  </tr>
						 </thead>
						 <tbody>
						 <?php
							 //$sql= "SELECT * FROM post";
							 $sql= "SELECT * FROM post AS p JOIN user AS u ON p.author=u.user_email";
							 $run = mysqli_query($conn, $sql);
							 while($rows = mysqli_fetch_assoc($run)){
								 echo'
									 <tr>
										 <td>'.$rows['id'].'</td>
										 <td>'.$rows['date'].'</td>
										 <td>'.($rows['image'] == '' ? 'No Fucking Image' : '<img src="../'.$rows['image'].'" width="50px">').'</td>
										 <td>'.$rows['title'].'</td>
										 <td>'.substr($rows['discription'],0,50).'......</td>
										 <td>'.$rows['category'].'</td>
										 <td>'.$rows['user_f_name'].' '.$rows['user_l_name'].'</td>
										 <td>'.$rows['status'].'</td>
										 <td>'.($rows['status'] == 'draft' ? '<a href="view_post.php?new_status=published&id='.$rows['id'].'" class="btn btn-primary btn-xs">Publish</a>' : 
										 '<a href="view_post.php?new_status=draft&id='.$rows['id'].'" class="btn btn-info btn-xs">Draft</a>').'</td>
										 <td><a href="editpost.php?edit_id='.$rows['id'].'" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit Post</a></td>
										 <td><a href="../post.php?post_id='.$rows['id'].'" class="btn btn-success btn-xs">View Post</a></td>
										 <td><a href="view_post.php?del_id='.$rows['id'].'" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete Post</a></td>
							         </tr>
								 ';
							 }
						 ?>
						     
							 
						 </tbody>
					 </table>
				 </div>
				 
			 </div>
			   <div class="text-center">
					 <ul class="pagination">
						 <li><a href="#">1</a></li>
						 <li><a href="#">2</a></li>
						 <li><a href="#">3</a></li>
						 <li><a href="#">4</a></li>
						 <li><a href="#">5</a></li>
					 </ul>
			   </div>
			
			 <div style="width:50px;height:50px;"></div>
		 </div>
		 
		 <?php include 'includes/footer.php';?>
	 </body>
</html>