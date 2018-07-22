<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Edit Terms And Conditions
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <form id="collection_form" method="POST" action="<?php echo site_url("TermAndCondition/edit/" . $term_and_condition['term_and_condition_id']); ?>">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Term And Condition</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <input type="text" class="form-control" required name="term_and_condition_header" placeholder="Body" id="form_name" value="<?= $term_and_condition['term_and_condition_header'] ?>">
									<br />
									<input type="text" class="form-control" required name="term_and_condition_description" placeholder="Body" id="form_name" value="<?= $term_and_condition['term_and_condition_description'] ?>">
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
                        window.location = "<?= site_url('TermAndCondition'); ?>";
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
        var collection_form = document.getElementById("collection_form");
        collection_form.addEventListener("submit", function (e) {
            e.preventDefault();
            form_submit(collection_form);
        });
        var basic_elements = ["form_collection"];
        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#basic"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }
    });
</script>