<?php session_start();
     include'includes/db.php';
     	if (!isset($_SESSION['access_token'])) {
		// header('Location: aindex.php');
		exit();
	}
	// }else if(isset($_SESSION['user']) && isset($_SESSION['password']) == true){
	// 	 $sel_sql ="SELECT * FROM user WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
	// 	 if($run_sql = mysqli_query($conn, $sel_sql)){
	// 		 while($rows = mysqli_fetch_assoc($run_sql)){
	// 			 if(mysqli_num_rows($run_sql) == 1 ){
	// 				     $name=$rows['user_f_name'].' '.$rows['user_l_name'];
	// 					 $job = $rows['user_designation'];
	// 					 $gender = ucfirst($rows['user_gender']);
	// 					 $phone_no = $rows['user_phone_no'];
	// 					 if($rows['role'] ==  'admin'){
							 
	// 					 }else{
	// 						 header('Location: ../index.php');
	// 					 }
					
	// 			 }else{
	// 					 header('Location: ../index.php');
	// 			    } 
	// 		 }
	// 	 }
	//  }else{
	// 	 header('Location: ../index.php');
	//  }
	
	 
	 /// counting posts
	$sql ="SELECT * FROM post WHERE status = 'published'";
	$run = mysqli_query($conn, $sql);
	$total_post = mysqli_num_rows($run);
		
  ///countng 
  
   $sql ="SELECT * FROM category ";
	$run = mysqli_query($conn, $sql);
	$total_category = (mysqli_num_rows($run)-1);

 ///counting User  
 
    $sql ="SELECT * FROM user";
	$run = mysqli_query($conn, $sql);
	$total_user = mysqli_num_rows($run);
	
 ///counting comments
    $sql ="SELECT * FROM comments";
	$run = mysqli_query($conn, $sql);
	$total_comments = mysqli_num_rows($run);
