<section class="content-header">
    <h1>
        Shopping Details
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>Shipping_details"><i class="fa fa-ship"></i> Shopping Details</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Shopping Details</h4>
                <a href="<?php echo site_url("Shipping_details/edit/" . $shipping_details[0]['shipping_details_id']); ?>" class='btn btn-warning pull-right'>
                    <i class='glyphicon glyphicon-edit' ></i> Edit</a>
            </div>
            <div class='panel-body'>
                <p><?= $shipping_details[0]['description']; ?></p>
            </div>
        </div>

    </div>
</section>