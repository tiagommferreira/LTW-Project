<?php
include_once('database.php');

function connect(){
     include 'database.php';

     $db_connection = 'sqlite:'. $database_name;

     try {
          $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               return $db;
          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
         }
    }

     /**
     * Create all database tables.
     */
     function create_database(){
          include 'database.php';

          $db_connection = 'sqlite:'. $database_name;

          try {
               $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               // create users table
               $sql ="CREATE TABLE IF NOT EXISTS ".$user_table_name."(
                    ID INTEGER PRIMARY KEY NOT NULL,
                    username VARCHAR( 50 ) NOT NULL,
                    email VARCHAR( 250 ) NOT NULL,
                    password VARCHAR( 150 ) NOT NULL);";

$db->exec($sql);
print("Users table created.\n");

$db = null;
} catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
         }
    }

     /**
     * Delete all database tables.
     */
     function delete_database(){
          include 'database.php';
          $db_connection = 'sqlite:'.$database_name;

          try {
               $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               // delete users table
               $sql ="DROP TABLE IF EXISTS '". $user_table_name ."';";

               $db->exec($sql);
               print("Users table deleted.\n");

               $db = null;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
         }

    }

     /**
     * Get list of all users
     * @return array Return array of users of type User
     */
     function get_all_users(){
          include 'database.php';
          $db_connection = 'sqlite:'.$database_name;
          try {

               $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               $sql ="SELECT * FROM users";

               $stmp = $db->prepare($sql);
               $stmp->execute();

               $users = $stmp->fetchAll();

               $users_final_array = array();
               foreach($users as $user){
                    $user_array = array('ID'=>$user['ID'], 'username'=>$user['username'], 'email'=>$user['email']);
                    array_push($users_final_array, $user_array);
               }
               return $users_final_array;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }

     /**
     * Get user with username $username
     * @param $username String with user username
     * @return User Return user of type User
     */
     function get_user($username){
          include 'database.php';
          $db_connection = 'sqlite:'.$database_name;
          try {

               $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               $sql ="SELECT * FROM users WHERE username = :username";

               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":username" => $username,
                    ));

               $user = $stmp->fetch();
               $userModel = new User;
               $userModel->setUsername($user['username']);
               $userModel->setEmail($user['email']);
               $userModel->setPassword($user['password']);
               $userModel->setID($user['ID']);

               $db = null;
               return $userModel;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }

     /**
     * Get user with email $email
     * @param $email String with user email
     * @return User Return user of type User
     */
     function get_user_by_mail($email){
          include 'database.php';
          $db_connection = 'sqlite:'.$database_name;
          try {

               $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               $sql ="SELECT * FROM users WHERE email = :email";

               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":email" => $email,
                    ));

               $user = $stmp->fetch();
               $userModel = new User;
               $userModel->setUsername($user['username']);
               $userModel->setEmail($user['email']);
               $userModel->setPassword($user['password']);
               $userModel->setID($user['ID']);

               $db = null;
               return $userModel;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }

      /**
     * Get user with ID $id
     * @param $id Integer with user id
     * @return User Return user of type User
     */
      function get_user_by_id($id){
          include 'database.php';
          $db_connection = 'sqlite:'.$database_name;
          try {

               $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               $sql ="SELECT * FROM users WHERE ID = :id";

               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":id" => $id,
                    ));

               $user = $stmp->fetch();
               $userModel = new User;
               $userModel->setUsername($user['username']);
               $userModel->setEmail($user['email']);
               $userModel->setPassword($user['password']);
               $userModel->setID($user['ID']);

               $db = null;
               return $userModel;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }


     /**
     * Save user with username $username, email $email and password $password
     * @param $username String with user username
     * @param $email String with user email
     * @param $password String with hashed password
     * @return boolean Return true if added successfully. False otherwise.
     */
     function save_user($username, $email, $password){
          include 'database.php';


          $db_connection = 'sqlite:'.$database_name;

          try {
               $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
               $sql ="INSERT INTO users(username, email, password) VALUES (:username, :email, :password);";
               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":username" => $username,
                    ":email" => $email,
                    ":password" => $password
                    ));

               $db = null;
               return true;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }





     /**
     * Save user with username $username, email $email and password $password
     * @param $username String with user username
     * @param $email String with user email
     * @param $password String with hashed password
     * @return boolean Return true if added successfully. False otherwise.
     */
     function save_poll($question, $answers, $image){
          include 'database.php';

          session_start();

          $db_connection = 'sqlite:'.$database_name;

          try {
               $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               $currentUser = unserialize($_SESSION['user']);

               // insert poll into polls table
               $sql ="INSERT INTO polls(user_id, image, question) VALUES (:user_id, :image, :question);";
               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":user_id" => $currentUser->getID(),
                    ":image" => $image,
                    ":question" => $question
                    ));

               // get poll ID from polls table
               $sql = "SELECT id FROM polls ORDER BY ID DESC LIMIT 1";
               $stmp = $db->prepare($sql);
               $stmp->execute();
               $id_array = $stmp->fetch();

               $id = $id_array['ID'];

               // insert polls possible answers to polls_answers table
               foreach($answers as $answer){
                    $sql ="INSERT INTO polls_answers(poll_id, answer, votes) VALUES (:poll_id, :answer, :votes);";
                    $stmp = $db->prepare($sql);
                    $stmp->execute(array(
                         ":poll_id" => $id,
                         ":answer" => $answer,
                         ":votes" => 0
                         ));
               }

               $db = null;
               return true;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }


    function get_all_polls(){
     include 'database.php';
     include_once '../Models/Poll.php';
     include_once '../Models/User.php';

     $db_connection = 'sqlite:'.$database_name;

     try {
          $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               // get all polls from polls table
               $sql ="SELECT * FROM polls";
               $stmp = $db->prepare($sql);
               $stmp->execute();
               $polls_array = $stmp->fetchAll();

               $polls_final_array = array();
               
               // get all answers of poll
               foreach($polls_array as $poll){

                    $sql ="SELECT * FROM polls_answers WHERE poll_id = :poll_id"; 
                    $stmp = $db->prepare($sql);
                    $stmp->execute(array(
                         ":poll_id" => $poll['ID']
                         ));
                    $poll_answers = $stmp->fetchAll();

                    $poll_final_answers = array();
                    $answersReceived = 0;
                    foreach ($poll_answers as $poll_answer) {
                         array_push($poll_final_answers, $poll_answer['answer']);
                         $answersReceived = $answersReceived + intval($poll_answer['votes']);
                    }


                    $final_poll = new Poll;
                    $final_poll->setID($poll['ID']);
                    $final_poll->setQuestion($poll['question']);
                    $final_poll->setAnswers($poll_answers);
                    $final_poll->setImage("");
                    $final_poll->setUserID(intval($poll['user_id']));
                    $final_poll->setAnswersReceived($answersReceived);

                    array_push($polls_final_array, $final_poll);
               }


               return $polls_final_array;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }



    function get_all_polls_by_user($user_id){
     include 'database.php';
     include_once '../Models/Poll.php';
     include_once '../Models/User.php';

     $db_connection = 'sqlite:'.$database_name;

     try {
          $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               // get all polls from polls table
               $sql ="SELECT * FROM polls WHERE user_id = :user_id";
               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":user_id" => $user_id
                    ));
               $polls_array = $stmp->fetchAll();

               $polls_final_array = array();
               
               // get all answers of poll
               foreach($polls_array as $poll){

                    $sql ="SELECT * FROM polls_answers WHERE poll_id = :poll_id"; 
                    $stmp = $db->prepare($sql);
                    $stmp->execute(array(
                         ":poll_id" => $poll['ID']
                         ));
                    $poll_answers = $stmp->fetchAll();

                    $poll_final_answers = array();
                    $answersReceived = 0;
                    foreach ($poll_answers as $poll_answer) {
                         array_push($poll_final_answers, $poll_answer['answer']);
                         $answersReceived = $answersReceived + intval($poll_answer['votes']);
                    }


                    $final_poll = new Poll;
                    $final_poll->setID($poll['ID']);
                    $final_poll->setQuestion($poll['question']);
                    $final_poll->setAnswers($poll_answers);
                    $final_poll->setImage("");
                    $final_poll->setUserID(intval($poll['user_id']));
                    $final_poll->setAnswersReceived($answersReceived);

                    array_push($polls_final_array, $final_poll);
               }


               return $polls_final_array;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }

    function get_answer_by_id($id){
     include 'database.php';
     include_once '../Models/Poll.php';
     include_once '../Models/User.php';

     $db_connection = 'sqlite:'.$database_name;

     try {
          $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               // get answer with id

               $sql ="SELECT * FROM polls_answers WHERE ID = :id"; 
               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":id" => $id
                    ));
               $answer = $stmp->fetch();

               return $answer;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }

    function get_poll_by_id($id){
     include 'database.php';
     include_once '../Models/Poll.php';
     include_once '../Models/User.php';

     $db_connection = 'sqlite:'.$database_name;

     try {
          $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               // get all polls from polls table
               $sql ="SELECT * FROM polls WHERE ID = :id";
               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":id"=>$id
                    ));
               $poll = $stmp->fetch();

               
               // gets possible answers

               $sql ="SELECT * FROM polls_answers WHERE poll_id = :poll_id"; 
               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":poll_id" => $poll['ID']
                    ));
               $poll_answers = $stmp->fetchAll();

               $poll_final_answers = array();
               $answersReceived = 0;
               foreach ($poll_answers as $poll_answer) {
                    array_push($poll_final_answers, $poll_answer['ID']);
                    $answersReceived = $answersReceived + intval($poll_answer['votes']);
               }


               $final_poll = new Poll;
               $final_poll->setID($poll['ID']);
               $final_poll->setQuestion($poll['question']);
               $final_poll->setAnswers($poll_final_answers);
               $final_poll->setImage("");
               $final_poll->setUserID(intval($poll['user_id']));
               $final_poll->setAnswersReceived($answersReceived);

               $poll_final_array = array();
               $poll_final_array['poll']=$final_poll;


               return $final_poll;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }




    function vote_poll($poll_id, $user_id, $answer_id){
     include 'database.php';
     include_once '../Models/Poll.php';
     include_once '../Models/User.php';

     $db_connection = 'sqlite:'.$database_name;

     try {
          $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling



               $sql ="SELECT * FROM user_polls WHERE user_id = :user_id AND polls_id = :polls_id" ; 
               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":user_id" => $user_id,
                    ":polls_id" => $poll_id
                    ));
               $user_votes = $stmp->fetchAll();

               if(count($user_votes) > 0){
                    return false;
               }

               // insert into database the answer
               $sql ="INSERT INTO user_polls(user_id, polls_id, answer_id) VALUES (:user_id, :polls_id, :answer_id)";
               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":user_id"=>$user_id,
                    ":polls_id"=>$poll_id,
                    ":answer_id"=>$answer_id
                    ));

               $poll = get_answer_by_id($answer_id);

               $new_votes = intval($poll['votes'])+1;

               $sql = "UPDATE polls_answers SET votes=:votes WHERE ID=:id";
               $stmp = $db->prepare($sql);
               $stmp->execute(array(
                    ":votes"=>$new_votes,
                    ":id"=>$answer_id
                    ));

               return true;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }


