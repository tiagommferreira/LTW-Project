<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Poll Manager</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="scripts/script.js"></script>
<script src="scripts/register_validation.js"></script>
<script src="scripts/login_validation.js"></script>
  
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
      Hey, welcome to our website! <br>
      We are basically a group of 3 classmates, that made this site a class that we atend at FEUP. <br>
      That class is named LTW, short for "Linguagens e Tecnologias Web".<br>
      The main purpose of this site is to provida a user based interface, for creating and voting on the polls that a user made and submited.<br>
      In the main page, the user can see some stats. <br>
      Basically how many polls you made, and how many public polls he hasn't answered yet.<br>
      When creating a poll, the user can add as many response option he wants.<br>
      He can even set it public or private, and add a photo.<br>
      Pretty sweet, ahm? <br>
      You can even assemble a list of some of the polls you made and send a link to your friends, share on Facebook or Twitter. <br>
      We hope you have fun using our website, as much as we had making it <br>
      <br>
      José, José and Tiago.<br>
	</p>


    </div>


 
</body>
</html>
