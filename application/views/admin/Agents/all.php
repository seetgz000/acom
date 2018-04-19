<section class="content-header">
    <h1>
        Agents
    </h1>
    <ol class="breadcrumb">
<<<<<<< HEAD
        <li><a href="<?= base_url() ?>User/all"><i class="fa fa-users"></i> Agents</a></li>
=======
        <li><a href="<?= base_url() ?>agent"><i class="fa fa-users"></i> Agents</a></li>
>>>>>>> e8e1d0885acd1e45165feaf65a231d22965ba877
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Agents</h3>

            <div class="box-tools pull-right">
                <a href='<?php echo site_url('agent/add'); ?>'>
                    <button type="button" class="btn btn-box-tool"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Add
                    </button>    
                </a>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class='panel-body'>
                    <div id="refreshBox">
                        <table id="data-table" class="table table-bordered table-hover data-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($agents as $agent) {
                                    ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>user/user_details/<?= $agent['user_id'] ?>"><?php echo $i; ?></a></td>
                                        <td><a href="<?= base_url() ?>user/user_details/<?= $agent['user_id'] ?>"><?php echo $agent['username']; ?></a></td>
                                        <td><a href="<?= base_url() ?>user/user_details/<?= $agent['user_id'] ?>"><?php echo $agent['role']; ?></a></td>

                                        <td>
                                            <?php if ($this->session->userdata("user_id") == $agent['user_id'] OR ( $this->session->userdata("role_id") < $agent['role_id'])) { ?>
                                                <a href="<?php echo site_url("user/edit/" . $agent['user_id']); ?>" class="btn btn-info">Edit</a>
                                            <?php } ?>
                                            <?php if ($this->session->userdata("role_id") <= 2 AND $this->session->userdata("role_id") < $agent['role_id'] AND $this->session->userdata['user_delete'] == 1) { ?>
                                                <a class="btn btn-danger delete-button" data-id="<?= $agent['user_id'] ?>">Delete</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- ./box-body -->
        <div class="box-footer">
            <div class="row">

            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-footer -->
    </div>
</section>
<script>
    $(document).on('click', '.delete-button', function (e) {
        if (confirm("Are you sure you want to delete this user?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>user/delete/" + id);
        }
    });
</script>