<?php
  session_start();
  include_once('../database/manage_database.php');
  include_once('../Models/User.php');
  $user_final_array = array();
  if(isset($_GET['username'])){
    $user = get_user($_GET['username']);
    if($user!=false){
      $user_array = array('username'=>$user->getUsername(),
        'email'=>$user->getEmail()
      );
      
      $user_final_array['by_username'] = $user_array;
    }
  }
  if(isset($_GET['email'])){
    $user = get_user_by_mail($_GET['email']);
    if($user!=false){
      $user_array = array('username'=>$user->getUsername(),
        'email'=>$user->getEmail()
      );
     

      $user_final_array['by_email'] = $user_array;
    }
  }
  if(isset($_GET['all'])){
    if(!isset($_SESSION['user'])){
      $user_final_array = array("error"=>"Not logged in.");
    }else{
      $users = get_all_users();

      if($users!=false){
         $user_final_array['all'] = $users;
      }
    }
  }
  echo json_encode($user_final_array);


?>
