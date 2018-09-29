<?php
function check($con, $car){
  $check=htmlentities(stripslashes(mysqli_real_escape_string($con, $car)));
  return $check;
}
function encode($sec){
  // $asli=array('9', '8', '7', '6', '5', '4', '3', '2', '1', '0');
  // $enc= array('jO0Klx', 'F90mCk', 'Bu8jw', 'CiAs2', 'D8iXu', 'ZhTwe', 'DWeXu', 'qHbA4', 'TrAb3', 'VgGlR');
  // $secure= str_replace($asli, $enc, $sec);
  $double= base64_encode($sec);
  return $double;
}
function decode($sec){

  $secure=base64_decode($sec);
  // $get = array('jO0Klx', 'F90mCk', 'Bu8jw', 'CiAs2', 'D8iXu', 'ZhTwe', 'DWeXu', 'qHbA4', 'TrAb3', 'VgGlR');
  // $asli=array('9', '8', '7', '6', '5', '4', '3', '2', '1', '0');
  // $secure = str_replace($get, $asli, $double);
  return $secure;
}

function query_all($con, $table){
  $hasil=mysqli_query($con, "SELECT * FROM ".$table."");
  return $hasil;
}
function query_where1($con, $table, $where){
  $query=mysqli_query($con, "SELECT * FROM ".$table." WHERE ".$where."");
  $hasil=mysqli_fetch_array($query);
  return $hasil;
}
function query_whereall($con, $table, $where){
  $hasil=mysqli_query($con, "SELECT * FROM ".$table." WHERE ".$where."");
  return $hasil;
}
function insert($con, $table, $values)
{
  $query=mysqli_query($con, "INSERT INTO ".$table." VALUES ".$values."");
  if ($query) {
    $hasil = "1";
  }else{
    $hasil = "0";
  }
  return $hasil;
}
function del($con, $table, $where){
  $hasil=mysqli_query($con, "DELETE FROM ".$table." WHERE ".$where."");

  return $hasil;
}

function uang($n)
{
  $u= "Rp. ".number_format($n, 2, ',', '.');
  return $u;
}

 ?>
