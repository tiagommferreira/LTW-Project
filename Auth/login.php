<?php

	include_once('../Models/User.php');	// include User model
	session_start();
	/** Create user model/object */
	$user = new User;
	$user->setUsername($_POST['login_username']);
	$user->setPassword($_POST['login_password']);
	if($user->auth())	// try to authenticate user
	{
		$_SESSION['user'] = serialize($user);
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php">';
	} else{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}
?>
