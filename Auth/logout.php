<?php
	include_once('../Models/User.php');	// include User model
	session_start();
	
	if(isset($_SESSION['user'])){
		unset($_SESSION['user']);
	} 

	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">'; 
?>