<?php
if (empty($_SESSION['id'])) {
  # code...
  header("location:../login/");
}else{
if (empty($_POST['act'])) {
  # code...
  $act="del";
}else{
  $act= $_POST['act'];
}echo $act;
echo $_GET['p'];
$d= $_GET['p'];
$b=decode(check($con, $d));
echo $b;
$user=$_SESSION['id'];
$ker=mysqli_query($con, "SELECT jumlah FROM `order` WHERE id_user='$user' AND id_order='$b'");
$cekc=mysqli_fetch_array($ker);
  echo "<br>".$cekc['jumlah']."<br>";

switch ($act) {
  case '-':
    # code...
      $jumlah = $cekc['jumlah']-1;
      $a = mysqli_query($con, "UPDATE `order` SET jumlah=$jumlah WHERE id_user='$user' AND id_order='$b'");
    header("location:../cart/");
    break;
  case '+':
    # code...
      $jumlah = $cekc['jumlah']+1;
      $a = mysqli_query($con, "UPDATE `order` SET jumlah=$jumlah WHERE id_user='$user' AND id_order='$b'");

    header("location:../cart/");
    break;
  default:
    $del = mysqli_query($con, "DELETE FROM `order` WHERE `order`.`id_order` = '$b'");
    if ($del) {
      # code...
          header("location:../cart/");
    }else{
      echo "gagal";
    }
    break;
}
}
 ?>
