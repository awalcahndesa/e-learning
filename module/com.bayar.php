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
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>

                <div class="single-sidebar">
                  <h3 id="order_review_heading">Your order</h3>

                  <div id="order_review" style="position: relative;">
                      <table class="shop_table">
                          <thead>
                              <tr>
                                  <th class="product-name">Product</th>
                                  <th class="product-total">Total</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              $q5=mysqli_query($con, "SELECT * FROM `order` INNER JOIN product ON `order`.id_product=product.id_product WHERE `order`.id_user='".$_SESSION['id']."'");
                              while ($f5=mysqli_fetch_array($q5)) {
                              ?>
                              <tr class="cart_item">
                                  <td class="product-name">
                                      <?php echo $f5['nama_product']?> <strong class="product-quantity">× <?php echo $f5['jumlah']; ?></strong> </td>
                                  <td class="product-total">
                                      <span class="amount"><?php echo uang($f5['harga_product']*$f5['jumlah']); ?></span> </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                          <tfoot>

                              <tr class="cart-subtotal">
                                  <th>Cart Subtotal</th>
                                  <td><span class="amount"><?php echo $har;?></span>
                                  </td>
                              </tr>

                              <tr class="shipping">
                                  <th>Shipping and Handling</th>
                                  <td>

                                      Free Shipping
                                      <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                  </td>
                              </tr>


                              <tr class="order-total">
                                  <th>Order Total</th>
                                  <td><strong><span class="amount"><?php echo $har; ?></span></strong> </td>
                              </tr>

                          </tfoot>
                      </table>
                     </div>
                </div>

            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">


                        <form enctype="multipart/form-data" action="../actbayar/" class="checkout" method="post" name="checkout">

                            <div id="customer_details" class="col2-set">
                                <div class="woocommerce-info" style="
                                    float: left;
                                    margin-left: 30px;">
                                    <div class="woocommerce-billing-fields">
                                        <h3>Pembayaran Details</h3>


                                        <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                            <label class="" for="billing_first_name">Nama <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Nama" id="billing_first_name" name="nama" class="input-text " required>
                                        </p>

                                        <p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                            <label class="" for="billing_country">BANK <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <select class="country_to_state country_select" id="billing_country" name="bank" required>
                                                <option value="">Pilih </option>
                                                <option value="BRI">BRI</option>
                                                <option value="BKK">BKK</option>
                                                <option value="BNI">BNI</option>
                                            </select>
                                        </p>
                                        <div class="clear"></div>
                                        <p id="billing_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
                                            <label class="" for="billing_state">No rekening</label>
                                            <input type="text" id="billing_state" name="norek" placeholder="Nomor Rekening" value="" class="input-text ">
                                        </p>
                                        <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                            <label class="" for="billing_city">Atas Nama <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Atas Nama" id="billing_city" name="atas_nama" class="input-text ">
                                        </p>

                                        <p id="billing_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                            <label class="" for="billing_postcode">Nominal <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <?php $q19=mysqli_query($con, "SELECT SUM(`order`.jumlah*`product`.harga_product) AS sum FROM product INNER JOIN `order` ON product.id_product=`order`.id_product WHERE `order`.id_user='".$_SESSION['id']."' AND `order`.status_order= '1'");
                                             $f19=mysqli_fetch_array($q19);?>
                                            <input type="text" value="<?php echo uang($f19['sum']);?>" placeholder="nominal" id="billing_postcode" name="asd" class="input-text " required disabled>
                                        </p>
                                        <input type="hidden" value="<?php echo $f19['sum'];?>" id="billing_postcode" name="j_trans" class="input-text " required>

                                        <div class="clear"></div>

                                        <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                            <label class="" for="billing_phone">Tanggal Bayar <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="date" value="" placeholder="" id="billing_phone" name="tgl_bayar" class="country_to_state country_select" required>
                                        </p>
                                        <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                            <label class="" for="billing_phone">Bukti <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="file" value="" placeholder="" id="billing_phone" name="bukti" class="input-text " required>
                                        </p>
                                        <div class="clear"></div>

                                        <div class="form-row place-order">

                                            <input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt"><br><br>


                                        </div>

                                        <div class="create-account">
                                            <p><small> *) Informasi Ini digunakan untuk mempermudah konfirmasi pembayaran dari admin, sehingga proses dapat pengiriman dapat berjalan lebih cepat.</small></p>

                                            <div class="clear"></div>

                                        </div>

                                    </div>
                                </div>
                            </div>




                                    <div class="clear"></div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
