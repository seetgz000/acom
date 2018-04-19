<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Add New Models
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="tabs">
                                <li class="active">
                                    <a href="#models" data-toggle="tab">Product Models</a>
                                </li>
                            </ul>
                        </div>
                        <form id="product_form" method="POST" action="<?php echo site_url("Product/add_models/" . $product_id); ?>" enctype="multipart/form-data">
                            <div class="tab-content">
                                <div class="tab-pane active" id="models">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Model</label>
                                            <input type="text" class="form-control" required name="model[]" placeholder="Model" id="form_model">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>SKU</label>
                                            <input type="text" class="form-control" required name="sku[]" placeholder="SKU" id="form_sku">
                                        </div>
                                    </div>
                                    <hr/>
                                    <div id="add-model-container">
                                    </div>
                                    <br/>
                                    <button type="button" class="btn btn-flat btn-info pull-right" id="add-new-model">Add New Model</button>
                                    <br/>
                                    <hr/>
                                    <input type="submit" class="btn btn-flat btn-info pull-right" value="Add">
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

        var basic_elements = ["form_name", "form_parent_id", "form_discount_price", "form_thumbnail", "form_weight", "form_description"];

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
                "<input type='text' class='form-control' required name='model[]' placeholder='Model' id='form_model'>" +
                "</div>" +
                "</div>" +
                "<div class='row'>" +
                "<div class='col-lg-12 col-md-12 col-xs-12 col-sm-12'>" +
                "<label>SKU</label>" +
                "<input type='text' class='form-control' required name='sku[]' placeholder='SKU' id='form_sku'>" +
                "</div>" +
                "</div>" +
                "<hr/>");
    });

</script>