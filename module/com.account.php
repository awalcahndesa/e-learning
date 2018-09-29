<?php if ($_GET['p']== 'logout'){
  session_destroy();
  header("location:../home/");
}else{
  if ($_GET['act']== 'del') {
    $b=$_GET['p'];
    $del = mysqli_query($con, "DELETE FROM `order` WHERE `order`.`id_order` = '$b'");
    if ($del) {
      # code...
          header("location:../account/");
    }else{
      echo "gagal";
    }
  }else{
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Account</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">

            <div class="col-lg-12">

              <div class="row" style="border: solid 0.5px #f0f0f0; padding-top: 10px; padding-bottom: 10px;">
              <div class="col-md-4">
                <?php $q11=mysqli_query($con, "SELECT * FROM user INNER JOIN user_detail ON user.id_user=user_detail.id_user WHERE user.id_user='".$_SESSION['id']."'");
                $f11=mysqli_fetch_array($q11);?>
                <div class="profile-image">
                  <img src="../../user/<?php echo $f11['gambar_profil']; ?>">
                </div>
                <button class="profile-btn">Ganti Foto Profile</button>
              </div>

              <div class="col-md-8">
                  <div class="product-content-right">
                      <div class="woocommerce">
                          <div class="profile-table ">
                            <table cellspacing="0">
                                <tbody>
                                    <tr>
                                        <th width="10px"><i class="fa fa-user"></i> </th>
                                        <td><span class="amount"><?php echo $f11['nama_depan']." ".$f11['nama_belakang'];?></span></td>
                                    </tr>
                                    <tr>
                                      <th><i class="fa fa-envelope"></i> </th>
                                      <td><?php echo $f11['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th><i class="glyphicon glyphicon-phone"></i></th>
                                        <td><strong><span class="amount"><?php echo $f11['no_hp']; ?></span></strong> </td>
                                    </tr>
                                    <tr>
                                        <th><i class="glyphicon glyphicon-map-marker"></i></th>
                                        <td><strong><span class="amount"><?php echo $f11['alamat']; ?></span></strong> </td>
                                    </tr>
                                    <tr>
                                        <th><i class="fa fa-location-arrow"></i></th>
                                        <td><strong><span class="amount"><?php echo $f11['kabupaten']; ?></span></strong> </td>
                                    </tr>

                                  </tbody>
                                </table>
                            </div>

                            <a href="editp"><button class="profile-btn-2">Edit Profil</button></a>

                          <div class="cart-collaterals">



                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <br><br><br>
            <div class="row" style="padding: 0px;">
              <div class="col-md-12"  style="padding: 0px; margin: 0px; border: 0.5px solid #f0f0f0;">

                <div role="tabpanel">
                    <ul class="product-tab" role="tablist" style="align: left">
                        <li role="presentation" style="float: left"><a href="#alamat" aria-controls="home" role="tab" data-toggle="tab">Alamat</a></li>
                        <li role="presentation" style="float: left;"><a href="#status" aria-controls="profile" role="tab" data-toggle="tab">Status Barang</a></li>
                        <li role="presentation" class="active" style="float: left;"><a href="#pembayaran" aria-controls="profile" role="tab" data-toggle="tab">Pembayaran</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="alamat" style="padding: 10px;">
                            <h2>Product Description</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.</p>

                            <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="status">
                            <div class="submit-review" style="padding: 10px;">
                              <table cellspacing="0" class="shop_table cart" margin="10px">
                                  <thead>
                                      <tr>
                                          <th class="product-remove">&nbsp;</th>
                                          <th class="product-thumbnail">&nbsp;</th>
                                          <th class="product-name">Product</th>
                                          <th class="product-price">Progres</th>
                                          <th class="product-quantity">Status</th>
                                          <th class="product-subtotal">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php

                                    $n=0;
                                      $q13=mysqli_query($con, "SELECT * FROM `beli` INNER JOIN product ON `beli`.id_product=product.id_product WHERE `beli`.id_user='".$_SESSION['id']."'");
                                      while ($f13=mysqli_fetch_array($q13)) {
                                        # code...
                                        $n++;
                                     ?>
                                      <tr class="cart_item">
                                          <td class="product-remove">
                                            <!-- <?php if($f13['status'] <= 1){ ?> -->
                                            <!-- <a title="Remove this item" class="remove" href="../account/<?php echo $f13['id_order']; ?>.html-del">×</a> -->
                                            <!-- <?php } ?> -->
                                          </td>

                                          <td class="product-thumbnail">
                                              <a href="../detail/<?php echo $f13['nama_product'];?>.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="../../asset/img/<?php echo $f13['gambar'];?>"></a>
                                          </td>

                                          <td class="product-name">
                                            <a href="../detail/<?php echo $f13['nama_product'];?>.html"><?php echo $f13['nama_product'];?></a>
                                          </td>

                                          <td class="product-price"style="width: 30%;">
                                            <?php if ($f13['status']== 0){ ?>

                                              <div class="progress progress-sm active" style="border-radius: 0px; max-height: 20px; height: 10px;">
                                                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 25%">

                                                </div>
                                              </div>
                                            <?php }else if ($f13['status'] == 1) {?>

                                              <div class="progress progress-sm active" style="border-radius: 0px; max-height: 20px; height: 10px;">
                                                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 50%">

                                                </div>
                                              </div>
                                            <?php }else if($f13['status'] == 2){ ?>

                                              <div class="progress progress-sm active" style="border-radius: 0px; max-height: 20px; height: 10px;">
                                                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">

                                                </div>
                                              </div>
                                            <?php }else{
                                              ?>
                                              <div class="progress progress-sm active" style="border-radius: 0px; max-height: 20px; height: 10px;">
                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">

                                                </div>
                                              </div>
                                              <?php
                                            } ?>
                                          </td>

                                          <td class="product-quantity">
                                            <?php if($f13['status'] == 0){ ?>

                                              <span class="label label-warning pull-center">Barang Belum dikonfirmasi</span>
                                            <?php }elseif($f13['status'] == 1){ ?>

                                              <span class="label label-primary pull-center">Barang Dalam Pengiriman</span>
                                            <?php }else{
                                              ?>
                                                    <span class="label label-success pull-center">Barang Telah Diterima</span>
                                              <?php
                                            } ?>
                                          </td>

                                          <td class="product-subtotal">
                                            <?php if($f13['status']==1){?>
                                              <form class="" action="../konfirmasi/barang.html" method="post">
                                                <input type="hidden" name="idb" value="<?php echo $f13['id_beli']; ?>">
                                                <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="hapus">Konfirmasi Barang</button>
                                              </form>
                                          <?php }else if($f13['status']==2){
                                            ?>
                                                <button class="btn btn-success" disabled="">Barang Diterima</button>
                                            <?php
                                          }else{

                                            ?>
                                                <button class="btn btn-warning" disabled="">Konfirmasi Barang</button><?php
                                          }?>
                                          </td>
                                      </tr>
                                      <?php } ?>

                                  </tbody>
                              </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in active" id="pembayaran"style="padding-right:30px; padding-left:30px;">

                          <?php $q14=mysqli_query($con, "SELECT * fROM pembayaran WHERE id_user='".$_SESSION['id']."' and status>='1' ORDER BY tgl_bayar DESC");
                          $f14=mysqli_fetch_array($q14);
                          if(empty($f14['id_pembayaran'])){
                            ?>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                              <i><b>Bank Transfer </b></i> Salah Satu metode pembayaran dengan melakukan transer Langsung dari bank.
                            </p>
                            <?
                          }else{
                           ?>
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
                              <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                  From
                                  <address>
                                    <strong>Admin, Inc.</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (804) 123-5432<br>
                                    Email: info@almasaeedstudio.com
                                  </address>
                                </div><!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                  To
                                  <address>
                                    <strong>John Doe</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (555) 539-1037<br>
                                    Email: john.doe@example.com
                                  </address>
                                </div><!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                  <b>Pembayaran #<?php echo $f14['id_pembayaran']; ?></b><br>
                                  <br>
                                  <b>Order ID:</b> OP<?php echo $f14['id_pembayaran']; ?><br>
                                  <b>Pembayaran Tanggal:</b> <?php echo $f14['tgl_bayar']?><br>
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
                                        <th>Subtotal</th>
                                        <th>Status</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $q15=mysqli_query($con, "SELECT * FROM beli, product WHERE beli.id_product=product.id_product AND beli.id_pembayaran='".$f14['id_pembayaran']."'");
                                      while ($f15=mysqli_fetch_array($q15)) {
                                       ?>
                                      <tr>
                                        <td><?php echo $f15['jumlah_barang'];?></td>
                                        <td><?php echo $f15['nama_product'];?></td>
                                        <td><?php echo uang($f15['jumlah_barang']*$f15['harga_product']);?></td>
                                        <td><?php if ($f15['status']==0) {
                                          # code...
                                          ?>
                                          <span class="label label-warning pull-center">Pending</span>
                                          <?php
                                        }else if($f15['status']== 1){?>
                                          <span class="label label-success pull-center">Accepted</span>
                                        <?php }else{
                                          ?>
                                          <span class="label label-danger pull-center">Rejected</span>
                                          <?php
                                        } ?></td>

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
                                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                    <i><b>Bank Transfer </b></i> Salah Satu metode pembayaran dengan melakukan transer Langsung dari bank.
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
                                </div><!-- /.col --><!-- /.col -->
                              </div><!-- /.row -->

                              <!-- this row will not appear when printing -->
                              <div class="row no-print">
                                <div class="col-xs-12">
                                    <a href="../../struk.html" target="_blank" class="btn btn-info" style="float: right;"><i class="fa fa-print"></i> Print</a>
                                </div>
                              </div>
                            </section>
                            <?php
                          } ?>

                        </div>
                    </div>
                </div>

              </div>
            </div>

            <br><br><br>


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

          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="latest-product">
                      <h2 class="section-title"> Produk Baru</h2>
                      <div class="product-carousel">
                        <?php
                        $table="product ORDER BY tgl_masuk DESC LIMIT 0, 10";
                        $q1=query_all($con, $table);
                        while ($fet=mysqli_fetch_array($q1)) {
                          # code...
                          $jlink = preg_replace("/\s/","-",$fet['nama_product']);
                         ?>
                          <div class="single-product">
                              <div class="product-f-image">
                                  <img src="../../asset/img/<?php echo $fet['gambar']; ?>" alt="">
                                  <div class="product-hover">
                                      <a href="../beli/<?php echo encode($fet['id_product']); ?>.html" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>

                                      <a href="../detail/<?php echo $jlink; ?>.html" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                  </div>
                              </div>

                              <h2><a href="../detail/<?php echo $jlink; ?>.html"><?php echo $fet['nama_product']; ?></a></h2>

                              <div class="product-carousel-price">
                                  <ins><?php echo uang($fet['harga_product']); ?></ins>
                              </div>
                          </div>
                          <?php } ?>

                      </div>
                  </div>
              </div>
          </div>

        </div>
    </div>
</div>
<?php
  }
} ?>
