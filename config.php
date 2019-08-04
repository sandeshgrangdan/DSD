<?php 
	require_once "gplus-lib/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("41971263255-80j88r206iph3s34h8k3864i4a31bm8i.apps.googleusercontent.com");
	$gClient->setClientSecret("aIDXA-zOhI1M-4kUjRY0nPe0");
	$gClient->setApplicationName("Dherai Sasto Deal");
	$gClient->setRedirectUri("http://localhost/phpweb/gcallback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
