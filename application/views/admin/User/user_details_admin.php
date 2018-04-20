<br />
<div class="mediumBox">
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
                                <a href="#login" data-toggle="tab">Info</a>

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
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