//started to get answered_polls
    function get_all_answered_polls_by_user($user_id){
     include 'database.php';
     include_once '../Models/Poll.php';
     include_once '../Models/User.php';

     $db_connection = 'sqlite:'.$database_name;

     try {
          $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

               // get all answered_polls
               $sql ="SELECT COUNT(*) FROM user_polls WHERE user_id = :user_id";
               $stmp = $db->prepare($sql);
               $stmp->execute();
               $stmp->execute(array(
                    ":user_id"=>$user_id
                    ));
               $answered_polls = $stmp->fetch();

               return $answered_polls[0];

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }

    function get_all_unanswered_polls_by_user($user_id){
     include 'database.php';
     include_once '../Models/Poll.php';
     include_once '../Models/User.php';

     $db_connection = 'sqlite:'.$database_name;

     try {
          $db = new PDO($db_connection);
               $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
               
               $answered_polls = get_all_answered_polls_by_user($user_id);

                // get all polls from polls table
               $sql ="SELECT COUNT(*) FROM polls";
               $stmp = $db->prepare($sql);
               $stmp->execute();
               $total_polls = $stmp->fetch();

               $unanswered_polls = $total_polls[0] - $answered_polls;

               return $unanswered_polls;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
         }
    }
    
    function delete_poll($poll_id){
         include 'database.php';
         include_once '../Models/Poll.php';
         include_once '../Models/User.php';

         $db_connection = 'sqlite:'.$database_name;

         try {
              $db = new PDO($db_connection);
           $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

           $sql ="DELETE FROM polls WHERE ID = :poll_id" ; 
           $stmp = $db->prepare($sql);
           $stmp->execute(array(
              ":poll_id" => $poll_id
              ));

           $sql ="DELETE FROM polls_answers WHERE poll_id = :poll_id" ; 
           $stmp = $db->prepare($sql);
           $stmp->execute(array(
              ":poll_id" => $poll_id
              ));

           $sql ="DELETE FROM user_polls WHERE polls_id = :poll_id" ; 
           $stmp = $db->prepare($sql);
           $stmp->execute(array(
              ":poll_id" => $poll_id
              ));

           return true;

      } catch(PDOException $e) {
          echo $e->getMessage();//Remove or change message in production code
          return false;
     }
}



?>
