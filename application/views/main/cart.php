<!-- Breadcrumb Start-->
<div class="breadcrumbs-wrapper breadcumbs-bg1">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs breadcrumbs-style1 sep1 posr">
                    <ul>
                        <li>
                            <div class="breadcrumbs-icon1">
                                <a href="<?= site_url("Main"); ?>" title="Return to home"><i class="fa fa-home"></i></a>
                            </div>
                        </li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row" id="refresh-box">
        <!--Middle Part Start-->
        <div id="content" style="padding-left:20%;padding-right:20%; margin-bottom : 10vh;" class="col-sm-12">
            <h1 class="title">Shopping Cart</h1>
            <div class="table-responsive">
                <table class="table table-bordered" style="background:#fff;">
                    <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Model</td>
                            <td class="text-left">Quantity</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($cart)) {
                            foreach ($cart as $row) {
                                ?>
                                <tr>
                                    <td class="text-center"><a href="<?= base_url() ?>main/product/<?= $row['product_id'] ?>"><img src="<?= base_url() . $row['thumbnail'] ?>" class="xs-thumbnail" /></a></td>
                                    <td class="text-left"><a href="<?= base_url() ?>main/product/<?= $row['product_id'] ?>"><?= $row['product_name'] ?></a><br />
                                    <td class="text-left"><?= $row['model'] ?></td>
                                    <td class="text-left">
                                        <form class="edit-cart-item-form" method="POST" action="<?= base_url() ?>main/edit_cart_item/<?= $row['product_id'] ?>/<?= $row['model_id'] ?>">
                                            <div class="input-group btn-block quantity">
                                                <input type="number" name="quantity" value="<?= $row['quantity'] ?>" class="form-control" style="width:5vw;"/>
                                                <span class="input-group-btn">
                                                    <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                                                    <a class="delete-cart-item-button" data-product="<?= $row['product_id'] ?>" data-model="<?= $row['model_id'] ?>" href="<?= base_url() ?>main/delete_cart_item/<?= $row['product_id'] ?>/<?= $row['model_id'] ?>"><button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-times-circle"></i></button></a>
                                                </span>
                                                <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                                                <input type="hidden" name="model_id" value="<?= $row['model_id'] ?>">
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-right">RM<?= number_format($row['price'], 2) ?></td>
                                    <td class="text-right">RM<?= number_format($row['total'], 2) ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="5" class="text-right">Subtotal</td>
                            <td class="text-right">RM<?= number_format($subtotal, 2) ?></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Discount</td>
                            <?php
                            if (isset($discount)) {
                                ?>
                                <td class="text-right">-(<?= $discount_percentage ?>%) RM<?= number_format($discount, 2) ?></td>
                                <?php
                            } else {
                                ?>
                                <td class="text-right">-(0%) RM0.00</td>
                                <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Total</td>
                            <td class="text-right">RM<?= number_format($total, 2) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
            if ($this->session->has_userdata('cart')) {
                ?>
                <h2 class="subtitle">What would you like to do next?</h2>
                <div class="row">
                    <div class="col-sm-6 margin-bottom">
                        <h4 class="panel-title">Use Discount Code</h4>
                        <br/>
                        <?php if (!empty($this->session->flashdata('discount_error'))) { ?>
                            <div class='alert alert-danger alert-dismissable align-center' style="margin-left:10%;margin-right:10%;">
                                <?php echo $this->session->flashdata('discount_error'); ?>
                            </div>
                        <?php } ?>
                        <?php
                        if ($this->session->has_userdata('promotion')) {
                            ?>
                            <label>Discount Code</label>
                            <div class="input-group">
                                <input type="text" name="code" placeholder="Enter your discount code here" id="input-coupon" class="form-control" value="<?= $this->session->userdata('promotion')['code'] ?>" disabled/>
                                <span class="input-group-btn">
                                    <input type="submit" value="Apply Discount" id="button-coupon" data-loading-text="Loading..."  class="btn btn-primary" disabled/>
                                </span>
                            </div>
                            <?php
                        } else {
                            ?>
                            <form id="add-discount-form" method="POST" action="<?= base_url() ?>main/add_discount">
                                <label>Discount Code</label>
                                <div class="input-group">
                                    <input type="text" name="code" placeholder="Enter your discount code here" id="input-coupon" class="form-control" />
                                    <span class="input-group-btn">
                                        <input type="submit" value="Apply Discount" id="button-coupon" data-loading-text="Loading..."  class="btn btn-primary" required/>
                                    </span>
                                </div>
                            </form>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="col-sm-6 margin-bottom">
                        <h4 class="panel-title">Checkout</h4>
                        <br/>
                        <?php if (!empty($this->session->flashdata('checkout_error'))) { ?>
                            <div class='alert alert-danger alert-dismissable align-center' style="margin-left:10%;margin-right:10%;">
                                <?php echo $this->session->flashdata('checkout_error'); ?>
                            </div>
                        <?php } ?>
                        <?php
                        if ($this->session->has_userdata('user_id')) {
                            ?>
                            <form id="checkout-form" method="POST" action="<?= base_url() ?>main/checkout">

                                <br/>

                                <label>Please select the perferred payment method to use on this payment</label><br>
                                <input type="radio" name="payment" required value="Manual bank transfer"> Manual Bank Transfer / Cash Deposit<br>
                                <input type="radio" name="payment" required value="Cash on delivery"> Cash on delivery (only for Subang Jaya, Sunway, Sungai Buloh)<br>


                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control" value="<?= $user['name'] ?>"/>
                                <label>Contact Number</label>
                                <input type="text" name="contact" placeholder="Contact Number" class="form-control" value="<?= $user['contact'] ?>"/>
                                <label>Shipping Address</label>
                                <textarea name="address" placeholder="Address" class="form-control" rows="5"/><?= $user['address'] ?></textarea>
                                <label>City</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="city" placeholder="City" value="<?= $user['city'] ?>" required>
                                </div>
                                <label>Post Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="postcode" placeholder="Post Code" value="<?= $user['postcode'] ?>" required>
                                </div>
                                <label>Region / State</label>
                                <select name="state" class="form-control" required>
                                    <option value=""> --- Please Select --- </option>
                                    <option value="Johor" <?php if ($user['state'] == "Johor") {echo 'selected';}?>>Johor</option>
                                    <option value="Kedah" <?php if ($user['state'] == "Kedah") {echo 'selected';}?>>Kedah</option>
                                    <option value="Kelantan" <?php if ($user['state'] == "Kelantan") {echo 'selected';}?>>Kelantan</option>
                                    <option value="Labuan" <?php if ($user['state'] == "Labuan") {echo 'selected';}?>>Labuan</option>
                                    <option value="Melaka" <?php if ($user['state'] == "Melaka") {echo 'selected';}?>>Melaka</option>
                                    <option value="Negeri Sembilan" <?php if ($user['state'] == "Negeri Sembilan") {echo 'selected';}?>>Negeri Sembilan</option>
                                    <option value="Pahang" <?php if ($user['state'] == "Pahang") {echo 'selected';}?>>Pahang</option>
                                    <option value="Perak" <?php if ($user['state'] == "Perak") {echo 'selected';}?>>Perak</option>
                                    <option value="Perlis" <?php if ($user['state'] == "Perlis") {echo 'selected';}?>>Perlis</option>
                                    <option value="Pulau Pinang" <?php if ($user['state'] == "Pulau Pinang") {echo 'selected';}?>>Pulau Pinang</option>
                                    <option value="Sabah" <?php if ($user['state'] == "Sabah") {echo 'selected';}?>>Sabah</option>
                                    <option value="Sarawak" <?php if ($user['state'] == "Sarawak") {echo 'selected';}?>>Sarawak</option>
                                    <option value="Selangor" <?php if ($user['state'] == "Selangor") {echo 'selected';}?>>Selangor</option>
                                    <option value="Terengganu" <?php if ($user['state'] == "Terengganu") {echo 'selected';}?>>Terengganu</option>
                                    <option value="Wilayah Persekutuan" <?php if ($user['state'] == "Wilayah Persekutuan") {echo 'selected';}?>>Wilayah Persekutuan</option>
                                </select>
                                <br/>
                                <button type="submit" class="btn btn-primary pull-right">Proceed to Payment</button>
                            </form>
                        </div>
                        </form>
                        <?php
                    } else {
                        ?>
                        <br>
                        <a data-toggle="modal" data-target="#login-modal" class="btn btn-primary" style="margin-top:1%">Login</a>
                        <a data-toggle="modal" data-target="#register-modal" class="btn btn-primary" style="margin-top:1%">Register</a>
                        <hr>
                        <form id="checkout-form" method="POST" action="<?= base_url() ?>main/guestCheckout">

                        <p class="panel-title">or proceed with guest account</p>
                        <br>
                        <p style="color:red;">* Please remember you cannot check your purchase history without account and please write down your order id after checkout</p>
                        <br>
                        <br>

                            <label>Please select the perferred payment method to use on this payment</label><br>
                            <input type="radio" name="payment" required value="Manual bank transfer"> Manual Bank Transfer / Cash Deposit<br>
                            <input type="radio" name="payment" required value="Cash on delivery"> Cash on delivery (only for Subang Jaya, Sunway, Sungai Buloh)<br>


                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control"/>
                            <label>Contact Number</label>
                            <input type="text" name="contact" placeholder="Contact Number" class="form-control"/>
                            <label>Shipping Address</label>
                            <textarea name="address" placeholder="Address" class="form-control" rows="5"/></textarea>
                            <label>City</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="city" placeholder="City" required>
                            </div>
                            <label>Post Code</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="postcode" placeholder="Post Code" required>
                            </div>
                            <label>Region / State</label>
                            <select name="state" class="form-control" required>
                                <option value=""> --- Please Select --- </option>
                                <option value="Johor">Johor</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Labuan">Labuan</option>
                                <option value="Melaka">Melaka</option>
                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Perak">Perak</option>
                                <option value="Perlis">Perlis</option>
                                <option value="Pulau Pinang">Pulau Pinang</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Terengganu">Terengganu</option>
                                <option value="Wilayah Persekutuan" >Wilayah Persekutuan</option>
                            </select>
                            <br/>
                            <div class="checkbox checkoutRead">
                                <label>
                                    I have read and agree to the <a href="<?= site_url("Main/term"); ?>">Terms & Conditions</a><input type="checkbox" name="read" value="read" required>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Proceed to Payment</button>
                        </form>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <!--Middle Part End -->
    </div>
</div>
</div>
<!-- jquery latest version -->
<script src="http://localhost/acom/js/vendor/jquery-1.12.0.min.js"></script>
<script>
    
    $(document).on('submit', '.edit-cart-item-form', function (e) {
        e.preventDefault();
        var quantity = $(this).find('[name=quantity]').val();
        var product_id = $(this).find('[name=product_id]').val();
        var model_id = $(this).find('[name=model_id]').val();

        postParam = {
            quantity: quantity
        }

        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>main/edit_cart_item/' + product_id + '/' + model_id,
            data: postParam,
            success: function (data) {
                $("#refresh-box").load(location.href + " #refresh-box");
                $.alert({
                    title: 'Cart item updated',
                    content: 'Click ok to continue',
                });
            }, error: function () {
                alert('update failed');
            }
        });
    });

    $(document).on('submit', '#add-discount-form', function (e) {
        e.preventDefault();
        var code = $(this).find("[name='code']").val();

        postParam = {
            code: code
        }

        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>main/add_discount/',
            data: postParam,
            success: function (data) {
                $("#refresh-box").load(location.href + " #refresh-box");
                $.alert({
                    title: 'Discount added',
                    content: 'Click ok to continue',
                });
            }, error: function () {
                alert('update failed');
            }
        });
    });
</script>
