<?php

if (empty($_SESSION['id'])) {
  # code...
  header("location:../login/");
}else{
$hari=date("Y-m-d");
$jam=time("h-MM-ss");
$y=date("Y");
$m=date("m");
$da=date("d");
$h=time("hhMMss");
$b = mysqli_real_escape_string($con, decode($_GET['p']));
// // if (empty($_SESSION['username'])) {
// //   # code...
// //   echo "anda harus daftar dulu";
// //   header("location:?p=daftar&b=".mysqli_real_escape_string($con, $_GET['b'])."");
// // }else{
  if (mysqli_real_escape_string($con, $_POST['jumlah'])==0) {
    $j= 1;
  }else {
    $j=mysqli_real_escape_string($con, $_POST['jumlah']);
  }
// $user = $_SESSION['id'];
$user = $_SESSION['id'];
echo $b."<br>";
$ker=mysqli_query($con, "SELECT COUNT(*), jumlah FROM `order` WHERE id_user='$user' AND id_product='$b' AND status_order= '0'");
$cekc=mysqli_fetch_array($ker);
echo $cekc['COUNT(*)'];
if ($cekc['COUNT(*)'] <= 0) {
  # code...
  $a = mysqli_query($con, "INSERT INTO `order` VALUES ('$y$m$da$h$user', '".decode($_GET['p'])."', '$user', '$hari', '$jam', '0', '$j')");
}else{

  $qw=mysqli_fetch_array($ker);
  $jumlah = $cekc['jumlah']+$j;
  $a = mysqli_query($con, "UPDATE `order` SET jumlah=$jumlah WHERE id_user='$user' AND id_product='$b' AND status_order= 0");
}
if ($a) {
  # code...
  $st = mysqli_query($con, "SELECT * FROM product WHERE id_product=$b");
  $data = mysqli_fetch_array($st);
  $sbaru = $data['stok']-$j;
  mysqli_query($con, "UPDATE product SET stok=".$sbaru." WHERE id_product=$b");
  header("location:../home/");
}else{
  echo "belum";

}
}

 ?>
