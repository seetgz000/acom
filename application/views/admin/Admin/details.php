<br />
<div class="mediumBox">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="box box-info">
                <div class="box-header user-panel">
                    <a href="<?= site_url("admin/edit/" . $admin['admin_id']); ?>" class="pull-right">
                        edit
                    </a>
                    <h4 style="margin-left:20px;" class="pull-left"><?= $admin['username'] ?>'s info</h4>
                </div>
                <div class="box-body">

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="tabs">
                            <li class="active">
                                <a href="#login" data-toggle="tab">Info</a>

                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="login">
                            <table class='formTable'>
                                <tr>
                                    <th>username</th>
                                    <td>: <?= $admin['username']; ?></td>
                                </tr>
                                <tr>
                                    <th>role</th>
                                    <td>: <?= $admin['role']; ?></td>
                                </tr>
                                <tr>
                                    <th>referrer code</th>
                                    <td>: <?= $admin['referrer_code']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
