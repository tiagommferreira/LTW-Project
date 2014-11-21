<?php

	$db_connection = 'sqlite:database.db';

try {


     $user_table_name = 'users';

     $db = new PDO($db_connection);
     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

     // create users table
     $sql ="DROP TABLE IF EXISTS ".$user_table_name.";";

     $db->exec($sql);
     print("Table deleted.\n");

} catch(PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
}

?>