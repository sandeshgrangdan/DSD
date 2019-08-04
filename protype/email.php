<?php
	include '../includes/db.php';
	if(isset($_POST['valid'])){
		$sql = $conn-> query("SELECT user_id FROM user WHERE user_email = '$_POST[valid]' ");
		if ($sql->num_rows > 0) {
			echo '<div class="alert alert-info" role="alert">
					This email is already existed!
				  </div>';
		}else{
			echo '';
		}
	}elseif (isset($_POST['num'])) {
		$sql = $conn-> query("SELECT user_id FROM user WHERE user_phone_no = '$_POST[num]' ");
		if ($sql->num_rows > 0) {
			 			echo '<div class="alert alert-info" role="alert">
					This phone number is existed!
				  </div>';

		}else{
			echo '';
		}
	}
	
?>