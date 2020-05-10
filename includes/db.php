<?php
      $server = 'localhost:3308';
	  $user= "root";
	  $password='root';
	  $db = 'dsd';
	  
	  $conn = mysqli_connect($server,$user,$password,$db);
	  
	  if(!$conn) {
		  die("connection Failled!:".mysqli_connect_error());
		  }
	  
?>