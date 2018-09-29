
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">USER</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID USER</th>
                <th>Username</th>
                <th>Email</th>
                <th>status</th>
                <th>Detail</th>
                <th>Aksi</th>
              </tr>
            </thead>id_user
            <tbody>
              <?php
              $q17=mysqli_query($con, "SELECT * FROM user WHERE level !='99'");
              while ($f17=mysqli_fetch_array($q17)) {
                # code...
               ?>
              <tr>
                <td><?php echo $f17['id_user'];?></td>
                <td><?php echo $f17['username'];?></td>
                <td><?php echo $f17['email']; ?></td>
                <td><?php $q18=mysqli_query($con, "SELECT COUNT(*) FROM user_detail WHERE id_user='".$f17['id_user']."'");
                $f18=mysqli_fetch_array($q18);
                if ($f18['COUNT(*)'] == 0) {
                  # code...
                  ?>
                  <?php
?>
                  <span class="label label-warning pull-center">Data Belum Lengkap</span>
            <?php    }else{
                  ?>

                                    <span class="label label-success pull-center">Data sudah Lengkap</span>
                  <?php } ?></td>
                <td><a href="#" id="modal"><button class="btn btn-info btn-flat">Detail</button></a></td>
                <td><a href="#" id="modal"><button class="btn btn-warning btn-flat">edit</button></a>
                  <a href="#" id="modal"><button class="btn btn-danger btn-flat">Hapus</button></a></td>
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
              </tr>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
