<div class="mediumBox">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <div class="box box-default">
                <div class="box-header">
                    Edit Sales Agent
                </div>
                <div class="box-body">

                    <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabs">
                            <li class="active">
                                <a href="#login" data-toggle="tab">Login Info</a>

                            </li>
                            <li>
                                <a href="#basic" data-toggle="tab">Basic Info</a>

                            </li>
                            <li>
                                <a href="#agent" data-toggle="tab">Agent</a>

                            </li>
                        </ul>
                    </div>
                    <form id="user_form" method="POST" action="<?php echo site_url("User/do_edit_sales/" . $user['user_id']); ?>">
                        <div class="tab-content">
                            <div class="tab-pane active" id="login">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Change thumbnail</label>
                                        <input type="file" class="form-control" name="thumbnail">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Username</label>
                                        <input type="text" class="form-control" disabled value="<?= $user['username']; ?>" placeholder="username" id="form_username">
                                        <input type="hidden" value="<?= $user['username']; ?>" name="username">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Email</label> <small> <i> a password will be sent to this email </i> </small>
                                        <input type="email" class="form-control" required name="email" placeholder="email" id="form_email" value="<?= $user['email']; ?>">
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


                            </div>
                            <div class="tab-pane " id="basic">



                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="full_name" required placeholder="Full Name" id="form_full_name" value="<?= $user['full_name']; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Nick Name</label> <i><small>optional</small></i>
                                        <input type="text" class="form-control" name="nick_name"  value="<?= $user['nick_name']; ?>"  placeholder="Nick Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>IC Number</label> 
                                        <input type="text" class="form-control" name="ic"  value="<?= $user['ic']; ?>"  placeholder="xxxxxx-xx-xxxx" required id="form_ic">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Contact </label>
                                        <input type="text" class="form-control"  value="<?= $user['contact']; ?>" name="contact"  placeholder="xxxxxxxxxx" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Date of birth</label> 
                                        <input type="date" class="form-control"  value="<?= $user['date_of_birth']; ?>" name="date_of_birth" required id="form_date_of_birth">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Area of stay</label>
                                        <input type="text" class="form-control"  value="<?= $user['current_stay']; ?>" name="current_stay"  placeholder="e.g Subang" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Bank</label>
                                        <input type="text" class="form-control" name="bank"  value="<?= $user['bank']; ?>"  placeholder="CIMB" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Bank Account</label>
                                        <input type="text" class="form-control" name="bank_acc"  value="<?= $user['bank_acc']; ?>"  placeholder="123456789" >
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="agent">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Referrer</label>
                                        <select name="referrer_id" class="form-control">
                                            <option value="0">No Referrer</option>
                                            <?php foreach ($referrals as $row) { ?>
                                                <option <?= $row['user_id'] == $user['referrer_id'] ? "selected" : ""; ?> value="<?= $row['user_id']; ?>"><?= $row['full_name']; ?> <?= $row['nick_name'] != "" ? "( " . $row['nick_name'] . " ) " : ""; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Focus Area</label>
                                        <input  value="<?= $user['focus_area']; ?>" type="text" class="form-control" name="focus_area" placeholder="" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Branch</label>
                                        <select name="branch_id" class="form-control">
                                            <?php foreach ($branches as $row) { ?>
                                                <option  <?= $row['branch_id'] == $user['branch_id'] ? "selected" : ""; ?> value="<?= $row['branch_id']; ?>"><?= $row['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Register Area</label>
                                        <select name="register_area_id" class="form-control">
                                            <?php foreach ($register_area as $row) { ?>
                                                <option  <?= $row['register_area_id'] == $user['register_area_id'] ? "selected" : ""; ?> value="<?= $row['register_area_id']; ?>"><?= $row['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Suggestions</label>
                                        <textarea class="form-control" name="suggestion"><?= $user['suggestion']; ?></textarea>
                                    </div>
                                </div>
                                <br />
                                <input type="submit" class="btn btn-flat btn-info pull-right" value="save">

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
    $(document).ready(function () {
        var user_form = document.getElementById("user_form");

        user_form.addEventListener("submit", function (e) {
            e.preventDefault();
            form_submit(user_form);
        });

        var login_elements = ["form_username", "form_email"];
        var basic_elements = ["form_full_name", "form_ic", "form_date_of_birth"];

        for (var i = 0; i < login_elements.length; i++) {
            document.getElementById(login_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#login"]').tab('show');
                $("#" + login_elements[i]).css("background-color", "#f7ada3");
            });
        }

        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#basic"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }


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