<br/>
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Add Project
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="tabs">
                                <li class="active">
                                    <a href="#details" data-toggle="tab">Project Details</a>
                                </li>
                                <li>
                                    <a href="#commission" data-toggle="tab">Project Commission</a>
                                </li>
                                <li>
                                    <a href="#ren" data-toggle="tab">Project RENs</a>
                                </li>
                                <li>
                                    <a href="#referral" data-toggle="tab">Project Referral</a>
                                </li>
                            </ul>
                        </div>
                        <form id="project_form" method="POST" action="<?php echo site_url("Project/add"); ?>">
                            <div class="tab-content">
                                <div class="tab-pane active" id="details">


                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Project Name</label>
                                            <input type="text" class="form-control" required name="name" placeholder="Project Name" id="form_name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Unit Number</label>
                                            <input type="text" class="form-control" required name="unit_number" placeholder="Unit Number" id="form_unit_number">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Buyer Name</label>
                                            <input type="text" class="form-control" required name="buyer" placeholder="Buyer Name" id="form_buyer" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control datepicker" required name="date" placeholder="Date" id="form_date" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Selling Price (RM)</label>
                                            <input type="number" class="form-control" required name="selling_price" placeholder="Selling Price" id="form_selling_price" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>SPA Price (RM)</label>
                                            <input type="number" class="form-control" required name="spa_price" placeholder="SPA Price" id="form_spa_price" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Sales Package</label>
                                            <textarea class="form-control" required name="sales_package" placeholder="Sales Package" id="form_sales_package" ></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Net Price (RM)</label>
                                            <input type="number" class="form-control" required name="net_price" placeholder="Net Price" id="form_net_price" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Date of SPA Signed</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control datepicker" required name="spa_date" placeholder="Date of SPA Signed" id="form_spa_date" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Date of LA Signed</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control datepicker" required name="la_date" placeholder="Date of LA Signed" id="form_la_date" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Remarks</label>
                                            <textarea class="form-control" required name="remarks" placeholder="Remarks" id="form_remarks" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="commission">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Total Project Commission (%)</label>
                                            <input type="number" class="form-control" name="total_commission" required placeholder="Total Project Commission" required id="form_total_commission">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Company Commission (%)</label>
                                            <input type="number" class="form-control" name="company_commission" required placeholder="Company Commission" required id="form_company_commission">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>REN Commission (%)</label>
                                            <input type="number" class="form-control" name="ren_commission" required placeholder="REN Commission" required id="form_ren_commission">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Project PIC (%)</label>
                                            <input type="number" class="form-control" name="pic" required placeholder="Project PIC" required id="form_pic">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="ren">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>REN</label>
                                            <select class="form-control" name="user_id[]" required id="form_user_id">
                                                <option value="0">No REN</option>
                                                <?php
                                                foreach ($users as $row) {
                                                    ?>
                                                    <option value="<?= $row['user_id'] ?>"><?= $row['full_name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>REN (%)</label>
                                            <input type="number" class="form-control" name="percentage[]" required placeholder="REN (%)" required id="form_percentage">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Commission Rate (%)</label>
                                            <input type="number" class="form-control" name="commission_rate[]" required placeholder="Commission Rate (%)" required id="form_commission_rate">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Leader</label>
                                            <select class="form-control" name="leader_id[]" required id="form_leader_id">
                                                <option value="0">No leader</option>
                                                <?php
                                                foreach ($users as $row) {
                                                    ?>
                                                    <option value="<?= $row['user_id'] ?>"><?= $row['full_name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Leader (%)</label>
                                            <input type="number" class="form-control" name="leader_percentage[]" required placeholder="Leader (%)" required id="form_leader_percentage">
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="type[]" value="REN">
                                    <hr/>
                                    <div id="new-ren">
                                    </div>
                                    <br/>
                                    <button type="button" class="btn btn-flat btn-info pull-right" id="add-new-ren">Add New REN</button>
                                </div>
                                <div class="tab-pane" id="referral">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Referral</label>
                                            <select class="form-control" name="ref_user_id" required id="form_ref_user_id">
                                                <option value="0">No REN</option>
                                                <?php
                                                foreach ($users as $row) {
                                                    ?>
                                                    <option value="<?= $row['user_id'] ?>"><?= $row['full_name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Referral (%)</label>
                                            <input type="number" class="form-control" name="ref_percentage" required placeholder="REN (%)" required id="form_ref_percentage">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Commission Rate (%)</label>
                                            <input type="number" class="form-control" name="ref_commission_rate" required placeholder="Commission Rate (%)" required id="form_ref_commission_rate">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Leader</label>
                                            <select class="form-control" name="ref_leader_id" required id="form_ref_leader_id">
                                                <option value="0">No leader</option>
                                                <?php
                                                foreach ($users as $row) {
                                                    ?>
                                                    <option value="<?= $row['user_id'] ?>"><?= $row['full_name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                            <label>Leader (%)</label>
                                            <input type="number" class="form-control" name="ref_leader_percentage" required placeholder="Leader (%)" required id="form_ref_leader_percentage">
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="rel_type" value="referrel">
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
                        window.location = "<?= site_url('Project'); ?>";
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

        var basic_elements = ["form_name", "form_unit_number", "form_buyer", "form_date", "form_selling_price", "form_spa_price", "form_sales_package", "form_net_price", "form_spa_date", "form_la_date", "form_remarks"];

        var commission_elements = ["form_total_commission", "form_company_commission", "form_ren_commission", "form_pic"];

        var ren_elements = ["form_user_id", "form_percentage", "form_commission_rate", "form_leader_id", "form_leader_percentage"];

        var ref_elements = ["form_ref_user_id", "form_ref_percentage", "form_ref_commission_rate", "form_ref_leader_id", "form_ref_leader_percentage"];

        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#basic"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }

        for (var i = 0; i < commission_elements.length; i++) {
            document.getElementById(commission_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#commission"]').tab('show');
                $("#" + commission_elements[i]).css("background-color", "#f7ada3");
            });
        }

        for (var i = 0; i < ren_elements.length; i++) {
            document.getElementById(ren_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#ren"]').tab('show');
                $("#" + ren_elements[i]).css("background-color", "#f7ada3");
            });
        }

        for (var i = 0; i < ref_elements.length; i++) {
            document.getElementById(ref_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#referral"]').tab('show');
                $("#" + ref_elements[i]).css("background-color", "#f7ada3");
            });
        }


    });

    $(document).on('click', '#add-new-ren', function (e) {
        e.preventDefault();
        $("#new-ren").append("<div class='row'>" +
                "<div class='col-lg-12 col-md-12 col-xs-12 col-sm-12'>" +
                "<label>REN</label>" +
                "<select class='form-control' name='user_id[]' required id='form_user_id'>" +
                "<option value='0'>No REN</option>" +
<?php
foreach ($users as $row) {
    ?>
            "<option value='<?= $row['user_id'] ?>'><?= $row['full_name'] ?></option>" +
    <?php
}
?>
        "</select>" +
        "</div>" +
                "</div>" +
                "<div class='row'>" +
                "<div class='col-lg-12 col-md-12 col-xs-12 col-sm-12'>" +
                "<label>REN (%)</label>" +
                "<input type='number' class='form-control' name='percentage[]' required placeholder='REN (%)' required id='form_percentage'>" +
                "</div>" +
                "</div>" +
                "<div class='row'>" +
                "<div class='col-lg-12 col-md-12 col-xs-12 col-sm-12'>" +
                "<label>Commission Rate (%)</label>" +
                "<input type='number' class='form-control' name='commission_rate[]' required placeholder='Commission Rate (%)' required id='form_commission_rate'>" +
                "</div>" +
                "</div>" +
                "<div class='row'>" +
                "<div class='col-lg-12 col-md-12 col-xs-12 col-sm-12'>" +
                "<label>Leader</label>" +
                "<select class='form-control' name='leader_id[]' required id='form_leader_id'>" +
                "<option value='0'>No leader</option>" +
<?php
foreach ($users as $row) {
    ?>
            "<option value='<?= $row['user_id'] ?>'><?= $row['full_name'] ?></option>" +
    <?php
}
?>
        "</select>" +
                "</div>" +
                "</div>" +
                "<div class='row'>" +
                "<div class='col-lg-12 col-md-12 col-xs-12 col-sm-12'>" +
                "<label>Leader (%)</label>" +
                "<input type='number' class='form-control' name='leader_percentage[]' required placeholder='Leader (%)' required id='form_leader_percentage'>" +
                "</div>" +
                "</div>" +
                "<input type='hidden' class='form-control' name='type[]' value='REN'>" +
                "<hr/>"
                );
    });
</script>