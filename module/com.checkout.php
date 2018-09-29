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
                    <h2> Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="woocommerce">

                      <?php
                      $user=$_SESSION['id'];
                       $q7=mysqli_query($con, "SELECT COUNT(*) FROM user_detail WHERE id_user='".$user."'");
                       $f7=mysqli_fetch_array($q7);
                       if ($f7['COUNT(*)']<= 0) {
                       ?>
                        <form enctype="multipart/form-data" action="../alamat/" class="checkout" method="post" name="checkout">

                            <div id="customer_details" class="col2-set">
                                <div class="woocommerce-info" style="
                                background: #fff;
                                border: solid 0.002px;
                                    float: left;
                                    margin-left: 20px;">
                                    <div class="woocommerce-billing-fields" >

                                       <h3>Isikan Profil Anda</h3>



                                        <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                            <label class="" for="billing_first_name">Nama Depan <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Nama Depan" id="billing_first_name" name="ndepan" class="input-text " required>
                                        </p>

                                        <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                            <label class="" for="billing_last_name">Nama Belakang
                                            </label>
                                            <input type="text" value="" placeholder="Nama Belakang" id="billing_last_name" name="nbelakang" class="input-text " required>
                                        </p>
                                        <p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                            <label class="" for="billing_country">Jenis Kelamin <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <select class="country_to_state country_select" id="billing_country" name="jenis_kelamin" required>
                                                <option value="">Pilih </option>
                                                <option value="1">Laki Laki</option>
                                                <option value="2">Wanita</option>
                                            </select>
                                        </p>
                                        <div class="clear"></div>

                                        <p id="billing_company_field" class="form-row form-row-wide">
                                            <label class="country_to_state country_select" for="billing_company">Tanggal Lahir</label>
                                            <input type="date" value="" placeholder="" id="billing_company" name="ttl" class="country_to_state country_select ">
                                        </p>

                                        <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                            <label class="" for="billing_address_1">Alamat <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <textarea name="alamat" class="input-text " placeholder="Alamat Anda" required></textarea>
                                        </p>

                                        <p id="billing_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
                                            <label class="" for="billing_state">Provinsi</label>
                                            <input type="text" id="billing_state" name="provinsi" placeholder="State / County" value="" class="input-text ">
                                        </p>
                                        <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                            <label class="" for="billing_city">Kota <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Town / City" id="billing_city" name="kota" class="input-text ">
                                        </p>

                                        <p id="billing_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                            <label class="" for="billing_postcode">Kode Pos <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Kode Pos" id="billing_postcode" name="kodepos" class="input-text " required>
                                        </p>

                                        <div class="clear"></div>

                                        <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                            <label class="" for="billing_phone">No Telephone <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="" id="billing_phone" name="nohp" class="input-text " required>
                                        </p>
                                        <div class="clear"></div>


                                        <div class="create-account">
                                            <p><span>Informasi ini Digunakan Untuk pengiriman barang. Jadi tolong isi dengan benar dan Jelas</span></p>

                                            <div class="clear"></div>
                                        </div>
                                      </div>
                                        <div id="order_review" style="position: relative; ">
                                            <table class="shop_table">
                                                <thead>
                                                    <tr>
                                                        <th class="product-name">Product</th>
                                                        <th class="product-total">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $q5=mysqli_query($con, "SELECT * FROM `order` INNER JOIN product ON `order`.id_product=product.id_product WHERE `order`.id_user='".$_SESSION['id']."' AND `order`.status_order =0");
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
                                                        <td><strong><span class="amount"><?php echo $har;?></span></strong> </td>
                                                    </tr>

                                                </tfoot>
                                            </table>


                                            <div id="payment">
                                                <ul class="payment_methods methods">
                                                    <li class="payment_method_bacs">
                                                        <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                        <label for="payment_method_bacs">Direct Bank Transfer </label>
                                                        <div class="payment_box payment_method_bacs">
                                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                        </div>
                                                    </li>
                                                    <li class="payment_method_cheque">
                                                        <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                                        <label for="payment_method_cheque">Cheque Payment </label>
                                                        <div style="display:none;" class="payment_box payment_method_cheque">
                                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                        </div>
                                                    </li>
                                                </ul>

                                                <div class="form-row place-order">

                                                    <input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                                </div>

                                                <div class="clear"></div>

                                            </div>
                                        </div>

                                        <?php }else {
                                          header("location:../cadd/");
                                          ?>
                                          <div id="customer_details" class="col2-set">
                                              <div class="col-1" style="
                                                  float: left;
                                                  margin-left: 30px;">
                                                  <div class="woocommerce-billing-fields">

                                                     <h3>Details Pengiriman</h3>

                                                     <div id="order_review" style="position: relative;">
                                                         <table class="shop_table">
                                                             <thead>

                                                             </thead>
                                                             <tbody>
                                                                 <?php
                                                                 $q8=mysqli_query($con, "SELECT * FROM `user_detail` WHERE id_user='".$_SESSION['id']."'");
                                                                 $f8=mysqli_fetch_array($q8);   ?>

                                                             </tbody>
                                                             <tfoot>

                                                                 <tr class="cart-subtotal">
                                                                     <th>Nama Lengkap</th>
                                                                     <td><strong><span class="amount"><?php echo $f8['nama_depan']." ".$f8['nama_belakang'];?></span></strong>
                                                                     </td>
                                                                 </tr>

                                                                 <tr class="shipping">
                                                                     <th>Alamat</th>
                                                                     <td>

                                                                      <strong><span class="amount"><?php echo $f8['alamat'];?></span></strong> </td>
                                                                 </tr>


                                                                 <tr class="order-total">
                                                                     <th>Jenis Kelamin</th>
                                                                     <td><strong><span class="amount"><?php if ($f8['jenis_kelamin']== '1') {
                                                                       # code...
                                                                       echo "Laki-Laki";
                                                                     }else {
                                                                       echo "Perempuan";
                                                                     }?></span></strong> </td>
                                                                 </tr>
                                                                 <tr class="order-total">
                                                                     <th>Kota</th>
                                                                     <td><strong><span class="amount"><?php echo $f8['kabupaten'];?></span></strong> </td>
                                                                 </tr>
                                                                 <tr class="order-total">
                                                                     <th>provinsi</th>
                                                                     <td><strong><span class="amount"><?php echo $f8['provinsi'];?></span></strong> </td>
                                                                 </tr>
                                                                 <tr class="order-total">
                                                                     <th>Kode Pos</th>
                                                                     <td><strong><span class="amount"><?php echo $f8['kodepos'];?></span></strong> </td>
                                                                 </tr>

                                                             </tfoot>
                                                         </table>




                                                                                         </div>
                                                                                     </div>

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
                                                                                             $q5=mysqli_query($con, "SELECT * FROM `order` INNER JOIN product ON `order`.id_product=product.id_product WHERE `order`.id_user='".$_SESSION['id']."' AND `order`.status_order= 0");
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
                                                                                                 <td><strong><span class="amount"><?php echo $har;?></span></strong> </td>
                                                                                             </tr>

                                                                                         </tfoot>
                                                                                     </table>


                                                                                     <div id="payment">
                                                                                         <ul class="payment_methods methods">
                                                                                             <li class="payment_method_bacs">
                                                                                                 <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                                                                 <label for="payment_method_bacs">Direct Bank Transfer </label>
                                                                                                 <div class="payment_box payment_method_bacs">
                                                                                                     <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                                                                 </div>
                                                                                             </li>
                                                                                             <li class="payment_method_cheque">
                                                                                                 <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                                                                                 <label for="payment_method_cheque">Cheque Payment </label>
                                                                                                 <div style="display:none;" class="payment_box payment_method_cheque">
                                                                                                     <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                                                                 </div>
                                                                                             </li>
                                                                                         </ul>

                                                                                         <div class="form-row place-order">
                                                                                           <form action="../cadd/" method="post">
                                                                                             <button type="submit" class="button alt">Masukan Ke daftar Beli</button>
                                                                                           </form>

                                                                                         </div>

                                                                                         <div class="clear"></div>

                                                                                     </div>
                                                                                 </div>

                                          <?php
                                        }
                                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
