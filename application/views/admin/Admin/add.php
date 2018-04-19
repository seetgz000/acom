<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Add Admin
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <form id="project_form" method="POST" action="<?php echo site_url("Admin/add"); ?>">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control" required name="username" placeholder="Username" id="form_username">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control" required name="password" id="form_password">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" required name="password2" id="form_password2">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Referrer Code</label>
                                    <input type="text" class="form-control" required name="referrer_code" placeholder="Referrer Code" id="form_referrer_code">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Role</label>
                                    <select class="form-control" required name="role_id" id="form_role_id">
                                        <?php
                                        foreach ($role as $row) {
                                            ?>
                                            <option value="<?= $row['role_id'] ?>"><?= $row['name'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
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
                        window.location = "<?= site_url('Admin'); ?>";
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
        var project_form = document.getElementById("project_form");

        project_form.addEventListener("submit", function (e) {
            e.preventDefault();
            form_submit(project_form);
        });

        var basic_elements = ["form_username", "form_password", "form_password2", "form_role_id", "form_referrer_code"];

        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#basic"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }

    });

</script>