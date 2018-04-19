<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Add Promotion
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <form id="promotion_form" method="POST" action="<?php echo site_url("Promotion/add"); ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" required name="name" id="form_name" placeholder="Name">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" placeholder="Description" id="form_description"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Promotion Code</label>
                                    <input type="text" class="form-control">
                                    <input type="hidden" class="form-control" required name="code" id="form_code" value="<?= $code ?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Discount(%)</label>
                                    <input type="number" class="form-control" required name="discount" id="form_discount" placeholder="Discount">
                                </div>
                            </div>
                            <br/>
                            <input type="submit" class="btn btn-flat btn-info pull-right" value="add">
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
                        window.location = "<?= site_url('Promotion'); ?>";
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
        var promotion_form = document.getElementById("promotion_form");

        promotion_form.addEventListener("submit", function (e) {
            e.preventDefault();
            form_submit(promotion_form);
        });

        var basic_elements = ["form_name", "form_discount"];

        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#basic"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }

    });

</script>