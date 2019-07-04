<?php
  include("db.php");
  session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    
    $password=md5($password);
    $sql="INSERT INTO artist(email, fullname, username, password) VALUES('$email','$name','$username','$password');";
    $result=mysqli_query($db,$sql);
    
    echo "Registration Successfully";
    header('refresh: 2; url=login.php');
  }
?>