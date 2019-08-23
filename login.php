<!DOCTYPE html>
<!--PHP login System by WEBDEVTRICK (https://webdevtrick.com) -->
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>


body {
  background-image: url("steel.jpg");
}

h1 {
  color:#000066;
}

h3
{
 color:#0000cc;
}

small
{
color:#ff3333;  
}
</style>

</head>
<body>
<?php
require('config/config.php');
  require('config/db.php');
session_start();
if (isset($_POST['user_name'])){
  $user_name = stripslashes($_REQUEST['user_name']);
  $user_name = mysqli_real_escape_string($conn,$user_name);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn,$password);
        $query = "SELECT * FROM `users` WHERE user_name='$user_name'
and password='$password'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['user_name'] = $user_name;
      header("Location: index.php");
         }else{
  echo "<div align='center'  class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
  }
    }else{
?>
<div align="center">
  <form class="login" action="" method="post" name="login">
    <h1 class="login-title" align="center">Login</h1>
    <input type="text" class="login-input" name="user_name" placeholder="Username" autofocus>
    <input type="password" class="login-input" name="password" placeholder="Password">
    <input type="submit" value="Login" name="submit" class="login-button">
  <p class="login-lost">New Here? <a href="adduser.php">Register</a></p>
  </form>
</div>
<?php } ?>
</body>
</html>