?>
<html>
	 <head>
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="../../assets/css/docs.css" rel="stylesheet" >
            <link rel="stylesheet" type="text/css" href="CSS/btn.css">
            <link rel="stylesheet" type="text/css" href="CSS/style.css">
	 
	 
	     <title>Dherai Sasto Deal</title>

		 <link rel="stylesheet" href="../../bootstrap/dist/css/bootstrap.min.css">
		 <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
		 <link rel="stylesheet" href="../../bootstrap-social/bootstrap-social.css">
		 
	 </head>
	 <body>
		 <!-- <?php include 'includes/header.php';?> -->
		  <div style="width:50px;height:50px;"></div>
		 <h1>fuck</h1>
		 <div class="row">
		 
		 <?php include 'includes/side.php';?>

		 
		 <div class="col-lg-10">
		 
				 <div class="col-md-3">
					 <div class="panel panel-danger"> 
						 <div class="panel-heading">
							 <div class="row">
								 <div class="col-sm-3"><i class="glyphicon glyphicon-signal" style="font-size:4.5em"></i></div>
								 <div class="col-xs-9 text-right">
									 <div style="font-size:2.5em"><?php echo $total_post;?></div>
									 <div>Post</div>
								 </div>
							 </div>
						 </div>
					 <a href="view_post.php">
						 <div class="panel-footer">
							 <div class="pull-left">view post</div>
							 <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
							 <div class="clearfix"></div>
							 
						 </div>
						 </a>
					 </div>
				 </div>
				 
				 <div class="col-md-3">
					 <div class="panel panel-info"> 
						 <div class="panel-heading">
							 <div class="row">
								 <div class="col-sm-3"><i class="glyphicon glyphicon-th-list" style="font-size:4.5em"></i></div>
		 						 <div class="col-xs-9 text-right">
									 <div style="font-size:2.5em"><?php echo $total_category;?></div>
									 <div>Categories</div>
								 </div>
							 </div>
						 </div>
					 <a href="category_list.php">
						 <div class="panel-footer">
							 <div class="pull-left">view categories</div>
							 <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
							 <div class="clearfix"></div>
							 
						 </div>
						 </a>
					 </div>
				 </div>
				 
				 <div class="col-md-3 ">
				 <div class="panel panel-success"> 
					 <div class="panel-heading">
						 <div class="row">
							 <div class="col-sm-3"><i class="glyphicon glyphicon-user" style="font-size:4.5em"></i></div>
							 <div class="col-xs-9 text-right">
								 <div style="font-size:2.5em"><?php echo $total_user;?></div>
								 <div>Users</div>
							 </div>
						 </div>
				   	 </div>
				 <a href="">
					 <div class="panel-footer">
						 <div class="pull-left">view users</div>
						 <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
						 <div class="clearfix"></div>
						 
					 </div>
					 </a>
				 </div>
			 </div>
			 
			 <div class="col-md-3">
				 <div class="panel panel-primary"> 
					 <div class="panel-heading">
						 <div class="row">
							 <div class="col-sm-3"><i class="glyphicon glyphicon-comment" style="font-size:4.5em"></i></div>
							 <div class="col-xs-9 text-right">
								 <div style="font-size:2.5em"><?php echo $total_comments;?></div>
								 <div>Comments</div>
							 </div>
						 </div>
				   	 </div>
				 <a href="comment_list.php">
					 <div class="panel-footer">
						 <div class="pull-left">view comments</div>
						 <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
						 <div class="clearfix"></div>
						 
					 </div>
					 </a>
				 </div>
			 </div>
			 
			</div>
			</div>
			 <div class="clearfix"></div>
			 
			 <!---- top blocks ends----->
			 
			 
			 <!-- User Area-->
			 
			     <div class="col-lg-8">
			         <div class="panel panel-primary"> 
					  
				     	 <div class="panel-heading">
							 <h4>User List</h4>
						 </div> 
						 <div class="panel-body">
							 <table class="table table-striped">
							 <thead>
								 <tr>
									 <th>S.No</th>
									 <th>Names</th>
									 <th>Roles</th>
								 </tr>
								<thead>
								<tbody>
								
								<?php
								     $sql = "SELECT * FROM user LIMIT 5";
									 $run = mysqli_query($conn, $sql);
									 $num = 1;
									 while($rows = mysqli_fetch_assoc($run)){
										 echo '
											<tr>
												 <td>'.$num.'</td>
												 <td>'.$rows['user_f_name'].' '.$rows['user_l_name'].'</td>
												 <td>'.$rows['role'].'</td>
											 </tr>
											';
											$num++;
									 }
								?>
								
								
								</tbody>
							 </table>
						</div>
					 </div>
				 </div>
				 
				 <!-- profile area-->
				 <div class="col-lg-4">
			         
				     	 <div class="panel panel-primary">
						 <div class="panel-heading">
							 <div class ="col-md-8">
								<div class="page-header"><h4><?php echo ucfirst($name);?></h4></div> 
							  </div>
									<div>
										 <img src="../images/img1.jpg" width="30%" class="img-circle pull-right">
									</div>
								
									 <table class="table table-condensed">
											<tbody>
												<tr>
													 <th>Job:</th>
													 <td><?php echo $job;?></td>
												 </tr>
												 <tr>
													 <th>Role:</th>
													 <td><?php echo ucfirst($_SESSION['role']);?></td>
												 </tr>
												 <tr>
													 <th>Email:</th>
													 <td><?php echo $_SESSION['user'];?></td>
												 </tr>
												 <tr>
													 <th>Contact:</th>
													 <td><?php echo $phone_no;?></td>
												 </tr>
												 <tr>
													 <th>Gender:</th>
													 <td><?php echo $gender;?></td>
												 </tr> 
												 <tr>
													 <th>Country:</th>
													 <td>Nepal</td>
												 </tr>
												
											
											</tbody> 
									 </table>
								
								
							 </div>
					</div>
				</div>
			
				  <div class="clearfix"></div>
			 
			 <!---- Post lists Starts----->
			 
			 <div class="panel panel-primary">
			     <div class="panel-heading"><h3>Latest Post</h3></div>
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
							  </tr>
						 </thead>
						 <tbody>
						 <?php
							 //$sql= "SELECT * FROM post";
							 $sql= "SELECT * FROM post AS p JOIN category AS c ON c.c_id=p.category WHERE author = '$_SESSION[user]' AND status = 'published'";
							 $run = mysqli_query($conn, $sql);
							 $number=1;
							 while($rows = mysqli_fetch_assoc($run)){
								 echo'
									 <tr>
										 <td>'.$number.'</td>
										 <td>'.$rows['date'].'</td>
										 <td>'.($rows['image'] == '' ? 'No Fucking Image' : '<img src="../'.$rows['image'].'" width="50px">').'</td>
										 <td>'.$rows['title'].'</td>
										 <td>'.substr($rows['discription'],0,50).'......</td>
										 <td>'.ucfirst($rows['category_name']).'</td>
										 <td>'.ucfirst($name).'</td>
							         </tr>		 
								 ';
								 $number++;
							 }
						 ?>
						 </tbody>
					 </table>
				 </div>
				 
			 </div>
			 
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
								 <th>Components</th>
							  </tr>
						 </thead>
						 <tbody>
						<?php 
						 $c_sql="SELECT *FROM comments ";
						 $c_run=mysqli_query($conn, $c_sql);
						 $numb=1;
						 while($rows = mysqli_fetch_assoc($c_run)){
							 echo '
									 <tr>
										 <td>'.$numb.'</td>
										 <td>'.$rows['date'].'</td>
										 <td>'.$name.'</td>
										 <td>'.$rows['email'].'</td>
										 <td>2</td>
										 <td>'.$rows['comment'].'</td>
									 </tr>
								  ';
								  $numb++;
						 }
						 ?>
						 </tbody>
					 </table>
				 </div>
				 
			 </div>
			 <div style="width:50px;height:50px;"></div>
		 </div>
		 
		 <?php include 'includes/footer.php';?>
	 </body>
</html>