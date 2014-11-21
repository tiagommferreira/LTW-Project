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

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
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
               
               $userModel = new User($user['username'], $user['email'], $user['password']);
           
               return $userModel;

          } catch(PDOException $e) {    
              echo $e->getMessage();//Remove or change message in production code
              return false;
          }
     }
	

     function saveUser($username, $email, $password){
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

               return true;

          } catch(PDOException $e) {
              echo $e->getMessage();//Remove or change message in production code
              return false;
          }
     }

?>