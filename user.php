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



<script src="scripts/api_location.js"></script>



  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
   
  <script src="http://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="scripts/script.js"></script>
  <script src="scripts/add_option_poll.js"></script>
  <script src="scripts/add_option_management.js"></script>
  <script src="scripts/vote.js"></script>
  <script src="scripts/upload_script.js"></script>
  <script src="scripts/manage_poll.js"></script> 
  <script src="scripts/share_poll.js"></script> 
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>


<body>
  <div class="nav-bar">
    <ul>
      <li><a href="user.php">Home</a></li>
      <li><a href="user.php?page=listpolls">List Polls</a></li>

      <li><a href="user.php?page=createpoll">Create Poll</a></li>
      <li><a href="user.php?page=createlistpoll">Create Polls List</a></li>
      <li><a href="user.php?page=managepoll">Manage Polls</a></li>
      <li><a href="user.php?page=managelistpoll">Manage Polls List</a></li>
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
  }else if($_GET['page'] == 'viewpoll'){
    include 'Pages/viewpoll.php';
  }else if($_GET['page'] == 'createlistpoll'){
    include 'Pages/createlistpoll.php';
  }else if($_GET['page'] == 'managelistpoll'){
    include 'Pages/managelistpoll.php';
  }else if($_GET['page'] == 'viewlistpoll'){
    include 'Pages/viewlistpoll.php';
  }


  ?>
  </div>



<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>
