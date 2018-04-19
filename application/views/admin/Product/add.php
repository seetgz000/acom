<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Add Product
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="tabs">
                                <li class="active">
                                    <a href="#details" data-toggle="tab">Product Details</a>
                                </li>
                                <li>
                                    <a href="#models" data-toggle="tab">Product Models</a>
                                </li>
                                <li>
                                    <a href="#images" data-toggle="tab">Product Images</a>
                                </li>
                            </ul>
                        </div>
                        <form id="product_form" method="POST" action="<?php echo site_url("Product/add"); ?>" enctype="multipart/form-data">
                            <div class="tab-content">
                                <div class="tab-pane active" id="details">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Name</label>
                                            <input type="text" class="form-control" required name="name" placeholder="Name" id="form_name">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Price</label>
                                            <input type="number" class="form-control" required name="price" placeholder="Price" id="form_price" step="any">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Discount Price</label>
                                            <input type="number" class="form-control" name="discount_price" placeholder="Discount Price" id="form_discount_price" step="any">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Thumbnail</label>
                                            <input type="file" class="form-control" required name="thumbnail" id="form_thumbnail">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Weight</label>
                                            <input type="number" class="form-control" required name="weight" placeholder="Weight" id="form_weight" step="any">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Description</label>
                                            <textarea class="form-control" required name="description" placeholder="Description" id="form_description"></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Category</label>
                                            <select class="form-control" required name="category_id" id="form_category_id">
                                                <option value="none">None</option>
                                                <?php
                                                foreach ($categories as $row) {
                                                    ?>
                                                    <option value="<?= $row['category_id'] ?>"><?= $row['name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                                <div class="tab-pane" id="models">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Model</label>
                                            <input type="text" class="form-control" name="model[]" placeholder="Model" id="form_model">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>SKU</label>
                                            <input type="text" class="form-control" name="sku[]" placeholder="SKU" id="form_sku">
                                        </div>
                                    </div>
                                    <hr/>
                                    <div id="add-model-container">
                                    </div>
                                    <br/>
                                    <button type="button" class="btn btn-flat btn-info pull-right" id="add-new-model">Add New Model</button>
                                </div>
                                <div class="tab-pane" id="images">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Images</label>
                                            <input type="file" class="form-control" name="images[]" id="form_images" multiple>
                                        </div>
                                    </div>
                                    <br/>
                                    <input type="submit" class="btn btn-flat btn-info pull-right" value="add">
                                </div>
                            </div>
                        </form>
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
        $.ajax({
            url: url,
            data: data,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
                if (data.status) {
                    $("body").loadingModal({
                        text: "Successfully added"
                    });
                    setTimeout(function () {
                        window.location = "<?= site_url('Product'); ?>";
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

        var basic_elements = ["form_name", "form_discount_price", "form_thumbnail", "form_weight", "form_description"];

        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#details"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }

    });

    $(document).on('click', '#add-new-model', function (e) {
        e.preventDefault();
        $("#add-model-container").append("<div class='row'>" +
                "<div class='col-lg-12 col-md-12 col-xs-12 col-sm-12'>" +
                "<label>Model</label>" +
                "<input type='text' class='form-control' name='model[]' placeholder='Model' id='form_model'>" +
                "</div>" +
                "</div>" +
                "<div class='row'>" +
                "<div class='col-lg-12 col-md-12 col-xs-12 col-sm-12'>" +
                "<label>SKU</label>" +
                "<input type='text' class='form-control' name='sku[]' placeholder='SKU' id='form_sku'>" +
                "</div>" +
                "</div>" +
                "<hr/>");
    });

</script>