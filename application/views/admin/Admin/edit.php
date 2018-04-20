<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Edit Admin
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <form id="admin_form" method="POST" action="<?php echo site_url("Admin/edit/" . $admin['admin_id']); ?>">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control" required name="username" placeholder="Username" id="form_username" value="<?= $admin['username'] ?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Password <small>(leave blank to keep old password)</small></label>
                                    <input type="password" class="form-control" name="password" id="form_password">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Confirm Password <small>(leave blank to keep old password)</label>
                                    <input type="password" class="form-control" name="password2" id="form_password2">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Referrer Code</label>
                                    <input type="text" class="form-control" required name="referrer_code" placeholder="Referrer Code" id="form_referrer_code" value="<?= $admin['referrer_code'] ?>">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Role</label>
                                    <select class="form-control" required name="role_id" id="form_role_id">
                                        <?php
                                        foreach ($role as $row) {
                                            ?>
                                            <option value="<?= $row['role_id'] ?>"
                                            <?php if ($admin['role_id'] == $row['role_id']) {
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
                        window.location = "<?= site_url('Admin/details/' . $admin['admin_id']); ?>";
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
        var admin_form = document.getElementById("admin_form");

        admin_form.addEventListener("submit", function (e) {
            e.preventDefault();
            form_submit(admin_form);
        });

        var basic_elements = ["form_username", "form_role_id", "form_referrer_code"];

        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#basic"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }

    });

</script>