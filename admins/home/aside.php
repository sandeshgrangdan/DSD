<aside class="col-lg-4">
				   <form class="panel-group form-horizontal" action="search.php" role="form">
						<div class="panel panel-default">
						      <div class="panel-body">
								   <div class="panel-header">
										<h4>Search Something</h4>
								   </div>
								   <div class="input-group">
								       <input type="search" name="search" class="form-control" placeholder="Search Something.....">
									     <div class="input-group-btn">
									         <button class="btn btn-default" name="search_submits" type="submit"><i class="glyphicon glyphicon-search"></i></button>
									     </div>  
							       </div>
							 </div>
						</div>
				   </form>
				      
					
					
					 
					 <div class="panel panel-danger">
					 <div class="panel-heading">
						 <div class="list-group">
						 <?php
						 $sel_side="SELECT * FROM post WHERE status = 'published' ORDER BY id DESC LIMIT 6";
						 $run_side=mysqli_query($conn,$sel_side);
						 while($rows=mysqli_fetch_assoc($run_side)){
							 if(isset($_GET['post_id'])){
								 if($_GET['post_id']==$rows['id']){
									 $class='active';
								 }else{
									 $class='';
								 }
							 } else{
								 $class='';
							 }
							 
							  echo '
								<a href="post.php?post_id='.$rows['id'].'" class="list-group-item '.$class.'">
								<div class="col-sm-4">
									 <img src="../../'.$rows['image'].'" width="100%">
								</div>
								<div class="col-sm-8">
									 <h4 class="list-group-item-heading">'.substr($rows['title'],0,100).'</h4>
									 <p class="list-group-item-text">'.substr($rows['discription'],0,100).'</p>
								</div>
								<div style="clear:both"></div>							</a>
								
								';
							}
							?>
						 </div>
						</div>
					 </div>
				 </aside>