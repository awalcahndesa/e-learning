<?php

$hari=date("Ymd");
$h=time("hMs");
$iduser=($hari.$h)+2;
switch ($_GET['p']) {
  case 'register':
    # code...

    $username=check($con, $_POST['username']);
    $email = check($con, $_POST['email']);
    $pass = check($con, $_POST['password']);
    $us_pass= encode($pass);
    $c1=mysqli_query($con, "SELECT COUNT(*) FROM user WHERE username='$username'");
    $fc1=mysqli_fetch_array($c1);
      if ($fc1['COUNT(*)'] >= 1) {
        # code...

        $_SESSION['error'] = 'username Telah digunakan';

        echo $_SESSION['error'];

        header("location:../login/");
      }else{
        $c2=mysqli_query($con, "SELECT COUNT(*) FROM user WHERE email='$email'");
        $fc2=mysqli_fetch_array($c2);
          if ($fc2['COUNT(*)'] >= 1) {
            # code...
            $_SESSION['error'] = 'Email Telah digunakan';
            echo $_SESSION['error'];

            header("location:../login/");
          }else{
            $daftar=mysqli_query($con, "INSERT INTO user VALUES('$iduser', '$username', '$email', '$us_pass', 'default.png', 0)");
            if ($daftar) {
              # code...
              $_SESSION['error'] = "oke";
              $_SESSION['id']=$iduser;
              $_SESSION['member']=$username;
              $_SESSION['pass']=$us_pass;
              $_SESSION['em_us']=$email;
              $_SESSION['lev']= '0';
              echo $_SESSION['member'];
              header("location:../home/");
                          }
            }

    }
    break;

  default:
    # code...

    $username=check($con, $_POST['email']);
    $pass = check($con, $_POST['password']);

        if(!empty($username)){
          $check1=mysqli_query($con, "SELECT *, COUNT(id_user) AS ada FROM user WHERE username='".$username."' || email='".$username."'");
              $fetc=mysqli_fetch_array($check1);
              echo $username;
              echo $fetc['username'];

              echo decode($fetc['pass_user']);
              ?><br><?
            if($fetc['ada'] == 0){

              $_SESSION['error'] = 'username atau password salah 1';
              echo $_SESSION['error'];
              echo decode($fetc['pass_user']);
              header("location:../login/");
            }else{
              $pasd=$fetc['pass_user'];
              if($pasd == encode(check($con, $_POST['password']))){

                  $_SESSION['error'] = "oke";
                  $_SESSION['id']=$fetc['id_user'];
                  $_SESSION['member']=$fetc['username'];
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
          header("location:.../login/");
          echo $_SESSION['error'];
          echo decode($fetc['pass_user']);
        }

    break;
} ?>
