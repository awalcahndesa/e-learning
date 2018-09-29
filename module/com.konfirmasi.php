<?php
$pos=$_POST['idb'];
$kon=check($con, $_GET['p']);
switch ($kon) {
  case 'barang':
    # code...
    mysqli_query($con, "UPDATE beli SET status= 2 WHERE id_beli='".$pos."'");
    header("location:../account/");
    break;

  default:
    # code...
    break;
}

 ?>
