
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Pembayaran</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID pembayaran</th>
                <th>Nama Product</th>
                <th>Jumlah</th>
                <th>Jumlah Bayar</th>
                <th>Progres</th>
                <th>detail</th>
                <th>status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $q17=mysqli_query($con, "SELECT * FROM beli, product where beli.id_product = product.id_product");
              while ($f17=mysqli_fetch_array($q17)) {
                # code...
               ?>
              <tr>
                <td><?php echo $f17['id_pembayaran'];?></td>
                <td><?php echo $f17['nama_product'];?></td>
                <td><?php echo $f17['jumlah_barang'];?></td>
                <td> <?php echo uang($f17['harga_product']*$f17['jumlah_barang']);?></td>
                <td>   <?php if($f17['status']== 0){ ?>
                                    <div class="progress progress-sm active" style="border-radius: 0px; max-height: 20px; height: 10px;">
                                      <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                      </div>
                                    </div>
                              <?php }elseif($f17['status']== 1){ ?>
                                    <div class="progress progress-sm active" style="border-radius: 0px; max-height: 20px; height: 10px;">
                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                        </div>
                                    </div>
                            <?php }else{
                              ?>
                              <div class="progress progress-sm active" style="border-radius: 0px; max-height: 20px; height: 10px;">
                                  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                  </div>
                              </div>
                              <?php
                            }?>
                        </td>
                <td>

                  <?php if ($f17['status']== '0') {
                    # code...
                    ?>
                    <span class="label label-warning pull-center">Belum Dikirim</span>
                    <?php
                  }elseif($f17['status']== '1'){ ?>
                    <span class="label label-info pull-center">mengirim</span>
                    <?php
                  }else{ ?>
                    <span class="label label-success pull-center">Diterima</span>
                    <?php
                  }?>

                </td>

                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#details-modal<?php echo $f17['id_pembayaran'];?>"><i class="fa fa-info"></i></button>

                    <!-- Modal -->
                    <div id="details-modal<?php echo $f17['id_pembayaran'];?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b><?php echo $f17['nama'];?></b></h4>
                          </div>
                          <div class="modal-body">
                            <table class="table table-snipped">
                              <tr>
                                <th>ID PEMBAYARAN</th><td><?php echo $f17['id_pembayaran'];?></td>
                              </tr>
                              <tr>
                                <th>ID USER</th><td><?php echo $f17['id_user'];?></td>
                              </tr>
                              <tr>
                                <th>JUMLAH BAYAR</th><td><?php echo uang($f17['total']);?></td>
                              </tr>
                              <tr>
                                <th>BANK</th><td><?php echo $f17['bank'];?></td>
                              </tr>
                              <tr>
                                <th>REKENING</th><td><?php echo $f17['rek'];?></td>
                              </tr>

                              <tr>
                                <th>Barang</th><td>
                                    <table class="table table-hover table-border">
                                      <thead><tr><th>nama product</th><th>harga</th><th>status</th></tr></thead>
                                      <tbody>
                                        <?php $aq2=mysqli_query($con, "SELECT * FROM beli, product where beli.id_product = product.id_product AND id_pembayaran='".$f17['id_pembayaran']."'");
                                        while ($af2=mysqli_fetch_array($aq2)) {
                                          # code...
                                         ?>
                                         <tr>
                                            <td>
                                            <?php echo $af2['nama_product']; ?>
                                            </td>

                                            <td>
                                              <?php echo $af2['harga_product']*$af2['jumlah_barang']; ?>
                                            </td>
                                            <td>

                                              <?php if ($af2['status']== '0') {
                                                # code...
                                                ?>
                                                <span class="label label-warning pull-center">Menunggu</span>
                                                <?php
                                              }elseif($af2['status']== '1'){ ?>
                                                <span class="label label-info pull-center">mengirim</span>
                                                <?php
                                              }else{ ?>
                                                <span class="label label-success pull-center">terkirim</span>
                                                <?php
                                              }?>
                                            </td>
                                          </tr>
                                        <?php
                                      } ?>
                                      </tbody>
                                    </table>
                                  </td>
                              </tr>
                            </table>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                </td>
                <td>
                  <div class="row">
                    <div class="col-xs-6">

                    <?php if ($f17['status']== 0) {
                      # code...
                      ?>
                      <form class="" action="../konfirmasi/kirim" method="post">
                        <input type="hidden" name="idb" value="<?php echo $f17['id_beli']; ?>">
                        <button type="submit" class="btn btn-warning" data-toggle="tooltip" title="konfirmasi"><i class="fa fa-edit"></i></button>
                      </form> <?php
                    }else{ ?>
                      <a href="#" id="modal"><button class="btn btn-success" data-toggle="tooltip" title="Konfirmasi"><i class="fa fa-check"></i></button></a>
                      <?php } ?>
                    </div>
                    <div class="col-xs-6">
                    <form class="" action="../konfirmasi/hapusbeli" method="post">
                      <input type="hidden" name="idb" value="<?php echo $f17['id_beli']; ?>">
                      <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="hapus"><i class="fa fa-remove"></i></button>
                    </form>
                  </div>
                  </div>
                  </tr>
              <?php } ?>

            </tbody>
            <tfoot>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
