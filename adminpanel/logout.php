<?php
	// require_once "../config.php";
	// unset($_SESSION['access_token']);
	// $gClient->revokeToken();
    session_start();
	session_destroy();
	setcookie('email',null,time()-7*24*60*60);
	header('Location: ../index.php');
	exit();
?>