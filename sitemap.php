<?php
//   $databaseServer = "localhost";
// $databaseUsername = "root";
// $databasePassword = "";
// $databaseName = "cn_toko";
// $databaseTable = "product";
// header("Content-Type: text/xml");
//   function xmlentities($text)
//   {
// $search = array('&','<','>','"','\'');
// $replace = array('&amp;','&lt;','&gt;','&quot;','&apos;');
//     return str_replace($search,$replace,$text);
//   }
//   print chr(60)."?xml version='1.0' encoding='UTF-8'?".chr(62);
//   print chr(60)."urlset xmlns='http://www.google.com/schemas/sitemap/0.84' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:schemaLocation='http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd'".chr(62);
// $sql = "SELECT * FROM `".$databaseTable."`";
// $link = mysqli_connect($databaseServer,$databaseUsername,$databasePassword,$databaseName);
// $result = mysqli_query($link, $sql);
//   while($row = mysqli_fetch_array($result))
//   {
// // create the loc (URL) value based on the $row array, for example:
// $loc = $row["id_product"];
//     print "<url>";
//     print "<loc>".xmlentities($loc)."</loc>";
//     print "</url>";
//   }
//   print "</urlset>";
?>
<?php
$con=mysqli_connect('localhost','root','','cn_toko');
include 'config/com.function.php';
  header('Content-type: application/xml');
 echo '<?xml version="1.0" encoding="UTF-8"
 ?>
 <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
 xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

 $urls=mysqli_query($con, "select * from product ORDER BY id_product DESC");
 while($row_Tags=mysqli_fetch_array($urls))
 {
     $dat=date('Y-m-d',strtotime($row_Tags['tgl_masuk']));
     $urlweb= "http://onpas.web.id/index/"."detail/".$row_Tags['nama_product'].".html";
   echo "<url><loc>".$urlweb."</loc><lastmod>".$dat."</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>\n";
 }
  echo "</urlset>";
 ?>
