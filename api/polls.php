<?php
  session_start();
	include_once('../database/manage_database.php');
	include_once('../Models/Poll.php');
	$polls_final_array = array();

  if(!isset($_SESSION['user'])){
    $final_array = array('error'=>'Not logged in.');
  }else{
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

      
      		$final_array['by_id'] = $poll_array;
    	}
    }
    else if(isset($_GET['answer_id'])){
      $answer = get_answer_by_id($_GET['answer_id']);

      if($answer!=false){
        $answer_array = array(
            'id'=>$answer['ID'],
            'poll_id'=>$answer['poll_id'],
            'answer'=>$answer['answer'],
            'votes'=>$answer['votes']
            );

        
            $final_array['answer_by_id'] = $answer_array;
      }

    }
  }
  echo json_encode($final_array);


?>