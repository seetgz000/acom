<div class="mediumBox">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <div class="box box-default">
                <div class="box-header">
                    Add Sales Agent
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
                    <form id="user_form" method="POST" action="<?php echo site_url("User/do_add_sales"); ?>">
                        <div class="tab-content">
                            <div class="tab-pane active" id="login">


                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Username</label>
                                        <input type="text" class="form-control" required name="username" placeholder="username" id="form_username">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Email</label> <small> <i> a password will be sent to this email </i> </small>
                                        <input type="email" class="form-control" required name="email" placeholder="email" id="form_email" >
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Role</label>
                                        <select name="role_id" class="form-control">
                                            <?php foreach ($roles as $row) { ?>
                                                <option value="<?= $row['role_id']; ?>"><?= $row['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane " id="basic">



                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="full_name" required placeholder="Full Name" required id="form_full_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Nick Name</label> <i><small>optional</small></i>
                                        <input type="text" class="form-control" name="nick_name"  placeholder="Nick Name">
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Contact Number</label> 
                                        <input type="text" class="form-control" name="contact"  placeholder="xxx-xxxxxxx" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>IC Number</label> 
                                        <input type="text" class="form-control" name="ic"  placeholder="xxxxxx-xx-xxxx" required id="form_ic">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Date of birth</label> 
                                        <input type="date" class="form-control" name="date_of_birth" required id="form_date_of_birth">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Area of stay</label>
                                        <input type="text" class="form-control" name="current_stay"  placeholder="e.g Subang" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Bank</label>
                                        <input type="text" class="form-control" name="bank"  placeholder="CIMB" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Bank Account</label>
                                        <input type="text" class="form-control" name="bank_acc"  placeholder="123456789" >
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
                                                <option value="<?= $row['user_id']; ?>"><?= $row['full_name']; ?> <?= $row['nick_name'] != "" ? "( " . $row['nick_name'] . " ) " : ""; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Focus Area</label>
                                        <input type="text" class="form-control" name="focus_area" placeholder="" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Branch</label>
                                        <select name="branch_id" class="form-control">
                                            <?php foreach ($branches as $row) { ?>
                                                <option value="<?= $row['branch_id']; ?>"><?= $row['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Register Area</label>
                                        <select name="register_area_id" class="form-control">
                                            <?php foreach ($register_area as $row) { ?>
                                                <option value="<?= $row['register_area_id']; ?>"><?= $row['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <label>Suggestions</label>
                                        <textarea class="form-control" name="suggestion"></textarea>
                                    </div>
                                </div>
                                <br />
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
</script>