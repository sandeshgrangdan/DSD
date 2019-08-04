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
	 if(isset($_GET['del_id'])){
		 $del_sql ="DELETE FROM category WHERE c_id='$_GET[del_id]'";
		 $run = mysqli_query($conn, $del_sql);
		 if(mysqli_query($conn, $del_sql)){
			 $result = '<div class="alert alert-danger"><h3>you deleted the category no '.$_GET['del_id'].'</h3></div>';
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
				 
			 
					 <div class="col-lg-8">
						 <div class="panel panel-primary"> 
						  
								 <div class="panel-heading">
									 <h4>Category</h4>
								 </div> 
								 <div class="panel-body">
									 <table class="table table-striped">
											<thead>
												 <tr>
													 <th>S.No</th>
													 <th>C_id</th>
													 <th>Category Name</th>
													 <th>Edit</th>									
													 <th>Delete</th>
													
												 </tr>
											<thead>
											<tbody>
											<?php
												 $sql ="SELECT * FROM category";
												 $run = mysqli_query($conn,$sql);
												 $num = 1;
												 while($rows = mysqli_fetch_assoc($run)){
													 if( $rows['category_name'] == 'home'){
																continue;
													 } else {
															 echo '
																												
																 <tr>
																	
																	 <td>'.$num.'</td>
																	 <td>'.$rows['c_id'].'</td>
																	 <td>'.ucfirst($rows['category_name']).'</td>
																	 <td><a href="editcategory.php?cat_id='.$rows['c_id'].'" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
																	 <td><a href="category_list.php?del_id='.$rows['c_id'].'" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>  Delete</a></td>
																	
																 </tr>
																 ';	
																 $num++;
															}
												 }														 
											?>	 
											</tbody>
									 </table>
								</div>
						 </div>
					 </div>
				 
				<div style="width:50px;height:50px;"></div>
			</div>		 
		 <?php include 'includes/footer.php';?>
	 </body>
</html>