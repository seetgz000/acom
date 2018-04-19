<section class="content-header">
    <h1>
        Admins
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>Admin"><i class="fa fa-users"></i> Admins</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Agents</h4>
            </div>
            <div class='panel-body'>

                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Referrer Code</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($users as $row) {
                                ?>
                                <tr>
                                    <td><a href="<?= base_url() ?>user/details/<?= $row['user_id'] ?>"><?php echo $i; ?></a></td>
                                    <td><a href="<?= base_url() ?>user/details/<?= $row['user_id'] ?>"><?= $row['username'] ?></a></td>
                                    <td><a href="<?= base_url() ?>user/details/<?= $row['user_id'] ?>"><?= $row['name'] ?></a></td>
                                    <td><a href="<?= base_url() ?>user/details/<?= $row['user_id'] ?>"><?= $row['referrer_code'] ?></a></td>
                                    <td><button type="button" class="btn btn-danger delete-button" data-id="<?= $row['user_id'] ?>"><i class="fa fa-trash"></i> Delete</button></td>
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
                                <th>Name</th>
                                <th>Referrer Code</th>
                                <th></th>
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