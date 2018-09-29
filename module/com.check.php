

    <div class="container">
        <div class="row">


            <div class="col-md-12">
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


   <!-- Table row -->
   <div class="row">
     <div class="col-xs-12 table-responsive">
       <table class="table table-striped">
         <thead>
           <tr>
             <th>Jumlah</th>
             <th>nama product</th>
             <th>Subtotal</th>

           </tr>
         </thead>
         <tbody>
           <?php $q15=mysqli_query($con, "SELECT * FROM `order`, product WHERE `order`.id_product=product.id_product AND `order`.id_user='".$_SESSION['id']."' AND `order`.status_order= '1'");
           while ($f15=mysqli_fetch_array($q15)) {
            ?>
           <tr>
             <td><?php echo $f15['jumlah'];?></td>
             <td><?php echo $f15['nama_product'];?></td>
             <td><?php echo uang($f15['jumlah']*$f15['harga_product']);?></td>


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
       <p class="lead">Metode Pembayara:</p>
       <p>Bank Transfer</p>
       <div class="callout callout-danger">
         <p> Barang belum ada yang dibayar</p>
      </div>
       <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
         <i><b>Bank Transfer </b></i> Salah Satu metode pembayaran dengan melakukan transer Langsung dari bank.
       </p>
     </div><!-- /.col -->
     <div class="col-xs-6">
       <!-- <p class="lead">Dibayar Tanggal <?php echo $f15['tgl_bayar']; ?></p> -->
       <div class="table-responsive">
           <?php $q16=mysqli_query($con, "SELECT SUM(`order`.jumlah*`product`.harga_product) AS sum FROM product INNER JOIN `order` ON product.id_product=`order`.id_product WHERE `order`.id_user='".$_SESSION['id']."' AND `order`.status_order= '1'");
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
     </div><!-- /.col --><!-- /.col -->
   </div><!-- /.row -->

   <!-- this row will not appear when printing -->
   <div class="row no-print">
     <div class="col-xs-12">

       <a href="../bayar/"><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-buy"></i> Bayar</button></a>
     </div>
   </div>
 </section>
            </div>
        </div>
    </div>
<div class="clearfix"></div>
<br><br><br><br><br>
