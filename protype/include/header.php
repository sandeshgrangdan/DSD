 <header>
	<script src="js/cartpop.js"></script>

			<div class="row">
				<div class="col-md-3 top-info text-left mt-lg-4">
					<h6>Need Help</h6>
					<ul>
						<li>
							<i class="fas fa-phone"></i> Call</li>
						<li class="number-phone mt-3">+977 9866558715</li>
					</ul>
				</div>
				<div class="col-md-6 logo-w3layouts text-center">
					<h1 class="logo-w3layouts">
						<a class="navbar-brand" href="index.php">
							Dherai Sasto Deal </a>
					</h1>					
					<!-- <div class="form-group">	
						<div class="input-group">
							<input class="form-control " type="text" name="text_search" id="text_search" placeholder="Search">
						</div>
						<ul class="list-group" id="result">
								
						</ul>
					</div> -->	
					
    
				</div>

				<div class="col-md-3 top-info-cart text-right mt-lg-4">
					<ul class="cart-inner-info">
							<?php if( isset($_SESSION['email']) ) { ?>
								
								<li>
									<a class="btn-open" href="logout.php" data-toggle="modal" data-target="#logout">
										<span class="fa fa-sign-out-alt" aria-hidden="true" style="font-size: 40px; color: #e44929;"></span>
									</a>
								</li>
							
						<?php } else { ?>
							
								<li>
									<a class="btn-open" href="#" data-toggle="modal" data-target="#signin">
										<span class="fa fa-user" aria-hidden="true" style="font-size: 40px; color: black; "></span>
									</a>
								</li>
																
						<?php } ?>
						<?php if(!isset($_SESSION['email'])) { ?>
						<li class="button-log">
							<a class="btn-open" href="#">
								<span class="fas fa-registered" aria-hidden="true" style="font-size: 40px; color: #e44929;"></span>
							</a>
						</li>
						<?php } ?>
						<br>
						<!-- <li class="button-log">
									<a class="btn-open" href="#" >
										<span class="fa fa-user" aria-hidden="true" style="font-size: 40px; "></span>
									</a>
								</li> -->
						
						<li class="galssescart galssescart2 cart cart box_1">
							<form action="checkout.php" method="post" class="last">
								<!-- <input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="display" value="1"> -->
								<button class="top_googles_cart" type="submit" name="submit" value="">
									My Cart
									<i class="fas fa-cart-arrow-down"></i>
								</button>
							</form>
						</li>
					</ul>
					<!---->
					 <div class="overlay-login text-left">
						<button type="button" class="overlay-close1">
							<i class="fa fa-times" aria-hidden="true"></i>
						</button>
						<div class="wrap">
							<h5 class="text-center mb-4">Register User</h5>
							<div class="login p-5 bg-dark mx-auto mw-100">
								<form class="form-horizontal" action="index.php" method="post" role="form" name="form" onsubmit="return formvalidate()">
									<div class="form-group">
					                   <label class="mb-2" for="first_name" >First Name </label>
					                   <input type="text" class="form-control" name="first" id="first_name" >
					                </div>
					                <div class="form-group">
					                	<label for="last_name" class="mb-2">Last Name </label>
					                	<input type="text" class="form-control" name="last" id="last_name">
					                </div>
									<div class="form-group">
										
										<label class="mb-2" for="email">Email address</label>
										<input type="text" id="emailHelps" class="form-control" name="email" id="email">
										<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
										<span id="alertemail">
											
								    	</span>
									</div>
									<div class="form-group">
										<label class="mb-2" for="passwor">Password</label>
										<input type="password" class="form-control" name="password" id="passwor">
									</div>
									<div class="form-group">
										<label class="mb-2" for="con_password">Confirm password </label>
										<input type="password" class="form-control" name="con_password" placeholder="Re-Enter Your Password" id="con_password">
					                </div>
					                <div class="form-group">
					                	<label class="mb-2" for="gender">Gender </label>
					                	<div class="mb-12">
											 <select class="form-control" name="gender" id="gender" style="background: blanchedalmond;">
												 <option value="">Select Gender</option>
												 <option value="male">Male</option>
												 <option value="female">Female</option>
											 </select> 
										 </div>
					                </div>
					                <div class="form-group">
					                	<label class="mb-2" for="phone_no" >Phone Number: </label>
					                	<input type="number" class="form-control" name="phone_no"  id="phone_no">
					                	<span id="phone_num">
					                		
					                	</span>
					                </div>
									
									<button type="submit" class="btn btn-primary submit mb-4" name="form">Sign-Up</button>

								</form>
							</div>
						</div>
					</div> 
					<!---->
				</div>
				<?php include 'include/signin.php'; ?>
			</div>
			<div class="search">
				<div class="mobile-nav-button">
					<a href="search.php">
						<button id="trigger-overlay" type="button">
							<i class="fas fa-search"></i>
						</button>
					</a>
				</div>
				
				<!-- <div class="overlay overlay-door">
					<button type="button" class="overlay-close">
						<i class="fa fa-times" aria-hidden="true"></i>
					</button>
					<form action="#" method="post" class="d-flex">
						<input class="form-control" type="search" placeholder="Search here..." required="">
						<button type="submit" class="btn btn-primary submit">
							<i class="fas fa-search"></i>
						</button>
					</form>

				</div> -->
				
			</div>
			<label class="top-log mx-auto"></label>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-mega mx-auto">
						<li class="nav-item active">
							<a class="nav-link ml-lg-0" href="index.php">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.php">About</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								Features
							</a>
							<ul class="dropdown-menu mega-menu ">
								<li>
									<div class="row">
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub"> Category </h5>
											<ul>
												<?php
													 $sel_side="SELECT c_id,category_name FROM category ";
													 $run_side=mysqli_query($conn,$sel_side);
													 while($rows=mysqli_fetch_assoc($run_side)){
													 if($rows['category_name'] == 'home'){
									                         continue;
									                     } 
														  echo '
															<li>
															<a href="category.php?cat_id='.$rows['c_id'].'&name='.$rows['category_name'].'">'.ucfirst($rows['category_name']).'
															</a>
															</li>
														
														  ';
													  }
												?>

												<li class="mt-3">
													<h5>View more pages</h5>
												</li>
												<li>
													<a href="customer.php">Registration</a>
												</li>
												<li class="mt-2">
													<a href="about.php">About</a>
												</li>
												
											</ul>
										</div>
										<?php
													 $sel_side="SELECT category_name,image FROM category LIMIT 2";
													 $run_side=mysqli_query($conn,$sel_side);
													 while($rows=mysqli_fetch_assoc($run_side)){ 
														  echo '
															<div class="col-md-4 media-list span4 text-left">
																<h5 class="tittle-w3layouts-sub"> '.ucfirst($rows['category_name']).' </h5>
																<div class="media-mini mt-3">
																	<a href="shop.php">
																		<img src="images/'.$rows['image'].'" class="img-fluid" alt="">
																	</a>
																</div>
															</div>
														
														  ';
													  }
										?>
									</div>
									<hr>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								Shop
							</a>
							<ul class="dropdown-menu mega-menu ">
								<li>
									<div class="row">
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub"> Tittle goes here </h5>
											<ul>
												<li class="media-mini mt-3">
													<a href="shop.php">Designer Glasses</a>
												</li>
												<li class="">
													<a href="shop.php"> Ray-Ban</a>
												</li>
												<li>
													<a href="shop.php">Prescription Glasses</a>
												</li>
												<li>
													<a href="shop.php">Rx Sunglasses</a>
												</li>
												<li>
													<a href="shop.php">Contact Lenses</a>
												</li>
												<li>
													<a href="shop.php">Multifocal Glasses</a>
												</li>
												<li>
													<a href="shop.php">Kids Glasses</a>
												</li>
												<li>
													<a href="shop.php">Lightweight Glasses</a>
												</li>
												<li>
													<a href="shop.php">Sports Glasses</a>
												</li>
											</ul>
										</div>
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub"> Tittle goes here </h5>
											<ul>
												<li class="media-mini mt-3">

													<a href="shop.php">Brooks Brothers</a>
												</li>
												<li>
													<a href="shop.php">Persol</a>
												</li>
												<li>
													<a href="shop.php">Polo Ralph Lauren</a>
												</li>
												<li>
													<a href="shop.php">Prada</a>
												</li>
												<li>
													<a href="shop.php">Ray-Ban Jr</a>
												</li>
												<li>
													<a href="shop.php">Sferoflex</a>
												</li>
											</ul>
											<ul class="sub-in text-left">

												<li>
													<a href="shop.php">Polo Ralph Lauren</a>
												</li>
												<li>
													<a href="shop.php">Prada</a>
												</li>
												<li>
													<a href="shop.php">Ray-Ban Jr</a>
												</li>
											</ul>

										</div>
										<div class="col-md-4 media-list span4 text-left">

											<h5 class="tittle-w3layouts-sub-nav">Tittle goes here </h5>
											<div class="media-mini mt-3">
												<a href="shop.php">
													<img src="images/g1.jpg" class="img-fluid" alt="">
												</a>
											</div>

										</div>
									</div>
									<hr>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
						</li>
					</ul>

				</div>
			</nav>
			<script src="../js/regs.js"></script>
			<script src="../js/validation.js"></script>
		</header>
	<div class="modal fade" id="logout" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Do you want to logout</h2>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                         
                </div>
                <div class="modal-footer">
                  <div class="form-group">
                  	<a href="logout.php">
                    	<button type="button" class="btn btn-danger">Logout</button>
                	</a>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  </div>
                     
                </div>
            </div>
        </div>
    </div>