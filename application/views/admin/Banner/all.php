<section class="content-header">
    <h1>
        Banners
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>Banner"><i class="fa fa-image"></i> Banners</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Banner</h4>
                <a href='<?php echo site_url('banner/add'); ?>' class='btn btn-info pull-right'>
                    <i class='glyphicon glyphicon-plus' ></i> Add</a>
            </div>
            <div class='panel-body'>

                <div id="refreshBox">
                    <table class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Banner</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($banners as $banner) {
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><img class="xs-banner" src="<?= base_url() . $banner['url'] ?>"></td>
                                    <td><button class="btn btn-danger delete-button" data-id="<?= $banner['banner_id'] ?>"><i class="fa fa-trash"></i> Delete</button></td>
                                <tr/>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Banner</th>
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
        e.preventDefault();
        if (confirm("Are you sure you want to delete this banner?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>banner/delete/" + id);
        }
    });
</script>