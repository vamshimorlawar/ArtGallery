
<?php
  include("db.php");
  session_start();
  
  if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
      
      $username=mysqli_real_escape_string($db,$_POST['username']);
      $password=mysqli_real_escape_string($db,$_POST['password']);
      
      $password=md5($password); 
      
      $sql="SELECT id FROM artist WHERE username='$username' and password='$password'";
      
      $result=mysqli_query($db,$sql);
      $count=mysqli_num_rows($result);
  
      
      if($count==1){
        $_SESSION['login_user']=$username;
        header("location: index.php");
      }else{
        $error="Your Username or Password is invalid";
        echo $error;
      }
    }
  }else{
?>     
<!DOCTYPE html>
<html lang="en-US" class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <
        <title>Artify</title>
        <meta name="description" content="">
        <meta name="author" content="VamshiKiran">
        <meta name="url" content="">
        <meta name="copyright" content="">
        <meta name="robots" content="index,follow">
        
        
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:200,400,800" rel="stylesheet">
        


    </head>
    <body>
        <div class="container">
          <div class="box"></div>
          <div class="container-forms">
            <div class="container-info">
              <div class="info-item">
                <div class="table">
                  <div class="table-cell">
                    <p>
                      Have an account?
                    </p>
                    <div class="btn">
                      Log in
                    </div>
                  </div>
                </div>
              </div>
              <div class="info-item">
                <div class="table">
                  <div class="table-cell">
                    <p>
                      Don't have an account? 
                    </p>
                    <div class="btn">
                      Sign up
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-form">
              <div class="form-item log-in">
                <div class="table">
                  <div class="table-cell">
                    
                    <form  method="post" action="login.php">
                      <input name="username" placeholder="Username" type="text" id="username" autocomplete="off" required>
                      <input name="password" placeholder="Password" type="Password" id="password" autocomplete="off" required>
                      <input type="submit" name="submit" value="Sign In" class="formbtn"/>
                    </form>
                  </div>
                </div>
              </div>
              
              
              <div class="form-item sign-up">
                <div class="table">
                  <div class="table-cell">
                    <form method="post" action="registration.php">
                    <input name="email" placeholder="Email" type="text" id="email" autocomplete="off" required>
                    <input name="name" placeholder="Full Name" type="text" id="name" autocomplete="off" required>
                    <input name="username" placeholder="Username" type="text" id="username" autocomplete="off" required>
                    <input name="password" placeholder="Password" type="Password" id="password" autocomplete="off" required>
                    <input type="submit" name="submit" value="Sign Up" class="formbtn"/>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <footer>
              <a class="sliding-u-l-r-l-inverse" href="../index.php">Go To Home Page</a>    
        </footer>
        
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/admin.js"></script>
   </body>
</html>

<?php 
}
?>