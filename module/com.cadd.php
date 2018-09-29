<?php
  # code...
  mysqli_query($con, "UPDATE `order` SET status_order = 1 WHERE id_user='".$_SESSION['id']."' AND status_order= '0'");
  header("location:../check/");
  echo "jadi";

 ?>
