<?php
include '../includes/db.php';
$output = '';
		$sel_side="SELECT id,price,c_id,name,display,image from tbl_product WHERE name LIKE '%".$_POST["search"]."%' AND display = 'on'";
		$run_side=mysqli_query($conn,$sel_side);
        if(mysqli_num_rows($run_side) > 0){
        	while( $rows=mysqli_fetch_array($run_side) ){
        		$output .='
                                                                <div class="col-md-3 product-men women_two">
                                                <div class="product-googles-info googles">
                                                        <div class="men-pro-item">
                                                                <div class="men-thumb-item">
                                                                        <img src="../images/'.$rows['image'].'" class="img-fluid" alt="">
                                                                        <div class="men-cart-pro">
                                                                                <div class="inner-men-cart-pro">
                                                                                        <a href="single.php?id='.$rows['id'].'&c_id='.$rows['c_id'].'" class="link-product-add-cart">Quick View</a>
                                                                                </div>
                                                                        </div>
                                                                        <span class="product-new-top">New</span>
                                                                </div>
                                                                <div class="item-info-product">
                                                                        <div class="info-product-price">
                                                                                <div class="grid_meta">
                                                                                        <div class="product_price">
                                                                                                <h4>
                                                                                                        <a href="single.php?id='.$rows['id'].'&c_id='.$rows['c_id'].'">'.ucfirst($rows['name']).'</a>
                                                                                                </h4>
                                                                                                <div class="grid-price mt-2">
                                                                                                        <span class="money ">$'.$rows['price'].'</span>
                                                                                                </div>
                                                                                        </div>
                                                                                        <ul class="stars">
                                                                                                <li>
                                                                                                        <a href="#">
                                                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                        <a href="#">
                                                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                        <a href="#">
                                                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                        <a href="#">
                                                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        </a>
                                                                                                </li>
                                                                                                <li>
                                                                                                        <a href="#">
                                                                                                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                                                                        </a>
                                                                                                </li>
                                                                                        </ul>
                                                                                </div>
                                                                                
                                                                                        <form method="post" action="index.php?action=add&id='.$rows["id"].'" onsubmit="return pop()">
                                                                                                                        

                                                                                                                                <input type="hidden" name="quantity" value="1" class="form-control" />

                                                                                                                                <input type="hidden" name="hidden_name" value="'.$rows["name"].'" />

                                                                                                                                <input type="hidden" name="hidden_price" value="'.$rows["price"].'" /> 
                                                                                                                                <input type="hidden" name="hidden_image" value="'.$rows["image"].'" /> 

                                                                                                                                <button type="submit" name="add_to_cart" class="googles-cart pgoogles-cart">
                                                                                                                                        <i class="fas fa-cart-plus"></i>
                                                                                                                                </button>

                                                                                                                </form>

                                                                                
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                </div>

                                                        </div>
                                                </div>
                                        </div>
                                                                                                                
                                                                ';
        	}
        	echo $output;
        }else{
        	echo "No Data Found";
        }
?>
