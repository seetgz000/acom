<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Edit Product Images
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="tabs">
                                <li class="active">
                                    <a href="#add" data-toggle="tab">Add New Images</a>
                                </li>
                                <li>
                                    <a href="#images" data-toggle="tab">Previous Images</a>
                                </li>
                            </ul>
                        </div>
                        <form id="product_form" method="POST" action="<?php echo site_url("Product/edit_images/" . $product_id); ?>">
                            <div class="tab-content">
                                <div class="tab-pane active" id="add">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Images</label>
                                            <input type="file" class="form-control" name="images[]" id="form_images" multiple>
                                        </div>
                                    </div>
                                    <br/>
                                    <input type="submit" class="btn btn-flat btn-info pull-right" value="add">
                                </div>
                                <div class="tab-pane" id="images">
                                    <div class="row">
                                        <?php foreach ($images as $row) {
                                            ?>
                                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 product-image-container">
                                                <img class="cropped" src="<?= base_url() . $row['url'] ?>">
                                                <div class="delete-product-image-container">
                                                    <button class="btn btn-danger delete-button" data-id="<?= $row['image_id'] ?>"><i class="fa fa-close"></i></button>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
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
                        text: "Successfully updated"
                    });
                    setTimeout(function () {
                        window.location = "<?= site_url('Product/details/' . $product_id); ?>";
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

        var basic_elements = ["form_image"];

        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#add"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }

    });

    $(document).on('click', '.delete-button', function (e) {
        e.preventDefault();
        if (confirm("Are you sure you want to delete this image?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>product/delete_image/" + id);
        }
    });

</script>