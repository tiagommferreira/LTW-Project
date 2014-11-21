<?php
	/** Register user to database. **/
    include_once('../Models/User.php');	// include User model
    
    $user = new User($_POST['username'], $_POST['email'], $_POST['password']);	// create user model with register form values
     // save user if not exists
	if($user->save()){
		echo 'User registration completed!';
	} else{
		echo 'User registration failed!';
	}	

?>