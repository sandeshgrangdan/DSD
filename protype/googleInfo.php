<?php
session_start();
	require_once "gconfig.php";

	if (isset($_SESSION['access_token']))
		$ggClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $ggClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: index.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($ggClient);
	$userData = $oAuth->userinfo_v2_me->get();

	echo "<pre>";
	var_dump($_SESSION['access_token']);

	// $_SESSION['gid'] = $userData['id'];
	// $_SESSION['gemail'] = $userData['email'];
	// $_SESSION['ggender'] = $userData['gender'];
	// $_SESSION['gpicture'] = $userData['picture'];
	// $_SESSION['gfamilyName'] = $userData['familyName'];
	// $_SESSION['ggivenName'] = $userData['givenName'];

	// header('Location: index.php');
	// exit();
	
?>