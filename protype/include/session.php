<?php 
if ( isset($_SESSION['role']) ) {
	if ($_SESSION['role'] == "admin") {
		header('Location: adminpanel/index.php');
		exit();
	}
} elseif (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
}elseif(isset($_COOKIE['email']) && $_COOKIE['email']!= null){
	// if (!isset($_SESSION['role']) ) {
     $sql = "SELECT * from user WHERE user_email = '$_COOKIE[email]'";
		if($result = mysqli_query($conn,$sql)){				 
						 if(mysqli_num_rows($result) == 1){
						 	while($rows = mysqli_fetch_assoc($result)){
								$_SESSION['email'] = $rows['user_email'];
								$_SESSION['gender'] = $rows['user_gender'];
								$_SESSION['familyName'] = $rows['user_l_name'];
								$_SESSION['givenName'] = $rows['user_f_name'];
								$_SESSION['role'] = $rows['role'];

								if($rows['role'] == "admin")
									header('Location: adminpanel/index.php?fromcookie');
							}

		                 }
        }
}
?>