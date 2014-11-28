<?php
	session_start();
	/** Register user to database. **/
    include_once('../Models/User.php');	// include User model
    
    $user = new User;	// create user model with register form values

    $user->setUsername($_POST['register_username']);
    $user->setEmail($_POST['register_email']);
    $user->setPassword($_POST['register_password']);

     // save user if not exists
	if($user->save()){
		if($user->auth()){
			$_SESSION['user'] = serialize($user);
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php">';
		}else{
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
		}
	} else{
		alert("Registration failed");
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../index.php">';
	}	

?>