<!-- Breadcrumb Start-->
<ul class="breadcrumb">
    <li><a href="<?= base_url() ?>main"><i class="fa fa-home"></i></a></li>
    <li><a href="<?= base_url() ?>main/cart">Shopping Cart</a></li>
</ul>
<div class="row" id="refresh-box">
    <!--Middle Part Start-->
    <div id="content" class="col-sm-12">
        <h1 class="title">Shopping Cart</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
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
                                            <input type="number" name="quantity" value="<?= $row['quantity'] ?>" class="form-control" />
                                            <span class="input-group-btn">
                                                <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                                                <a class="delete-cart-item-button" data-product="<?= $row['product_id'] ?>" data-model="<?= $row['model_id'] ?>" href="<?= base_url() ?>main/delete_cart_item/<?= $row['product_id'] ?>/<?= $row['model_id'] ?>"><button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-times-circle"></i></button></a>
                                            </span>
                                            <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                                            <input type="hidden" name="model_id" value="<?= $row['model_id'] ?>">
                                        </div>
                                    </form>
                                </td>
                                <td class="text-right">RM<?= $row['price'] ?></td>
                                <td class="text-right">RM<?= $row['total'] ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="5" class="text-right">Subtotal</td>
                        <td class="text-right">RM<?= $subtotal ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">Discount</td>
                        <?php
                        if (isset($discount)) {
                            ?>
                            <td class="text-right">-(<?= $discount_percentage ?>%) RM<?= $discount ?></td>
                            <?php
                        } else {
                            ?>
                            <td class="text-right">-(0%) RM0</td>
                            <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">Total</td>
                        <td class="text-right">RM<?= $total ?></td>
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
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control" value="<?= $user['name'] ?>"/>
                            <label>Contact Number</label>
                            <input type="text" name="contact" placeholder="Contact Number" class="form-control" value="<?= $user['contact'] ?>"/>
                            <label>Shipping Address</label>
                            <textarea name="address" placeholder="Address" class="form-control" rows="5"/><?= $user['address'] ?></textarea>
                            <br/>
                            <button type="submit" class="btn btn-primary pull-right">Proceed to Payment</button>
                        </form>
                    </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <a data-toggle="modal" data-target="#login-modal" class="btn btn-primary">Login</a>
                    <a data-toggle="modal" data-target="#register-modal" class="btn btn-primary">Register</a>
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

    $(document).on('click', '.delete-cart-item-button', function (e) {
        e.preventDefault();
        var product_id = $(this).data('product');
        var model_id = $(this).data('model');

        $.confirm({
            title: 'Delete cart item.',
            content: 'Are you sure you want to delete this item from your cart? Deleted items will be permanetly deleted',
            buttons: {
                confirm: function () {

                    postParam = {
                        product_id: product_id,
                        model_id: model_id
                    }

                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() ?>main/delete_cart_item/' + product_id + '/' + model_id,
                        data: postParam,
                        success: function (data) {
                            $("#refresh-box").load(location.href + " #refresh-box");
                            $.alert({
                                title: 'Cart item deleted',
                                content: 'Click ok to continue',
                            });
                        }, error: function () {
                            alert('delete failed');
                        }
                    });
                },
                cancel: function () {
                    $.alert('Canceled!');
                }
            }
        });
    });

    $(document).on('submit', '#add-discount-form', function (e) {
        e.preventDefault();
        var code = $(this).find('[name=code]').val();

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
