<?php
session_start();
include 'includes/db.php';
	require_once "gplus-lib/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("41971263255-80j88r206iph3s34h8k3864i4a31bm8i.apps.googleusercontent.com");
	$gClient->setClientSecret("aIDXA-zOhI1M-4kUjRY0nPe0");
	$gClient->setApplicationName("Dherai Sasto Deal");
	$gClient->setRedirectUri("http://localhost/phpweb/cartsignin.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: index.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	echo "<pre>";
	var_dump($userData);

	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];
	


	$sql = "SELECT * FROM user WHERE user_email = '$userData[email]'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) == 1){
							 while($rows = mysqli_fetch_assoc($result)){
							 	if($rows['role'] == "admin"){
							 		$_SESSION['role'] = "admin";
							 		header('Location: adminpanel/index.php');
							 		exit();
							 	}else{
							 		$_SESSION['role'] = "subscribes";
							 		header('Location: paypage.php');
							 		exit();
							 	}
							 }
	}else{
		$_SESSION['role'] = "subscribes";
		header('Location: paypage.php?withouacount');
		exit();
	}
?>