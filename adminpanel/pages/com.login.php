<?php

if ($_GET['act']== 'log') {
  $hari=date("Ymd");
  $h=time("hMs");
  $iduser=($hari.$h)+2;

      $username=check($con, $_POST['email']);
      $pass = check($con, $_POST['password']);

          if(!empty($username)){
            $check1=mysqli_query($con, "SELECT *, COUNT(id_user) AS ada FROM user WHERE username='".$username."' || email='".$username."' AND level='99'");
                $fetc=mysqli_fetch_array($check1);
                echo $username;
                echo $fetc['username'];

                echo decode($fetc['pass_user']);
                ?><br><?
              if($fetc['ada'] == 0){

                $_SESSION['error'] = 'username atau password salah ';
                echo $_SESSION['error'];
                echo decode($fetc['pass_user']);
                header("location:../login/");
              }else{
                $pasd=$fetc['pass_user'];
                if($pasd == encode(check($con, $_POST['password']))){

                    $_SESSION['error'] = "oke";
                    $_SESSION['id_a']=$fetc['id_user'];
                    $_SESSION['admin']=$fetc['username'];
                    $_SESSION['pass']=$fetc['pass_user'];
                    $_SESSION['em_us']=$fetc['email'];
                    $_SESSION['lev']=$fetc['level'];
                    echo $_SESSION['member'];
                    header("location:../home/");
                }else{

                  $_SESSION['error'] = 'password salah';
                  header("location:../login/");
                  echo $_SESSION['error'];

                  echo decode($fetc['pass_user']);

                }
              }
          }else{

            $_SESSION['error'] = 'mohon isi semua kolom';
            header("location:./login/");
            echo $_SESSION['error'];
            echo decode($fetc['pass_user']);
          }
  } ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../../../adminpanel/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../../adminpanel/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../../../adminpanel/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#s"><b>Admin</b>LTE</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <?php if(!empty($_SESSION['error'])){ ?>
        <div class="callout callout-danger" style="margin-bottom: 0!important;">
          <?php echo $_SESSION['error']; ?>
        </div>
        <?php } ?>
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="../login/log" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In">
            </div><!-- /.col -->
          </div>
        </form>



      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../../../adminpanel/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../../../adminpanel/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../../../adminpanel/plugins/iCheck/icheck.min.js"></script>
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
