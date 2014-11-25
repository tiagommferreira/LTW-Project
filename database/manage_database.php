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


               

               $db = null;
               return $userModel;

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

?>
