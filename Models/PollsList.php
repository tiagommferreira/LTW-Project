<?php

class PollsList{
	protected $id;
	protected $name;
	protected $polls;

	/** Poll database table name */
	private $table_name = 'polls';


	public function __construct(){

	}

	/**
	* @return PollsList id.
	*/
	public function getID(){ return $this->id; }

	/**
	* @return PollsList name.
	*/
	public function getName(){ return $this->name; }

	/**
	* @return PollsList polls.
	*/
	public function getPolls(){ return $this->polls; }
	
	/**
	* Set polls list id.
	* @param $id Integer with polls list id.
	*/
	public function setID($id){
		$this->id = $id;
	}

	/**
	* Set polls list name.
	* @param $name String with polls list id.
	*/
	public function setName($name){
		$this->name = $name;
	}

	/**
	* Set polls list polls.
	* @param $polls Array with polls list id.
	*/
	public function setPolls($polls){
		$this->polls = $polls;
	}


	public function delete(){
		include_once('../database/manage_database.php');
		return delete_list($this->id);
	}	
}


?>