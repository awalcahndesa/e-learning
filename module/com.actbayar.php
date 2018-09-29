<?php
if (empty($_SESSION['id'])) {
  # code...
  header("location:../login/");
}else{
$date=date("Ymd").time("hMs")+1;
$idpem=$date+2;
$target_dir = "./bukti/";
$target_file = $_SESSION['id'].$idpem.basename($_FILES["bukti"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["bukti"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["bukti"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_dir.$target_file)) {
        $po= 1;
    } else {
      $po= 0;
    }
}

  $k = mysqli_query($con, "INSERT INTO pembayaran VALUES ('".$idpem."', 1, '".$_SESSION['id']."',  '".mysqli_real_escape_string($con, $_POST['nama'])."', '".mysqli_real_escape_string($con, $_POST['bank'])."', '".mysqli_real_escape_string($con, $_POST['norek'])."', '".mysqli_real_escape_string($con, $_POST['atas_nama'])."',  '".mysqli_real_escape_string($con, $_POST['j_trans'])."',  CURRENT_TIMESTAMP, '".$target_file."', 1)");
  if($k){
    if ($po==1) {
      # code...
    $i = mysqli_query($con, "SELECT * FROM product INNER JOIN `order` ON product.id_product=`order`.id_product WHERE `order`.id_user='".$_SESSION['id']."' AND `order`.status_order= '1'");
    while($al = mysqli_fetch_array($i)){
      $j=mysqli_query($con, "INSERT INTO beli values('', '".$idpem."', '".$_SESSION['id']."', '".$al['id_product']."', '".$al['jumlah']."', '".($al['harga_product']*$al['jumlah'])."', CURRENT_TIMESTAMP, '0')");
      if ($j) {
        # code...
        echo "jadi";
      }else{
        // echo mysql_error();
        echo "error";
      }
    }
    mysqli_query($con, "UPDATE `order` SET status_order = 2 WHERE id_user='".$_SESSION['id']."' AND status_order= '1'");
    header("location:../account/");
    echo "string";
  }else{
    echo "data belum masuk";
  }
}else{
  echo "ulangi lagi";
}
}
?>
