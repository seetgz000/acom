<br />

<div class="mediumBox">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-line-chart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Projects</span>
                    <span class="info-box-number">90%</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 90%"></div>
                    </div>
                    <span class="progress-description">
                        success rate
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Subsales</span>
                    <span class="info-box-number">80%</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 80%"></div>
                    </div>
                    <span class="progress-description">
                        success rate
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-info">
                <div class="box-header user-panel">
                    <div class="pull-left image ">
                        <img src="<?= $user['thumbnail_link'] ?>" class="img-circle user_thumbnail" alt="User Image">
                    </div>
                    <a href="<?= site_url("User/load_edit_user_form/" . $user['user_id'] . '/' . $user['type']); ?>" class="pull-right">
                        edit
                    </a>
                    <h4 style="margin-left:20px;" class="pull-left"><?= $user['nick_name'] == "" ? $user['full_name'] : $user['nick_name']; ?>'s info</h4>
                </div>
                <div class="box-body">

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
                    <div class="tab-content">
                        <div class="tab-pane active" id="login">
                            <table class='formTable'>
                                <tr>
                                    <th>username</th>
                                    <td>: <?= $user['username']; ?></td>
                                </tr>
                                <tr>
                                    <th>full name</th>
                                    <td>: <?= $user['full_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>nick name</th>
                                    <td>: <?= $user['nick_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>email</th>
                                    <td>: <?= $user['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>contact</th>
                                    <td>: <?= $user['contact']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane" id="basic">
                            <table class="formTable">
                                <tr>
                                    <th>IC Number</th>
                                    <td>: <?= $user['ic']; ?></td>
                                </tr>
                                <tr>
                                    <th>D.O.B</th>
                                    <td>: <?= $user['date_of_birth']; ?></td>
                                </tr>
                                <tr>
                                    <th>bank</th>
                                    <td>: <?= $user['bank']; ?></td>
                                </tr>
                                <tr>
                                    <th>acc number</th>
                                    <td>: <?= $user['bank_acc']; ?></td>
                                </tr>
                                <tr>
                                    <th>Current Stay</th>
                                    <td>: <?= $user['current_stay']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane" id="agent">
                            <table class="formTable">
                                <tr>
                                    <th>Role</th>
                                    <td>: <?= $user['role']; ?></td>
                                </tr>
                                <tr>
                                    <th>Referrer</th>
                                    <td>: <?= $user['referrer_name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Branch</th>
                                    <td>: <?= $user['branch']; ?></td>
                                </tr>
                                <tr>
                                    <th>Register Area</th>
                                    <td>: <?= $user['register_area']; ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-warning">
                <div class="box-header">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#project_list" data-toggle="tab">Projects</a></li>
                        <li><a href="#subsales_list" data-toggle="tab">Subsales</a></li>
                    </ul>
                </div>
                <div class="box-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="project_list">
                            <table class="table table-hover">
                                <tr>
                                    <td>21 May 2016</td>
                                    <td>Glenmarie project</td>
                                </tr>
                                <tr>
                                    <td>3 Oct 2016</td>
                                    <td>Shah Alam development</td>
                                </tr>
                                <tr>
                                    <td>4th April 2017</td>
                                    <td>Damansara apartments</td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane" id="subsales_list">
                            <table class="table table-hover">
                                <tr>
                                    <td>21 May 2016</td>
                                    <td>Sunway apartments</td>
                                </tr>
                                <tr>
                                    <td>3 Oct 2016</td>
                                    <td>Kepong houses</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="box box-default">
                <div class="box-header">
                    Family
                </div>
                <div class="box-body" id="family-tree-container">
                    <?= $tree ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var projectData = {
        labels: ["Success", "Fail"],
        datasets: [{
                data: [90, 10],
                backgroundColor: ["#b7e8ff", "#fcbca9"],
                hoverBackgroundColor: ["#81ccef", "#ff9070"]
            }]
    };

    var subsalesData = {
        labels: ["Success", "Fail"],
        datasets: [{
                data: [80, 10],
                backgroundColor: ["#b7e8ff", "#fcbca9"],
                hoverBackgroundColor: ["#81ccef", "#ff9070"]
            }]
    };


    window.onload = function () {

        var ctx = document.getElementById("project_chart");
        var ctx2 = document.getElementById("subsales_chart");
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: projectData
        });

        new Chart(ctx2, {
            type: 'pie',
            data: subsalesData
        });
    };

</script>
