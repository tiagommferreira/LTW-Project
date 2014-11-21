<?php

class User{

	protected $username;
	protected $password;
	protected $email;


	/** User database table name */
	private $table_name = 'users';



	/**
	* @param $username Username string
	* @param $email Email string
	* @param $password Password string
	*/
	public function __construct($username, $email, $password){
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}
	/**
	* @return Username string.
	*/
	public function getUsername(){ return $this->username; }
	/**
	* @return Email string.
	*/
	public function getEmail(){ return $this->email; }

	/**
	* Set username.
	* @param $username String with user username.
	*/
	public function setUsername($username){
		$this->username = $username;
	}

	/**
	* Set email.
	* @param $email String with user email.
	*/
	public function setEmail($email){
		$this->email = $email;
	}

	/**
	* Set password.
	* @param $password String with user password.
	*/
	public function setPassword($password){
		$this->password = $password;
	}

	/**
  	* Adds user to database.
  	* @return boolean Returns true when user added successfully, false otherwise.
  	*/
	public function save(){
		include('../database/database.php');
		$db_connection = 'sqlite:'.$database_name;
		
		if($this->exists() == false){

				echo ' nao existe. ';
			try {

			     $hash_password = md5($this->password);

			     $db = new PDO($db_connection);
			     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
			     $sql ="INSERT INTO users(username, email, password) VALUES (:username, :email, :password);";
			    
			     $stmp = $db->prepare($sql);
			     $stmp->execute(array(
			     	":username" => $this->username,
			     	":email" => $this->email,
			     	":password" => $hash_password
			     	));

			     return true;

			} catch(PDOException $e) {
			    echo $e->getMessage();//Remove or change message in production code
			    return false;
			}
		}else{
			return false;
		}

	}


	/**
  	* Check if user exists in database.
  	* @return boolean Returns true if user exists, false otherwise.
  	*/
	public function exists(){
		include('../database/database.php');

		$db_connection = 'sqlite:'.$database_name;
		try {
		    $hash_password = md5($this->password);

		    $db = new PDO($db_connection);
		    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
		    
		    $sql ="SELECT * FROM users WHERE username = :username";
			
			$stmp = $db->prepare($sql);
		    $stmp->execute(array(
		     	":username" => $this->username,
		    ));

		    $user = $stmp->fetch();

		    if($this->username === $user['username']){
		    	if($this->email == ""){	$this->email = $user['email']; }	// if user model still doesn't have an email address, get from database
		    	return true;
		    }

		    return false;

		} catch(PDOException $e) {
		    echo $e->getMessage();//Remove or change message in production code
		    return false;
		}
	}

	/** 
	*	Authenticate user in website. Verifies if user exists and then checks if password is correct.
	*	If password and username are correct, it creates a session (authenticating user).
	*	@return boolean True when user is successfully authenticated. False otherwise.
	*/
	public function auth(){
		include('../database/manage_database.php');
		if($this->exists() == false){
			echo "user doesn' exist<br>";
			return false;
		}
		$hash_password = md5($this->password);
		$user = get_user($this->username);
		if($user->password == $hash_password){
			echo 'authenticated!';
			return true;
		}
		echo 'authentication failed!';
		return false;
	}
}
?>
