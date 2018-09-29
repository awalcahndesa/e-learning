<?php
if (empty($_SESSION['id'])) {
  # code...
  header("location:../login/");
}else{
$user=$_SESSION['id'];
echo $thp=date("Ymd").time()."<br>";
echo ($th=date("Ymd").time())+1;

$alamat=mysqli_query($con, "INSERT INTO user_detail VALUES ('".$th."', '$user', '".check($con, $_POST['ndepan'])."', '".check($con, $_POST['nbelakang'])."', '".check($con, $_POST['jenis_kelamin'])."', '".check($con, $_POST['ttl'])."', '".check($con, $_POST['nohp'])."', '".check($con, $_POST['alamat'])."', '".check($con, $_POST['provinsi'])."', '".check($con, $_POST['kota'])."', '".check($con, $_POST['kodepos'])."', '1')");
if ($alamat) {
  # code...
  header("location:../check/");
}else{
  echo "ok";
}
}
 ?>
