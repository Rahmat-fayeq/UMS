<?php
  //include('control.php');
include'actions/database.php';
$smg="";
if(isset($_POST['login']))
{
  $password=$_POST['password'];
  $email=$_POST['email'];
  if(isset($_POST['save']))
  {
     setcookie('email',$email,time()+36*36);
     setcookie('password',$password,time()+36*36);
  }
  $checkAdmin=$connect->query("SELECT *FROM admin WHERE email='$email' AND password='$password'");
  if($checkAdmin->num_rows>0)
  {
    $getadmin=$checkAdmin->fetch_object();
    $_SESSION['admin_id']=$getadmin->id;
    $_SESSION['email']=$email;
    header("location:index.php");
   
  }
  else
  {
    $smg="Invalid Email or Password!";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="asset_admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset_admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="asset_admin/plugins/iCheck/square/blue.css">


</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <p class="text-danger"><?php echo $smg;?></p>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" required="required" placeholder="Email" name="email" value="<?php

              if(isset($_COOKIE['email']))
              {
                echo $_COOKIE['email'];
              }
              else
              {

              }
         ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" required="required" placeholder="Password" name="password" value="<?php 

              if(isset($_COOKIE['password']))
              {
                echo $_COOKIE['password'];
              }
              else
              {

              }

        ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="checkbox icheck">
            <label>
              <input name="save" type="checkbox" style="margin-left: 100px;"> <span style="margin-left: 120px;">Remember Me</span>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  

    <a href="forgotPassword.php">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="asset_admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="asset_admin/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="asset_admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
