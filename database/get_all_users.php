<?php

	$db_connection = 'sqlite:database.db';

try {
     $db = new PDO($db_connection);
     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
     $sql ="SELECT * FROM users;";
     $statement = $db->prepare($sql);
     $statement->execute();
     $result = $statement->fetchAll();
     return $result;
} catch(PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
}

?>