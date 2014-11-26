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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/userpage.css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="http://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css" rel="stylesheet">
  
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="http://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="scripts/script.js"></script>
  <script src="scripts/add_option_poll.js"></script>
  <script src="scripts/vote.js"></script>


<body>
  <div class="nav-bar">
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
  if(!isset($_GET['page'])){
    include 'Pages/home.php';
  } else if($_GET['page'] == 'home' || !isset($_GET['page'])){
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
