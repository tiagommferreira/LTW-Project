<?php
	$db_connection = 'sqlite:database.db';

try {

     $username = $_POST['username'];
     $email = $_POST['email'];
     $password = $_POST['password'];

     $hash_password = md5($password);

     $db = new PDO($db_connection);
     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
     $sql ="INSERT INTO users(username, email, password) VALUES ('".$username."', '".$email."', '".$hash_password."');";

     $db->exec($sql);
     print("User added successfully.\n");

} catch(PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
}

     header('Location: ' . $_SERVER['HTTP_REFERER']);
?>