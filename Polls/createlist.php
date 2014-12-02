<?php
	session_start(); 

	include '../Models/User.php'; // include User model
	include '../Models/Poll.php';	// include Poll model
	include '../database/manage_database.php';	// include manage database functions

    $user = unserialize($_SESSION['user']);
    
	$polls =$_POST['poll'];
	$list_name= htmlentities($_POST['list_name']);

	if(empty($polls)) 
  	{
  		echo '<script>alert("Any poll selected.")</script>';
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php?page=createlistpoll">';
  	} else{
  		$list_id = add_list($list_name, $user->getID());
  		for($i = 0; $i < count($polls); $i++){
  			add_list_poll($list_id, $polls[$i]);
		}

  		echo '<script>alert("List created successfully.")</script>';
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php?page=createlistpoll">';

  	}



?>