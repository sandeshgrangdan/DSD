<?php 
	session_start();
    require_once "config.php";
	if (isset($_SESSION['access_token'])) {
	 	unset($_SESSION['access_token']);
	    $gClient->revokeToken();
	 }
	 session_destroy();
	 setcookie('email',null,time()-7*24*60*60);
	 header('Location: index.php');
	 exit();

?>