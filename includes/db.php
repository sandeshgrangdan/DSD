<?php
      $server = 'localhost';
	  $user= "root";
	  $password='';
	  $db = 'dsd';
	  
	  $conn = mysqli_connect($server,$user,$password,$db);
	  
	  if(!$conn) {
		  die("connection Failled!:".mysqli_connect_error());
		  }
	  
?>