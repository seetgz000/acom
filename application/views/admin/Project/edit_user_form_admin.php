<div class="mediumBox">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <div class="box box-default">
                <div class="box-header">
                    Edit <?= $user['name']; ?>
                </div>
                <div class="box-body">
                    <form id="user_form" method="POST" action="<?php echo site_url("User/do_add_admin"); ?>" >
                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Change thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Username</label>
                                <input type="text" class="form-control" disabled value="<?= $user['username']; ?>" name="username" placeholder="username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Email</label> <small> <i> a password will be sent to this email </i> </small>
                                <input type="email" class="form-control"  value="<?= $user['email']; ?>" required name="email" placeholder="email" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Full Name</label>
                                <input type="text" class="form-control"  value="<?= $user['full_name']; ?>" name="full_name" required placeholder="Full Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Nick Name</label> <i><small>optional</small></i>
                                <input type="text" class="form-control"  value="<?= $user['nick_name']; ?>" name="nick_name"  placeholder="Nick Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Contact </label>
                                <input type="text" class="form-control"  value="<?= $user['contact']; ?>" name="contact"  placeholder="xxxxxxxxxx" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Role</label>
                                <select name="role_id" class="form-control">
                                    <?php foreach ($roles as $row) { ?>
                                        <option <?= $user['role_id'] == $row['role_id'] ? "selected" : ""; ?> value="<?= $row['role_id']; ?>"><?= $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <br />
                        <input type="submit" class="btn btn-flat btn-info pull-right" value="add">


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var user_form = document.getElementById("user_form");

        user_form.addEventListener("submit", function (e) {
            e.preventDefault();
            form_submit(user_form);
        });

    });

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
                        text: "Recorded"
                    });
                    setTimeout(function () {
                        window.location = "<?= site_url('User'); ?>";
                    }, 1500);
                } else {
                    $(".user_form_alert").html(data.message);
                    $(".user_form_alert").removeClass("hidden");
                }
            },
            dataType: "JSON"
        });
    }


</script>