<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <?php session_start(); ?>

  <?php   
    include 'Models/User.php';

    if(!isset($_SESSION['user'])){
          echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">'; 
    }

    $user = unserialize($_SESSION['user']);
  ?>

  <title>Poll Manager - <?php echo $user->getUsername(); ?></title>
  <link rel="stylesheet" href="css/userpage.css">
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="scripts/script.js"></script>

<body>
  <div class="navbar">
    <ul>
      <li><a href="user.php">Home</a></li>
      <li><a href="user.php?page=listpolls">List Polls</a></li>
      <li><a href="user.php?page=createpoll">Create Poll</a></li>
      <li><a href="user.php?page=managepoll">Manage Polls</a></li>
      <div class="position-right">
      <li><a href="Auth/logout.php">Logout</a></li>
      </div>
   </ul>
  </div>
  
  <div class="container">
  <?php
  if($_GET['page'] == 'home' || !isset($_GET['page'])){
   include 'Pages/home.php'; 
  }else if($_GET['page'] == 'createpoll'){
    include 'Pages/createpoll.php';
  }else if($_GET['page'] == 'listpolls'){
    include 'Pages/listpolls.php';
  }else if($_GET['page'] == 'managepoll'){
    include 'Pages/managepoll.php';
  }



  ?>
  </div>
  

</body>
</html>