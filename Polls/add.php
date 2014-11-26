<?php
	session_start(); 

	include '../Models/User.php';
	include '../Models/Poll.php';	// include User model
    $user = unserialize($_SESSION['user']);
    
	$question = $_POST['poll_question'];

	$answers = array();
	$counter = 1;
	while(isset($_POST['option_'.$counter])){
		$answer = $_POST['option_'.$counter];
		array_push($answers, $answer);
		$counter++;
	}


	$poll = new Poll;
	$poll->setQuestion($question);
	$poll->setAnswers($answers);
	$poll->setImage("");
	$poll->setUserID($user->getID());
	$poll->setAnswersReceived(0);


	if($poll->save() == true){
		echo '<script>alert("Poll added successfully!")</script>';
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php?page=createpoll">';
	}else{
		echo '<script>alert("Poll creation failed!")</script>';
		//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php">';
	}


?>