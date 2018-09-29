<?php

ob_start();
error_reporting(0);
session_start();
include 'config/com.connect.php';
include 'config/com.function.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel=”icon” type=”image/png” href=”../../asset/img/icon.png”>
    <?php
    if ($_GET['hal']== 'detail') {
      # code...
      $nam = preg_replace("/-/"," ",check($con, $_GET['p']));
    $table="product WHERE nama_product='".$nam."'";
    $q99=query_all($con, $table);
    $deta=mysqli_fetch_array($q99);?>
      <title><?php echo $deta['nama_product'];?></title>
      <meta name='description' content='Toko Buatan anak pagentan atau cahndesa banjarnegara jawa tengah'>
    <meta name='keywords' content='toko, toko online, onpas, pasar, online, pasar online, anuro, cahndesa, smkn 1 bawang, banjarnegara, toko banjarnegara, dieng, hp, samsung, <?php echo $deta['keyword']; ?>'> <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

      <?php
    }else{?>
      <title>ONPAS</title>
      <meta name='description' content='Toko Buatan anak pagentan atau cahndesa banjarnegara jawa tengah'>
   <meta name='keywords' content='toko, toko online, onpas, pasar, online, pasar online, anuro, cahndesa, smkn 1 bawang, banjarnegara, toko banjarnegara, dieng, hp, samsung, nokia, lenovo, barang, murah, barang murah, hp, handphone'> <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

  <?php } ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<meta http-equiv="Copyleft" content="cahndesa">
<meta content='http://plus.google.com/114692787329768839012' name='author'/>
<meta content='index,follow' name='robots'/>
<meta content='all-language' http-equiv='Content-Language'/>
<meta content='Global' name='Distribution'/>
<meta content='Indonesia' name='geo.country'/>
<meta content='Semarang' name='geo.placename'/>
<meta content='all' name='robots'/>
<meta content='all' name='googlebot'/>
<meta content='all' name='msnbot'/>
<meta content='all' name='Googlebot-Image'/>
<meta content='all' name='Slurp'/>
<meta content='all' name='ZyBorg'/>
<meta content='all' name='Scooter'/>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<meta content='true' name='MSSmartTagsPreventParsing'/>
<meta content='blogger' name='generator'/>
<meta content='1 days' name='revisit'/>
<meta content='1 days' name='revisit-after'/>
<meta content='document' name='resource-type'/>
<meta content='id' name='language'/>
<meta content='ID' name='country'/>
<meta content='all' name='audience'/>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../asset/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../asset/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../asset/css/owl.carousel.css">
    <link rel="stylesheet" href="../../asset/style.css">
    <link rel="stylesheet" href="../../asset/css/responsive.css">
    <link rel="stylesheet" href="../../adminpanel/dist/css/AdminLTE.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                          <?php if (!empty($_SESSION['member'])){ ?>

                              <li><a href="../account/"><i class="fa fa-user"></i> My Account</a></li>
                              <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                              <li><a href="../cart/"><i class="fa fa-user"></i> My Cart</a></li>
                              <li><a href="../checkout/"><i class="fa fa-user"></i> Checkout</a></li>
                          <?php }else {
                           ?>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="../cart/"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="../login/"><i class="fa fa-user"></i> Login OR Register</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="header-right">

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="header-right">
                      <div class="user-menu" style="margin-right: 0px;">
                          <ul>
                            <?php if (!empty($_SESSION['member'])){ ?>

                                <li><a href="../account/logout.html"><i class="fa fa-user"></i> Logout</a></li>

                            <?php }?>
                          </ul>
                      </div>
                              </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo">
                        <h1><a href="#"><img src="../../asset/img/logo.png" style="max-width: 100px;"></a></h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div cass="search" style="margin-top: 40px;">
                    <form action="../cari/" method="post">
                      <input type="text" name="search" value="" placeholder="search Product"><input type="submit" value="search">
                    </form>
                  </div>
                </div>

                <div class="col-sm-3">
                    <div class="shopping-item">
                        <a href="../cart/">Cart - <span class="cart-amunt"><?php
                        $t=mysqli_query($con, "SELECT SUM(`order`.jumlah*`product`.harga_product) AS sum FROM product INNER JOIN `order` ON product.id_product=`order`.id_product WHERE `order`.id_user='".$_SESSION['id']."'AND `order`.status_order= '0'");
                        $f4=mysqli_fetch_array($t);
                          $har=uang($f4['sum']);
                          $q3=mysqli_query($con, "SELECT COUNT(*) AS count FROM `order` INNER JOIN product on `order`.`id_product`=product.id_product WHERE `order`.id_user= '".$_SESSION['id']."' AND `order`.status_order=0");
                          $f2=mysqli_fetch_array($q3);
                        echo $har; ?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo $f2['count']; ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

                        <li id="home" class="o"><a href="../home/">Home</a></li>
                        <li id="all"><a href="../all/">Barang</a></li>
                        <li id="cart"><a href="../cart/">Keranjang</a></li>
                        <li id=checkout><a href="../checkout/">Checkout</a></li>
                        <!-- <li><a href="#">Category</a></li> -->
                        <!-- <li><a href="#">Others</a></li> -->
                        <!-- <li><a href="#">Contact</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

<?php include 'config/com.content.php'; ?>

    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>u<span>Stora</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="#">Mobile Phone</a></li>
                            <li><a href="#">Home accesseries</a></li>
                            <li><a href="#">LED TV</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Gadets</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="../../asset/js/jquery-2.0.0.min.js"></script>
    <script>
$(document).ready(function(){
$("#<?php echo $_GET['hal']; ?>").removeClass("o").addClass("active");

});
</script>
    <!-- Bootstrap JS form CDN -->
    <script src="../../asset/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="../../asset/js/owl.carousel.min.js"></script>
    <script src="../../asset/js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="../../asset/js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="../../asset/js/main.js"></script>

    <!-- Slider -->
    <script type="text/javascript" src="../../asset/js/bxslider.min.js"></script>
	<script type="text/javascript" src="../../asset/js/script.slider.js"></script>
  </body>
</html>
