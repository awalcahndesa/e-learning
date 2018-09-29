

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Login & Register</h2>
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
                        <div class="woocommerce-danger"><?php echo $_SESSION['error']; ?>
                        </div>
                      </div>
                    </div>
              </div>
                <div class="col-md-6">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <div class="woocommerce-info">Sudah Punya Akun ? Login Dibawah
                            </div>

                            <form id="login-form-wrap" action="../actlogin/login.html" class="login" method="post">




                                <p class="form-row form-row-last">
                                    <label for="password">Email <span class="required">*</span>
                                    </label>
                                    <input type="email" id="username" name="email" class="input-text" required placeholder="Email">
                                </p>
                                <p class="form-row form-row-last">
                                      <label for="password">Password <span class="required">*</span>
                                      </label>
                                      <input type="password" id="password" name="password" class="input-text" required>
                                  </p>
                                <div class="clear"></div>


                                <p class="form-row">
                                    <input type="submit" value="Login" name="login" class="button">
                                        </p>
                                <div class="clear"></div>
                            </form>
</div>
</div>
</div>
<div class="col-md-6">
    <div class="product-content-right">
        <div class="woocommerce">
            <div class="woocommerce-info">User Baru ? Daftar Disini</div>

            <form id="login-form-wrap" class="login" action="../actlogin/register.html" method="post">


                <p class="form-row form-row-first">
                    <label for="username">Username <span class="required">*</span>
                    </label>
                    <input type="text" id="username" name="username" class="input-text" placeholder="Username" required>
                </p>
                <p class="form-row form-row-first">
                    <label for="username">email <span class="required">*</span>
                    </label>
                    <input type="email" id="username" name="email" class="input-text" placeholder="Email" required>
                </p>
                <p class="form-row form-row-last">
                    <label for="password">Password <span class="required">*</span>
                    </label>
                    <input type="password" id="password" name="password" class="input-text" required placeholder="******">
                </p>
                <div class="clear"></div>


                <p class="form-row">
                    <input type="submit" value="register" name="register" class="button">
                  </p>


                <div class="clear"></div>
            </form>
</div>
</div>
</div>
</div>
</div>
</div>
