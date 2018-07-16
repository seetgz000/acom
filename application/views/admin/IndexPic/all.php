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
            </div>
            <div class='panel-body'>

                <div id="refreshBox">
                    <table class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Caption</th>
                                <th>Link</th>
                                <th>Thumbnail</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($indexPic as $row) {
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row['caption'] ?></td>
                                    <td><?=  base_url() . $row['link'] ?></td>
                                    <td><img class="xs-banner" src="<?= base_url() . $row['thumbnail'] ?>"></td>
                                    <td><a href="<?= base_url() ?>indexPic/edit/<?= $row['index_pic_id'] ?>"<button class="btn btn-warning update-button"><i class="fa fa-pencil"></i> Edit</button></a></td>
                                <tr/>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Caption</th>
                                <th>Link</th>
                                <th>Thumbnail</th>
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