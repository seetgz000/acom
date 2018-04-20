<br />
<div class="mediumBox">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-info">
                <div class="box-header user-panel">
                    <div class="pull-left image ">
                        <img src="<?= base_url() . $product['thumbnail'] ?>" class="img-circle user_thumbnail" alt="Product Image">
                    </div>
                    <a href="<?= site_url("product/edit_details/" . $product['product_id']); ?>" class="pull-right">
                        edit
                    </a>

                    <h4 style="margin-left:20px;" class="pull-left"><?= $product['product_name'] ?>'s info</h4>
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
                            <table class='formTable'>
                                <tr>
                                    <th>Name</th>
                                    <td>: <?= $product['product_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>: <?= $product['category']; ?></td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>: RM<?= $product['price']; ?></td>
                                </tr>
                                <tr>
                                    <th>Discount Price</th>
                                    <td>: RM<?= $product['discount_price']; ?></td>
                                </tr>
                                <tr>
                                    <th>Weight</th>
                                    <td>: <?= $product['weight']; ?>kg</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>: <?= $product['description']; ?></td>
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
                        <li class="active"><a href="#models" data-toggle="tab">Models</a></li>
                    </ul>
                </div>
                <div class="box-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="models">
                            <a href="<?= site_url("product/add_models/" . $product['product_id']); ?>" class="pull-right">
                                add
                            </a>
                            <table class="table table-hover">
                                <tr>
                                    <th>Model</th>
                                    <th>SKU</th>
                                    <th></th>
                                </tr>
                                <?php
                                foreach ($models as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row['model'] ?></td>
                                        <td><?= $row['SKU'] ?></td>
                                        <td><button class="btn btn-danger delete-button" data-id="<?= $row['model_id'] ?>"><i class="fa fa-close"></i></button>
                                            <a href="<?= base_url() ?>product/edit_model/<?= $row['model_id'] ?>"><button class="btn btn-warning update-button""><i class="fa fa-pencil"></i></button></a></td>
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
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="box box-default">
                <div class="box-header">
                    Images
                    <a href="<?= site_url("product/edit_images/" . $product['product_id']); ?>" class="pull-right">
                        edit
                    </a>
                </div>
                <div class="box-body" id="family-tree-container">
                    <?php
                    foreach ($images as $row) {
                        ?>
                        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 product-images">
                            <img class="cropped" src="<?= base_url() . $row['url'] ?>">
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.delete-button', function (e) {
        if (confirm("Are you sure you want to delete this model?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>product/delete_model/" + id);
        }
    });
</script>