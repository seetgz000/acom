<br />
<div class="mediumBox">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-info">
                <div class="box-header user-panel">
                    <h4 style="margin-left:20px;" class="pull-left"><?= $order['username'] ?>'s order</h4>
                </div>
                <div class="box-body">

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabs">
                            <li class="active">
                                <a href="#info" data-toggle="tab">Info</a>

                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="info">
                            <div id="refresh-box">
                                <form id="update-order-form" method="POST" action="<?= base_url() ?>order/update/<?= $order['order_id'] ?>">
                                    <table class='formTable'>
                                        <tr>
                                            <th>User</th>
                                            <td>: <?= $order['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Receiver</th>
                                            <td>: <?= $order['receiver'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Contact Number</th>
                                            <td>: <?= $order['contact'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>: <?= $order['address'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Promo Code</th>
                                            <td>: <?= $order['code'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>: RM<?= $order['total'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Payment</th>
                                            <td>: RM<?= $order['payment_amount'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Payment Method</th>
                                            <td>: <?= $order['payment_method'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <select name="status">
                                                    <?php
                                                    foreach ($order_status as $row) {
                                                        ?>
                                                        <option value="<?= $row['order_status_id'] ?>" <?php if ($row['order_status_id'] == $order['order_status_id']) { ?>selected<?php } ?>><?= $row['status'] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Remarks</th>
                                            <td><textarea name="remarks" class="form-control"><?= $order['remarks'] ?></textarea></td>
                                        </tr>
                                    </table>
                                    <br/>
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-warning">
                <div class="box-header">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#products" data-toggle="tab">Products</a></li>
                    </ul>
                </div>
                <div class="box-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="info">
                            <table class="table table-hover">
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price Each</th>
                                    <th>Total Price</th>
                                </tr>
                                <?php
                                foreach ($order['products'] as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['quantity'] ?></td>
                                        <td>RM<?= $row['price'] ?></td>
                                        <td>RM<?= $row['product_total'] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('submit', '#update-order-form', function (e) {
        e.preventDefault();
        var status = $(this).find('[name=status]').val();
        var remarks = $(this).find('[name=remarks]').val();

        postParam = {
            status: status,
            remarks: remarks
        }

        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>order/update/<?= $order['order_id'] ?>/',
            data: postParam,
            success: function (data) {
                $("#refresh-box").load(location.href + " #refresh-box");
                $.alert({
                    title: 'Order updated',
                    content: 'Click ok to continue',
                });
            }, error: function () {
                alert('update failed');
            }
        });
    });
</script>