<?php
	include '../database/manage_database.php';
	include '../Models/Poll.php';	// include User model
	include '../Models/PollsList.php';	// include User model

	if (isset($_POST['callDelete'])) {
		delete($_POST['callDelete']);
	}

	function delete($poll_id){
		$poll = new PollsList;
		$poll->setID($poll_id);

		if($poll->delete() == true){
			echo 'You have sucessfully deleted the list';
		}else{
			echo 'Deletion failed';
		}	
	}

?>