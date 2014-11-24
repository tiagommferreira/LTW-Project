<?php

	include_once('../Models/User.php');	// include User model
	session_start();
	/** Create user model/object */
	$user = new User;
	$user->setUsername($_POST['username']);
	$user->setPassword($_POST['password']);
	if($user->auth())	// try to authenticate user
	{
		$_SESSION['user'] = serialize($user);
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php">';
	} else{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}
?>
