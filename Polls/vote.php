<?php
	session_start(); 

	include '../database/manage_database.php';
	include '../Models/User.php';
	include '../Models/Poll.php';	// include User model
    $user = unserialize($_SESSION['user']);

	$option_id = $_POST['option'];

	if($option_id!=""){

		$answer = get_answer_by_id($option_id);

		$poll = new Poll;
		$poll->setID($answer['poll_id']);

		if($poll->vote($user->getID(), $option_id) == true){
			echo '<script>alert("Vote received")</script>';
			echo '<script>window.location.href = document.referrer;</script>';
		}else{
			echo '<script>alert("Vote failed/vote already done")</script>';
			echo '<script>window.location.href = document.referrer;</script>';
		}
	}else{
		echo '<script>alert("No option selected")</script>';
		echo '<script>window.location.href = document.referrer;</script>';
	}


?>