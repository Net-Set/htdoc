<!DOCTYPE HTML>
<html>
<head>
<title>Perfect Fitness</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
   
<body class="login-page" style="min-height: 512.391px;">
<div class="login-box">
  <div class="login-logo">
  <b>Admin Login</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"></p>
  <!-- //header-ends -->
<form action="" method="POST"> 
  <div id="page-wrapper">
          <input type="radio" name="login" value="Admin" required>Admin 
           <input type="radio" name="login" value="Trainer" required>Trainer
        </div>
          <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
                <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" value="SignIn" class="btn btn-primary btn-block" class="button">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</body>
</html>

<?php
session_start();
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'institute_db_ok';

$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
if(isset($_POST['username']))
{
    $email=$_POST['username'];
    $password=$_POST['password'];
    $pos=$_POST['login'];
    if($pos=="Admin")
    {
    $sql="select * from Admin where Email='$email' and Password='$password'";
    $rs=mysqli_query($con,$sql);
    if(mysqli_num_rows($rs))
    {
      $row=mysqli_fetch_assoc($rs);
      $_SESSION["admin"]=$email;
        echo "<script type='text/javascript'>
         alert ('Welcome admin, $email')
                   window.location.href='index.php';
      </script>";
    }
          else
      {
          echo "Invalid username or password..";
      }

    }
    else if($pos=="Trainer")
    {
    $sql="select * from trainer_master where Email='$email' and Password='$password'";
    $rs=mysqli_query($con,$sql);
    if(mysqli_num_rows($rs))
    {
      $row=mysqli_fetch_assoc($rs);
      $_SESSION["trainer"]=$email;
      echo "<script type='text/javascript'>
         alert ('Welcome trainer, $email')
          window.location.href='trainer.php';
      </script>";
    }
  }
    else
    {
        echo "Invalid username or password..";
    }
  
}
?>
