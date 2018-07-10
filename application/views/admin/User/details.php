<br />
<div class="mediumBox">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-info">
                <div class="box-header user-panel">
                    <h4 style="margin-left:20px;" class="pull-left"><?= $user['name'] ?>'s info</h4>
                </div>
                <div class="box-body">

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabs">
                            <li class="active">
                                <a href="#login" data-toggle="tab">Info</a>

                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="login">
                            <table class='formTable'>
                                <tr>
                                    <th>username</th>
                                    <td>: <?= $user['username']; ?></td>
                                </tr>
                                <tr>
                                    <th>name</th>
                                    <td>: <?= $user['name']; ?></td>
                                </tr>
                                <tr>
                                    <th>contact number</th>
                                    <td>: <?= $user['contact']; ?></td>
                                </tr>
                                <tr>
                                    <th>address</th>
                                    <td>: <?= $user['address']; ?></td>
                                </tr>
                                <tr>
                                    <th>referrer code</th>
                                    <td>: <?= $user['referrer_code']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-warning">
                <div class="box-header">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#models" data-toggle="tab">Orders</a></li>
                    </ul>
                </div>
                <div class="box-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="models">
                            <table class="table table-hover">
                                <tr>
                                    <th>No.</th>
                                    <th>Products</th>
                                    <th>Total Price</th>
                                </tr>
                                <?php
                                if (!empty($order)) {
                                    $i = 1;
                                    foreach ($order as $row) {
                                        ?>
                                        <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <ul class="no-bullet">
                                                <?php
                                                foreach ($row['products'] as $product_row) {
                                                    ?>
                                                    <li><a href="<?= base_url() ?>main/product/<?= $product_row['product_id'] ?>"><?= $product_row['name'] ?> x <?= $product_row['quantity'] ?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </td>
                                        <td>RM<?= $row['total'] ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
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
