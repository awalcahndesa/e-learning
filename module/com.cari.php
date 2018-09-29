<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Hasil Pencarian</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
          <?php

          $q12=mysqli_query($con, "SELECT COUNT(*) FROM product WHERE nama_product LIKE '%".check($con, $_POST['search'])."%' order by id_product DESC");
          $f12=mysqli_fetch_array($q12);
          ?>
          <div class="col-md-12">
            <h3>Hasil Pencarian dari "<?php echo check($con, $_POST['search']); ?>" (<?php echo $f12['COUNT(*)']; ?>) :
              <br></h3>
              <br><br>
          </div>
          <?php
          if($f12['COUNT(*)'] >= 1){
          $q9=mysqli_query($con, "SELECT  * FROM product WHERE nama_product LIKE '%".check($con, $_POST['search'])."%' order by id_product DESC");



          while ($f9 =  mysqli_fetch_array($q9)) {
            # code...
            $jlink = preg_replace("/\s/","-",$f9['nama_product']);
          ?>

            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <img src="../../asset/img/<?php echo $f9['gambar']; ?>" alt="" style="max-width: 200px; width: 100%; max-height: 250px; height: 100%; ">
                    </div>
                    <h2><a href="../detail/<?php echo $jlink; ?>.html"><?php echo $f9['nama_product']; ?></a></h2>
                    <div class="product-carousel-price">
                        <ins><?php echo uang($f9['harga_product']); ?></ins>
                    </div>

                    <div class="product-option-shop">
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="">Add to cart</a>
                    </div>
                </div>
            </div>
            <?php } ?>
          </div>


        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                      <ul class="pagination">
                        <li>
                          <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                          <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                </div>
            </div>
        </div>
        <?php } else {

        }?>
    </div>
</div>
