<?php
if (!empty(check($con, $_GET['hal']))) {
  include 'module/com.'.$_GET['hal'].'.php';
}
 ?>
