<?php

class Poll{
	protected $question;
	protected $image;
	protected $id;
	protected $answers;
	protected $user_id;
	protected $answers_received;
	protected $isPrivate;

	/** Poll database table name */
	private $table_name = 'polls';


	public function __construct(){

	}


	/**
	* @return Poll id.
	*/
	public function getID(){ return $this->id; }

	/**
	* @return Poll user id.
	*/
	public function getUserID(){ return $this->user_id; }

	/**
	* @return Poll question.
	*/
	public function getQuestion(){ return $this->question; }

	/**
	* @return Poll image.
	*/
	public function getImage(){ return $this->image; }

	/**
	* @return Poll questions.
	*/
	public function getAnswers(){ return $this->answers; }

	/**
	* @return integer poll number of answers received.
	*/
	public function getAnswersReceived(){ return $this->answers_received; }

	/**
	* @return bollean poll private or not.
	*/
	public function getPrivate(){ return $this->isPrivate; }



	/**
	* Set poll id.
	* @param $id Integer with poll id.
	*/
	public function setID($id){
		$this->id = $id;
	}
	/**
	* Set poll user id.
	* @param $user_id Integer with poll user id.
	*/
	public function setUserID($user_id){
		$this->user_id = $user_id;
	}

	/**
	* Set poll question.
	* @param $question String with poll question.
	*/
	public function setQuestion($question){
		$this->question = $question;
	}

	/**
	* Set poll image.
	* @param $image String with poll image.
	*/
	public function setImage($image){
		$this->image = $image;
	}

	/**
	* Set poll answers.
	* @param $answers Array with poll answers.
	*/
	public function setAnswers($answers){
		$this->answers = $answers;
	}

	/**
	* Set poll answers received.
	* @param $answers Integer with poll number of answers received.
	*/
	public function setAnswersReceived($answers_received){
		$this->answers_received = $answers_received;
	}

	/**
	* Set poll privacy.
	* @param $isPrivate Bollean with poll's privacy.
	*/
	public function setPrivate($isPrivate){
		$this->isPrivate = $isPrivate;
	}

	public function save(){
		include_once('../database/manage_database.php');
		session_start();
		return save_poll($this->question, $this->answers, $this->image, $this->isPrivate);
	}

	public function vote($user_id, $answer_id){
		include_once('../database/manage_database.php');
		session_start();
		return vote_poll($this->id, $user_id, $answer_id);
	}
	
	public function delete(){
		include_once('../database/manage_database.php');
		return delete_poll($this->id);
	}	
}

?>