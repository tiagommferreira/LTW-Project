<?php

	$db_connection = 'sqlite:database.db';

try {


     $user_table_name = 'users';

     $db = new PDO($db_connection);
     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

     // create users table
     $sql ="CREATE TABLE IF NOT EXISTS ".$user_table_name."(
     ID INTEGER AUTO_INCREMENT PRIMARY KEY,
     username VARCHAR( 50 ) NOT NULL, 
     email VARCHAR( 250 ) NOT NULL,
     password VARCHAR( 150 ) NOT NULL);";

     $db->exec($sql);
     print("Created Table.\n");

} catch(PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
}

?>