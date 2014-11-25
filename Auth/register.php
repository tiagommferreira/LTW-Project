<?php
	/** Register user to database. **/
    include_once('../Models/User.php');	// include User model
    
    $user = new User;	// create user model with register form values

    $user->setUsername($_POST['register_username']);
    $user->setEmail($_POST['register_email']);
    $user->setPassword($_POST['register_password']);


     // save user if not exists
	if($user->save()){
		echo 'User registration completed!';
	} else{
		echo 'User registration failed!';
	}	

?>