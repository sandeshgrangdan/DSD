<?php				$data = array();
					$category = array();
			     	$sql = "SELECT * FROM category";
			     	$run = mysqli_query($conn,$sql);
			     	if(mysqli_num_rows($run) > 0){
										
			     	while( $rows = mysqli_fetch_assoc($run) ) {
			     			array_push( $data, $rows);
			     	}
			     }
			     // echo "<pre>";
			     // print_r($data);
			     	foreach ($data as $d) {
			     		echo '<div class ="row">';
									$query = "SELECT * FROM tbl_product where display = 'on' AND c_id ='$d[c_id]'  ORDER BY id DESC LIMIT 3 ";
									$result = mysqli_query($conn, $query);
									if(mysqli_num_rows($result) > 0)
									{
										
										while($row = mysqli_fetch_array($result))
										{ 
											array_push( $category, $row);
?>
					
				  <div class="col-4">
					<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
						<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:10px;" align="center">
							<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" width="100px" height="110px" /><br/>

							<h4 class="text-info"><?php echo $row["name"]; ?></h4>

							<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

							<input type="text" name="quantity" value="1" class="form-control" />

							<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

							<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

							<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

						</div>
					</form>
				</div>
			</br>
<?php
		}

	}$bol = "true";
	foreach ($category as $key) {
	if( $d['c_id'] == $key['c_id'] && $bol == "true" ){
		// echo '<br><br><br><br><br><br><br><br><br><br><br><br>';
		echo '<div class="col-12 text-center" style="top:15px;"><a href="category.php?cat_id='.$d['c_id'].'&name='.$d['category_name'].'"><button class="btn btn-secondary btn-lg" style="padding = 20px;">View More '.$d['category_name'].'</button></a></div>';
		$bol = "false";
	}
	}
	
	echo '</div>';

	echo '<br>';
}
?> 