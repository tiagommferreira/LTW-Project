<?php
	session_start();
	
	include '../Models/User.php';
	include '../Models/Poll.php';	// include User model
    include '../database/manage_database.php';

    $user = unserialize($_SESSION['user']);

    if (isset($_POST['callCheckPrivate'])) {
		checkPrivate($_POST['callCheckPrivate']);
	}
	else {
		$question = $_POST['poll_question'];
		echo $question;
		$answers = array();
		$counter = 1;

		$poll_id = $_POST['poll_id'];

		while(isset($_POST['option_'.$counter])){
			$answer = $_POST['option_'.$counter];
			array_push($answers, $answer);
			$counter++;
		}

		if($counter < 3) {
			echo '<script>alert("Poll creation failed. You must have at leat 2 options!")</script>';
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php?page=managepoll">';
		}
		else {
			$poll = get_poll_by_id($poll_id);
			$poll->delete();
			$poll->setQuestion($question);
			$poll->setAnswers($answers);
			$poll->setImage("");
			$poll->setUserID($user->getID());
			$poll->setAnswersReceived(0);

			if(isset($_POST['checkbox'])) {
	  			$poll->setPrivate(1);
			}
			else {
				$poll->setPrivate(0);
			}

			if($poll->save() == true){
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php?page=managepoll">';
				echo '<script>alert("Poll edited successfully!")</script>';
			}else{
				echo '<script>alert("Poll creation failed!")</script>';
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../user.php?page=managepoll">';
			}

		}
	}
	function checkPrivate($poll_id) {
		$poll = get_poll_by_id($poll_id);
		echo $poll->getPrivate();
	}

?>