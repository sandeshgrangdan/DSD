<?php 
	require_once "gplus-lib/vendor/autoload.php";
	$ggClient = new Google_Client();
	$ggClient->setClientId("41971263255-80j88r206iph3s34h8k3864i4a31bm8i.apps.googleusercontent.com");
	$ggClient->setClientSecret("aIDXA-zOhI1M-4kUjRY0nPe0");
	$ggClient->setApplicationName("Dherai Sasto Deal");
	$ggClient->setRedirectUri("http://localhost/Phpweb/protype/googleInfo.php");
	$ggClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
