<div class="jumbotron jumbotron-fluid" style="margin-bottom: 0px">
	<h2 class="pull-left">Dherai Sasto Deal</h2><br><br>
	<p class="pull-left">Let's Shop Now</p>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#"><span class="fa fa-home"> <b style="font-family: 'Times New Roman', Times, serif;">Home    </b></span> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><span class="fa fa-shopping-bag"> <b>Shop    </b></span></a>

      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span ><b style="font-family: 'Times New Roman', Times, serif;">Category </b></span> </a>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        	<?php
										 $sel_side="SELECT * FROM category ";
										 $run_side=mysqli_query($conn,$sel_side);
										 while($rows=mysqli_fetch_assoc($run_side)){
										 if($rows['category_name'] == 'home'){
						                         continue;
						                     } 
											  echo '
									
												<a class="dropdown-item" href="category.php?cat_id='.$rows['c_id'].'&name='.$rows['category_name'].'" class="nav-link ">'.ucfirst($rows['category_name']).'
												</a>
												<div class="dropdown-divider"></div>
											
											  ';
										  }
			?>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <?php if(!isset($_SESSION['email'])){ ?>
	      <li class="nav-item">
	          <a class="nav-link" data-toggle="modal" data-target="#regs"><span class="fa fa-registered"> <b>Registration</b></span></a>
	      </li>
	  <?php }else {?>
	  	  <li class="nav-item">
	          <a class="nav-link" href="logout.php"><span class="fa fa-power-off"> <b>Logout</b></span></a>
	      </li>
	  <?php }?>
      <li class="nav-item">
        <a class="nav-link " href="cart.php"><b><span class="fa fa-shopping-cart" style="font-size: 30px;">
        	<?php 
						   if(isset($_SESSION["shopping_cart"]))
						         $i = count($_SESSION["shopping_cart"]);
						   else
						   	$i = 0;

							if($i != 0){
								       echo '<sup><b style="background: red;
						               border-radius: 40%; padding: 3px;
						               font-size:30px;">'.$i.'</b></sup>';
					         }
					    ?>	
			</span></b>
		</a>
      </li>
    </ul>

             <form class="from-group pull-right" action="search.php" role="form">
								
									  <div class="search-box">
									     <input type="text" placeholder="Search" class="input" name="search">
									     <div class="btns">
									       <i class="fa fa-search" aria-hidden="true"></i>
									     </div>
									  </div>
								
		     </form> 
  </div>
</div>
</nav>