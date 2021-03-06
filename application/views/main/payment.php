<!-- Breadcrumb Start-->
<ul class="breadcrumb">
    <li><a href="<?= base_url() ?>main"><i class="fa fa-home"></i></a></li>
</ul>
<div class="row" id="refresh-box">
    <!--Middle Part Start-->
    <div id="content" style="padding-left:20%;padding-right:20%; margin-bottom : 10vh;" class="col-sm-12">
        <h1 class="title">Order Successful <small><?php echo "Order ID: #". $order['order_id']; ?></small></h1>
        <div class="table-responsive">
            <table class="table table-bordered"  style="background:#fff;">
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
                    if (!empty($order['products'])) {
                        foreach ($order['products'] as $row) {
                            ?>
                            <tr>
                                <td class="text-center"><a href="<?= base_url() ?>main/product/<?= $row['product_id'] ?>"><img src="<?= base_url() . $row['thumbnail'] ?>" class="xs-thumbnail" /></a></td>
                                <td class="text-left"><a href="<?= base_url() ?>main/product/<?= $row['product_id'] ?>"><?= $row['product_name'] ?></a><br />
                                <td class="text-left"><?= $row['model'] ?></td>
                                <td class="text-left"><?= $row['quantity'] ?></td>
                                <td class="text-right">RM<?= $row['price'] ?></td>
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
                        if (!empty($order['discount'])) {
                            ?>
                            <td class="text-right">-(<?= $order['discount'] ?>%) RM<?= $discount ?></td>
                            <?php
                        } else {
                            ?>
                            <td class="text-right">-(0%) RM0.00</td>
                            <?php
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">Shipping Fees</td>
                        <td class="text-right">RM<?= number_format($order['shipping'], 2) ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">Total</td>
                        <td class="text-right">RM<?= number_format($order['total'] , 2)?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr/>
        <div style="text-align : center">
            <img src="http://3.bp.blogspot.com/-tbF4XTJuDTA/Tm0i3yxN3jI/AAAAAAAACHY/HQWC0mDljDg/s500/Maybank+logo+2011.png" style="margin-bottom : 2.5%;">
            <h4>To complete your order, please bank in the total amount of RM<?= number_format($order['total'], 2) ?> to <br/>
            Account Name: Chua Exian <br/>
            Account Number: 1623-1182-6840</h4>
            <h4>After bank in is complete. Please contact 016-2334243 / 012-9774480‬ or</h4>
            <h4>Email your receipt to cherie.clo@hotmail.com </h4>
        </div>
    </div>
    <!--Middle Part End -->
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
        var code = $(this).find('[name=code]').val();

        postParam = {
            code: code
        }

        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>main/add_discount/',
            data: postParam,
            success: function (data) {
                $("#header-button").load(location.href + " #header-button");
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
