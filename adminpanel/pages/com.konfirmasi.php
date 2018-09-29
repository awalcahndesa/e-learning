<?php
$pos=$_POST['idb'];
$kon=check($con, $_GET['act']);
switch ($kon) {
  case 'pembayaran':
    # code...
    mysqli_query($con, "UPDATE pembayaran SET status= 2 WHERE id_pembayaran='".$pos."'");
    header("location:../pembayaran/");
    break;
  case 'kirim':
      # code...

      mysqli_query($con, "UPDATE beli SET status= 1 WHERE id_beli='".$pos."'");
      header("location:../pengiriman/");
    break;
  case 'hapuspembayaran':
    # code...
    $hap=mysqli_query($con, "DELETE FROM pembayaran WHERE id_pembayaran='".$pos."'");
    if ($hap) {
      # code...

      header("location:../pembayaran/");
    }else{
      echo "string";
    }

    break;
  case 'hapusbeli':
  $hap=mysqli_query($con, "DELETE FROM beli WHERE id_beli='".$pos."'");
  if ($hap) {
    # code...

    header("location:../pengiriman/");
  }else{
    echo "string";
  }

    # code...
    break;
  default:
    # code...
    break;
}

 ?>
