<?php
	include_once('../Models/User.php');	// include User model
	
	/** Create user model/object */
	$user = new User;
	$user->setUsername($_POST['username']);
	$user->setPassword($_POST['password']);
	$user->auth();	// try to authenticate user
?>