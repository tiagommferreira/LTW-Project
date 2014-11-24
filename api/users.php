<?php
  include_once('../database/manage_database.php');
  include_once('../Models/User.php');
  if(isset($_GET['username'])){
    $user = get_user($_GET['username']);
    if($user!=false){
      $user_array = array('username'=>$user->getUsername(),
        'email'=>$user->getEmail()
      );
      $out = array_values($user_array);

      echo json_encode($user_array);
    }
  }

?>
