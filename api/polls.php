<?php

	include_once('../database/manage_database.php');
  	include_once('../Models/Poll.php');
  	$polls_final_array = array();
  	if(isset($_GET['id'])){
    	$poll = get_poll_by_id($_GET['id']);

    	if($poll!=false){
     		$poll_array = array(
     			'id'=>$poll->getID(),
     			'question'=>$poll->getQuestion(),
        		'answers'=>$poll->getAnswers(),
        		'image'=>$poll->getImage(),
        		'user_id'=>$poll->getUserID(),
        		'answers_received'=>$poll->getAnswersReceived()
      		);

      
      		$poll_final_array['by_id'] = $poll_array;
    	}
  }
  echo json_encode($poll_final_array);


?>