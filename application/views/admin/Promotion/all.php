<section class="content-header">
    <h1>
        Promotions
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>Promotion"><i class="fa fa-money"></i> Promotions</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Promotions</h4>
                <a href='<?php echo site_url('promotion/add'); ?>' class='btn btn-info pull-right'>
                    <i class='glyphicon glyphicon-plus' ></i> Add</a>
            </div>
            <div class='panel-body'>

                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Code</th>
                                <th>Discount(%)</th>
                                <th>Active</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($promotions as $row) {
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['code'] ?></td>
                                    <td><?= $row['discount'] ?>%</td>
                                    <td><?= $row['active'] ?></td>
                                    <td><?php
                                        if ($row['active'] == "YES") {
                                            ?>
                                            <a href="<?= base_url() ?>Promotion/deactivate/<?= $row['promotion_id'] ?>"><button class="btn btn-warning" data-id="<?= $row['promotion_id'] ?>"><i class="fa fa-close"></i> Deactivate</button></a>
                                            <?php
                                        } else if ($row['active'] == "NO") {
                                            ?>
                                            <a href="<?= base_url() ?>Promotion/reactivate/<?= $row['promotion_id'] ?>"><button class="btn btn-success" data-id="<?= $row['promotion_id'] ?>"><i class="fa fa-check"></i> Reactivate</button></a>
                                            <?php
                                        }
                                        ?>
                                        <button class="btn btn-danger delete-button" data-id="<?= $row['promotion_id'] ?>"><i class="fa fa-trash"></i> Delete</button></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Code</th>
                                <th>Discount(%)</th>
                                <th>Active</th>
                                <th></th>
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
        e.preventDefault();
        if (confirm("Are you sure you want to delete this promotion?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>promotion/delete/" + id);
        }
    });
</script>