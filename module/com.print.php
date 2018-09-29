<?php

ob_start();
// error_reporting(0);
session_start();
include '../config/com.connect.php';
include '../config/com.function.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="adminpanel//bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="adminpanel/dist/css/AdminLTE.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
    <section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i> OnPas, Inc.
        <small class="pull-right">Tanggal: <?php echo $y=date("Y/m/d"); ?></small>
      </h2>
    </div><!-- /.col -->
  </div>
  <!-- info row -->
  <?php $q14=mysqli_query($con, "SELECT * fROM pembayaran WHERE id_user='".$_SESSION['id']."'");
  $f14=mysqli_fetch_array($q14);
   ?>
  <div class="row invoice-info">
    <div class="col-sm-3 invoice-col">
      From
      <address>
        <strong>Admin, Inc.</strong><br>
        795 Folsom Ave, Suite 600<br>
        San Francisco, CA 94107<br>
        Phone: (804) 123-5432<br>
        Email: info@almasaeedstudio.com
      </address>
    </div><!-- /.col -->
    <div class="col-sm-3 invoice-col">
      To
      <address>
        <strong>John Doe</strong><br>
        795 Folsom Ave, Suite 600<br>
        San Francisco, CA 94107<br>
        Phone: (555) 539-1037<br>
        Email: john.doe@example.com
      </address>
    </div><!-- /.col -->
    <div class="col-sm-6 invoice-col">
      <b>Pembayaran #<?php echo $f14['id_pembayaran']; ?></b><br>
      <br>
      <b>Order ID:</b> OP<?php echo $f14['id_pembayaran']; ?><br>
      <b>Id Akun:</b> <?php echo $f14['id_user'];?>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-xs-12 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Jumlah</th>
            <th>nama product</th>
            <th>Harga</th>
            <th>Subtotal</th>

          </tr>
        </thead>
        <tbody>
          <?php $q15=mysqli_query($con, "SELECT * FROM beli, product WHERE beli.id_product=product.id_product AND beli.id_pembayaran='".$f14['id_pembayaran']."'");
          while ($f15=mysqli_fetch_array($q15)) {
           ?>
          <tr>
            <td><?php echo $f15['jumlah_barang'];?></td>
            <td><?php echo $f15['nama_product'];?></td>

            <td><?php echo uang($f15['harga_product']);?></td>
            <td><?php echo uang($f15['jumlah_barang']*$f15['harga_product']);?></td>

          </tr>
          <?php   # code...
          } ?>
        </tbody>
      </table>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">
      <p class="lead">Metode Pembayaran</p>
      <p><b> Bank Transfer</b></p>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <i> Bank Transfer</i> Metode pembayaran dengan cara mentransfer langsung uang menggunakan bank.
      </p>
    </div><!-- /.col -->
    <div class="col-xs-6">
      <p class="lead">Dibayar Tanggal <?php echo $f14['tgl_bayar']; ?></p>
      <div class="table-responsive">
          <?php $q16=mysqli_query($con, "SELECT SUM(`beli`.jumlah_barang*`product`.harga_product) AS sum FROM product INNER JOIN `beli` ON product.id_product=`beli`.id_product WHERE `beli`.id_user='".$_SESSION['id']."'");
          $f16=mysqli_fetch_array($q16);?>
        <table class="table">
          <tr>
            <th style="width:50%">Subtotal:</th>
            <td><?php echo uang($f16['sum']); ?></td>
          </tr>
        
          <tr>
            <th>Pengiriman:</th>
            <td>Free </td>
          </tr>
          <tr>
            <th>Total:</th>
            <td><?php echo uang($f16['sum']); ?></td>
          </tr>
        </table>
      </div>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- this row will not appear when printing -->


</section>
</div>

</body>
</html>
