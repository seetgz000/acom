<section class="content-header">
    <h1>
        Collection
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>Collection"><i class="fa fa-object-group"></i> Collection</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Collection</h4>
                <a href='<?php echo site_url('collection/add'); ?>' class='btn btn-info pull-right'>
                    <i class='glyphicon glyphicon-plus' ></i> Add</a>
            </div>
            <div class='panel-body'>

                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($collection as $collection) {
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $collection['collection_name'] ?></td>
                                    <td><button class="btn btn-danger delete-button" data-id="<?= $collection['collection_id'] ?>"><i class="fa fa-trash"></i> Delete</button>
                                        <a href="<?= base_url() ?>collection/edit/<?= $collection['collection_id'] ?>"<button class="btn btn-warning update-button"><i class="fa fa-pencil"></i> Edit</button></a></td>
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
        if (confirm("Are you sure you want to delete this collection?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>collection/delete/" + id);
        }
    });
</script>