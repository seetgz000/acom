<section class="content-header">
    <h1>
        Orders
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>Order"><i class="fa fa-truck"></i> Orders</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Orders</h4>
            </div>
            <div class='panel-body'>

                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>Username</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($orders as $row) {
                                ?>
                                <tr>
                                    <td><a href="<?= base_url() ?>order/details/<?= $row['order_id'] ?>"><?= $i ?></a></td>
                                    <td><a href="<?= base_url() ?>order/details/<?= $row['order_id'] ?>"><?= "#" . $row['order_id'] ?></a></td>
                                    <td><a href="<?= base_url() ?>order/details/<?= $row['order_id'] ?>"><?= $row['username'] ?></a></td>
                                    <td><a href="<?= base_url() ?>order/details/<?= $row['order_id'] ?>"><?= $row['added_date'] ?></a></td>
                                    <td><a href="<?= base_url() ?>order/details/<?= $row['order_id'] ?>"><?= $row['status'] ?></a></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>Username</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
<script>
    $(document).on('click', '.delete-button', function (e) {
        if (confirm("Are you sure you want to delete this user?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>user/delete/" + id);
        }
    });
</script>