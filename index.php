<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Poll Manager</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="scripts/script.js"></script>
<script src="scripts/register_validation.js"></script>
<script src="scripts/login_validation.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  
  <?php session_start(); ?>
<body>
<?php
  if(isset($_SESSION['user'])){
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=user.php">';
  }
?>

  <h1 class="register-title">Sign-Up</h1>
  <form class="register" action="Auth/register.php" method="post">
    <input type="username" name="register_username" class="forms-input" placeholder="Username">
    <input type="email" name="register_email" class="forms-input" placeholder="Email">
    <input type="password" name="register_password" class="forms-input" placeholder="Password">
    <input type="password" name="register_password_confirm" class="forms-input" placeholder="Confirm Password">
    <input type="submit" value="Create Account" class="forms-button">
  </form>
  <h1 class="login-title">Login</h1>
  <form class="login" action="Auth/login.php" method="post">
    <input type="username" name="login_username" class="forms-input" placeholder="Username">
    <input type="password" name="login_password" class="forms-input" placeholder="Password">
    <input type="submit" value="Login" class="forms-button">
  </form>

  <h1 id="about_us_button" class="about-us-title">About us</h1>
    <div id="about_us">
    <p align=justify>
      <h2>Hey, welcome to our website!</h2> <br>
     
      The main purpose of this website is to provide a user based interface for voting on polls created by users.<br><br>
      <b>A poll can:</b>
        <ul style="list-style-type: none;">
          <li > 
            <center><i class="fa fa-plus fa-3x" style="color: #84C242;"></i><br>
            Have as many responses as the user wants</center><br><br><br><br>
          </li> 
          <li> 
            <center><i class="fa fa-lock fa-3x" style="color: #FFB833;"></i><br>
            Be public or private</center><br><br><br><br>
          </li>
          <li> 
            <center><i class="fa fa-picture-o fa-3x" style="color: #33A0FF;"></i><br>
            Add an image to the poll</center><br><br><br><br>
          </li>
          <li>
            <center><i class="fa fa-facebook fa-3x" style="color: #3B5998; margin-right: 4%;"></i>
            <i class="fa fa-twitter fa-3x" style="color: #00aced; margin-right: 4%;"></i>
            <i class="fa fa-envelope-o fa-3x" style="color: #4297C2;"></i><br>
             Be shared with others</center><br><br><br><br>
          </li>
        </ul>
      Pretty sweet, ahm? But it's <b>not just that</b>!!!<br><br>
      You can also assemble a <b style="color: #3B5998;">list of some polls</b>  you created and <b style="color: #3B5998;">send a link </b>to your friends and <b style="color: #3B5998;">share on Facebook or Twitter</b>. <br><br>
      
     <h4 style="color: #84C242;"> We hope you have fun and take advantages of using our website!!</h4>
     <br><br><b>
      Our team</b>,<br>
      José Melo, José Cardoso and Tiago Ferreira
	</p>


    </div>


 
</body>
</html>
