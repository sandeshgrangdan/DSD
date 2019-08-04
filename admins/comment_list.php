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
				 
			 
			 <!---- latest comments -->
			 
			 <div class="panel panel-primary">
			     <div class="panel-heading"><h3>Latest Comments</h3></div>
				 <div class=" panel-body">
					 <table class="table table-striped">
						 <thead>
							  <tr>
								 <th>S.No</th>
								 <th>Date</th>
								 <th>author</th>			 
								 <th>Email</th>
								 <th>Post</th>
								 <th>Comments</th>
								 <th>Status</th>
								 <th>Delete</th>
							  </tr>
						 </thead>
						 <tbody>
						     <tr>
								 <td>1</td>
								 <td>2015-5-12</td>
								 <td>diwesh</td>
								 <td>abc@gmail.com</td>
								 <td>2</td>
								 <td>I like the Post</td>
								 <td><a href="" class="btn btn-warning btn-xs">Approve</a></td>
								 <td><a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
							 </tr>
							 <tr>
								 <td>1</td>
								 <td>2015-5-12</td>
								 <td>diwesh</td>
								 <td>abc@gmail.com</td>
								 <td>2</td>
								 <td>I like the Post</td>
								 <td>Approved</td>
								 <td><a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
							 </tr>
							 <tr>
								 <td>1</td>
								 <td>2015-5-12</td>
								 <td>diwesh</td>
								 <td>abc@gmail.com</td>
								 <td>2</td>
								 <td>I like the Post</td>
								 <td>Approved</td>
								 <td><a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
							 </tr>
							 <tr>
								 <td>1</td>
								 <td>2015-5-12</td>
								 <td>diwesh</td>
								 <td>abc@gmail.com</td>
								 <td>2</td>
								 <td>I like the Post</td>
								 <td><a href="" class="btn btn-warning btn-xs">Approve</a></td>
								 <td><a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
							 </tr>
							 <tr>
								 <td>1</td>
								 <td>2015-5-12</td>
								 <td>diwesh</td>
								 <td>abc@gmail.com</td>
								 <td>2</td>
								 <td>I like the Post</td>
								 <td>Approved</td>
								 <td><a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
							 </tr>
							 
						 </tbody>
					 </table>
				 </div>
				 
			 </div>
			 <div style="width:50px;height:50px;"></div>
		 </div>
		 
		 <?php include 'includes/footer.php';?>
	 </body>
</html>