<?php
if (empty($_SESSION['id'])) {
  # code...
  header("location:../login/");
}else{ ?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="#">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    <div class="thubmnail-recent">
                        <img src="../../asset/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins> <del>$800.00</del>
                        </div>
                    </div>
                    <div class="thubmnail-recent">
                        <img src="../../asset/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins> <del>$800.00</del>
                        </div>
                    </div>
                    <div class="thubmnail-recent">
                        <img src="../../asset/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins> <del>$800.00</del>
                        </div>
                    </div>
                    <div class="thubmnail-recent">
                        <img src="../../asset/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins> <del>$800.00</del>
                        </div>
                    </div>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Posts</h2>
                    <ul>
                        <li><a href="#">Sony Smart TV - 2015</a></li>
                        <li><a href="#">Sony Smart TV - 2015</a></li>
                        <li><a href="#">Sony Smart TV - 2015</a></li>
                        <li><a href="#">Sony Smart TV - 2015</a></li>
                        <li><a href="#">Sony Smart TV - 2015</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $q5=mysqli_query($con, "SELECT * FROM `order` INNER JOIN product ON `order`.id_product=product.id_product WHERE `order`.id_user='".$_SESSION['id']."' AND `order`.status_order= '0'");
                                    while ($f5=mysqli_fetch_array($q5)) {
                                      # code...
                                      if(empty($f5['id_order'])){
                                        $p= 0;

                                      }

                                   ?>
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a title="Remove this item" class="remove" href="../cart-option/<?php echo encode($f5['id_order']); ?>.html/del">×</a>
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="../detail/<?php echo $f5['nama_product'];?>.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="../../asset/img/<?php echo $f5['gambar'];?>"></a>
                                        </td>

                                        <td class="product-name">
                                          <a href="../detail/<?php echo $f5['nama_product'];?>.html"><?php echo $f5['nama_product'];?></a>
                                        </td>

                                        <td class="product-price">
                                            <span class="amount"><?php echo uang($f5['harga_product']); ?></span>
                                        </td>

                                        <td class="product-quantity">
                                          <div class="quantity buttons_added">
                                          <table style="border: solid 0.5px;">
                                            <tr>
                                              <td>
                                                <form action="../cart-option/<?php echo encode($f5['id_order']); ?>.html" method="POST">
                                                <input type="submit" value="-" name="act">
                                                </form>
                                              </td>
                                              <td>
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo $f5['jumlah']; ?>" min="0" step="1" disabled="">

                                              </td>
                                              <td>
                                                <form action="../cart-option/<?php echo encode($f5['id_order']); ?>.html" method="POST">
                                              <input type="submit" value="+" name="act">
                                              </form>
                                              </td>
                                            </tr>
                                          </table>


                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount"><?php echo uang($f5['harga_product']*$f5['jumlah']); ?></span>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <tr>

                                        <td class="actions" colspan="6">
                                          <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="../checkout/" style="height: 40px; padding-top: 10px; float: right;" disa>CHECKOUT</a>
                                          <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="../all/" style="height: 40px; padding-top: 10px; float: right; margin-right: 10px;">KEMBALI BELANJA</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                        <div class="cart-collaterals">


                        <div class="cross-sells">
                            <h2>You may be interested in...</h2>
                            <ul class="products">
                                <li class="product">
                                    <a href="single-product.html">
                                        <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="../../asset/img/product-2.jpg">
                                        <h3>Ship Your Idea</h3>
                                        <span class="price"><span class="amount">£20.00</span></span>
                                    </a>

                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                </li>

                                <li class="product">
                                    <a href="single-product.html">
                                        <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="../../asset/img/product-4.jpg">
                                        <h3>Ship Your Idea</h3>
                                        <span class="price"><span class="amount">£20.00</span></span>
                                    </a>

                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                </li>
                            </ul>
                        </div>


                        <div class="cart_totals ">
                            <h2>Cart Totals</h2>

                            <table cellspacing="0">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount"><?php echo $har;?></span></td>
                                    </tr>

                                    <tr class="shipping">
                                        <th>Shipping and Handling</th>
                                        <td>Free Shipping</td>
                                    </tr>

                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="amount"><?php echo $har ?></span></strong> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
