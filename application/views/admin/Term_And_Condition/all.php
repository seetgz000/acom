<section class="content-header">
    <h1>
        Terms And Conditions
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>TermAndConditionHead"><i class="fa fa-object-group"></i> Term And Condition</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Term And Condidtion</h4>
                <a href='<?php echo site_url('TermAndCondition/add'); ?>' class='btn btn-info pull-right'>
                    <i class='glyphicon glyphicon-plus' ></i> Add</a>
            </div>
            <div class='panel-body'>

                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Header</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;

                            foreach ($term_and_condition as $row) {
                              // $i++
                              $i++
                                ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$row['term_and_condition_header']?></td>
                                    <td><button class="btn btn-danger delete-button" data-id="<?= $row['term_and_condition_id'] ?>"><i class="fa fa-trash"></i> Delete</button>
                                        <a href="<?= base_url() ?>TermAndCondition/edit/<?= $row['term_and_condition_id'] ?>"<button class="btn btn-warning update-button"><i class="fa fa-pencil"></i> Edit</button></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
								                <th>Header</th>
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
        if (confirm("Are you sure you want to delete this term and condition?")) {
            id = $(this).attr('data-id');
            window.location.replace("<?= base_url() ?>termandcondition/delete/" + id);
        }
    });
</script>
