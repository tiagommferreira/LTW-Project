<?php
	/** Register user to database. **/
    include_once('../Models/User.php');	// include User model
    
    $user = new User;	// create user model with register form values

    $user->setUsername($_POST['username']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);


     // save user if not exists
	if($user->save()){
		echo 'User registration completed!';
	} else{
		echo 'User registration failed!';
	}	

?>