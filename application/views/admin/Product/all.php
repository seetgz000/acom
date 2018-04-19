<section class="content-header">
    <h1>
        Products
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>Product"><i class="fa fa-archive"></i> Products</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Products</h4>
                <a href='<?php echo site_url('Product/add'); ?>' class='btn btn-info pull-right'>
                    <i class='glyphicon glyphicon-plus' ></i> Add</a>
            </div>
            <div class='panel-body'>

                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($products as $product) {
                                ?>
                                <tr>
                                    <td><a href="<?= base_url() ?>product/details/<?= $product['product_id'] ?>"><?= $i ?></a></td>
                                    <td><a href="<?= base_url() ?>product/details/<?= $product['product_id'] ?>"><img class="xs-thumbnail" src="<?= base_url() . $product['thumbnail'] ?>"></a></td>
                                    <td><a href="<?= base_url() ?>product/details/<?= $product['product_id'] ?>"><?= $product['product_name'] ?></a></td>
                                    <td><a href="<?= base_url() ?>product/details/<?= $product['product_id'] ?>"><?= $product['category'] ?></a></td>
                                    <td><button class="btn btn-danger delete-button" data-id="<?= $product['product_id'] ?>"><i class="fa fa-trash"></i> Delete</button></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Category</th>
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
        if (confirm("Are you sure you want to delete this product?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>product/delete/" + id);
        }
    });
</script>