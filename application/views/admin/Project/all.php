<section class="content-header">
    <h1>
        Projects
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>User/all"><i class="fa fa-users"></i> Projects</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Projects</h4>
                <a href='<?php echo site_url('project/add'); ?>' class='btn btn-info pull-right'>
                    <i class='glyphicon glyphicon-plus' ></i> Add</a>
            </div>
            <div class='panel-body'>

                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Created by</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($projects as $project) {
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $project['name'] ?></td>
                                    <td><?= $project['full_name'] ?></td>
                                    <td><?= $project['date']?></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Created by</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

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