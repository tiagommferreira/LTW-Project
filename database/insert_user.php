<?php
	/** Register user to database. **/
     include_once('../Models/User.php');	// include User model
     $user = new User($_POST['username'], $_POST['email'], $_POST['password']);	// create user model with register form values
     $user->save();	// save user if not exists

?>