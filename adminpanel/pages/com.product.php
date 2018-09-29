
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Product</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID product</th>
                <th>nama product</th>
                <th>stok (pcs)</th>
                <th>harga</th>
                <th>info</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $q17=mysqli_query($con, "SELECT * FROM product");
              while ($f17=mysqli_fetch_array($q17)) {
                # code...
               ?>
              <tr>
                <td><?php echo $f17['id_product'];?></td>
                <td><?php echo $f17['nama_product'];?></td>
                <td><?php echo $f17['stok'];?></td>
                <td> <?php echo $f17['harga_product'];?></td>
                <td><a href="#" id="modal"><button class="btn btn-info btn-flat">Detail</button></a></td>
                <td><a href="#" id="modal"><button class="btn btn-warning btn-flat">edit</button></a>
                  <a href="#" id="modal"><button class="btn btn-danger btn-flat">Hapus</button></a></td>
              </tr>
              <?php } ?>

            </tbody>
            <tfoot>
              <tr>
                <th>Id product</th>
                <th>nama product</th>
                <th>Stok (PCS)</th>
                <th>Harga</th>
                <th>Info</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
