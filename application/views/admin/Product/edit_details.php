<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Edit Product
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="tabs">
                                <li class="active">
                                    <a href="#details" data-toggle="tab">Product Details</a>
                                </li>
                            </ul>
                        </div>
                        <form id="product_form" method="POST" action="<?php echo site_url("Product/edit_details/" . $product['product_id']); ?>">
                            <div class="tab-content">
                                <div class="tab-pane active" id="details">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Name</label>
                                            <input type="text" class="form-control" required name="name" placeholder="Name" id="form_name" value="<?= $product['product_name'] ?>">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Price</label>
                                            <input type="number" class="form-control" required name="price" placeholder="Price" id="form_price" value="<?= $product['price'] ?>" step="any">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Label</label>
                                            <select class="form-control" required name="label" id="form_label">

                                                <?php
                                                foreach ($label as $row) {
                                                    ?>
                                                    <option value="<?= $row['label_id'] ?>"
                                                    <?php if ($product['label'] == $row['label_id']) {
                                                        ?>
                                                                selected
                                                            <?php }
                                                            ?>
                                                            ><?= $row['Name'] ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Discount Price</label>
                                            <input type="number" class="form-control" name="discount_price" placeholder="Discount Price" id="form_discount_price" value="<?= $product['discount_price'] ?>" step="any">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Thumbnail <small>(upload a new file to replace the previous thumbnail)</small></label>
                                            <input type="file" class="form-control" name="thumbnail" id="form_thumbnail">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Thumbnail 2<small>(upload a new file to replace the previous thumbnail)</small></label>
                                            <input type="file" class="form-control" name="thumbnail2" id="form_thumbnail">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Weight</label>
                                            <input type="number" class="form-control" required name="weight" placeholder="Weight" id="form_weight" value="<?= $product['weight'] ?>" step="any">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Description</label>
                                            <textarea class="form-control" required name="description" placeholder="Description" id="form_description"><?= $product['description'] ?></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Category</label>
                                            <select class="form-control" required name="category_id" id="form_category_id">
                                                <option value="none">None</option>
                                                <?php
                                                foreach ($categories as $row) {
                                                    ?>
                                                    <option value="<?= $row['category_id'] ?>"
                                                    <?php if ($product['category_id'] == $row['category_id']) {
                                                        ?>
                                                                selected
                                                            <?php }
                                                            ?>
                                                            ><?= $row['name'] ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Collection</label>
                                                <?php
                                                foreach ($collection as $row) {
                                                ?>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="collection_id[]" value="<?= $row['collection_id'] ?>"
                                                                <?php
                                                                    foreach ($product_collection as $pcRow) {
                                                                    if ($pcRow['collection_id'] == $row['collection_id']) {
                                                                ?>
                                                                    checked
                                                                <?php }
                                                                    }
                                                                ?>
                                                            ><?= $row['collection_name'] ?>
                                                        </label>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                        </div>
                                    </div>
                                    <br/>
                                    <input type="submit" class="btn btn-flat btn-info pull-right" value="edit">
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function form_submit(form) {
        var data = new FormData(form);
        var url = $(form).attr("action");
        console.log(data);
        $.ajax({
            url: url,
            data: data,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
                if (data.status) {
                    $("body").loadingModal({
                        text: "Successfully updated"
                    });
                    setTimeout(function () {
                        window.location = "<?= site_url('Product/details/' . $product['product_id']); ?>";
                    }, 1500);
                } else {
                    $(".user_form_alert").html(data.message);
                    $(".user_form_alert").removeClass("hidden");
                }
            },

            dataType: "JSON"
        });
    }

    $(document).ready(function () {
        var product_form = document.getElementById("product_form");

        product_form.addEventListener("submit", function (e) {
            e.preventDefault();
            form_submit(product_form);
        });

        var basic_elements = ["form_name", "form_parent_id", "form_discount_price", "form_weight", "form_description"];

        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#basic"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }

    });

</script>
