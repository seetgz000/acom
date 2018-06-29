<section class="content-header">
    <h1>
        Shopping Details
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>Shopping_details"><i class="fa fa-shopping-bag"></i> Shopping Details</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Shopping Details</h4>
                <a href="<?php echo site_url("Shopping_details/edit/" . $shopping_details[0]['shopping_details_id']); ?>" class='btn btn-warning pull-right'>
                    <i class='glyphicon glyphicon-edit' ></i> Edit</a>
            </div>
            <div class='panel-body'>
                <p><?= $shopping_details[0]['description']; ?></p>
            </div>
        </div>

    </div>
</section>