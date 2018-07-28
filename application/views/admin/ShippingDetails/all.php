<section class="content-header">
    <h1>
        Shipping Details
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>ShippingDetails"><i class="fa fa-folder-open"></i> Shipping Details</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="main-shop-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="clearfix"></div>
                    <a class='pull-right' href="<?= base_url() ?>shippingDetails/edit"><button class="btn btn-warning update-button"><i class="fa fa-pencil"></i> Edit</button></a>
                    <div class="row">
                        <div class="shipping_details_container">
                            <p><?php echo $shippingDetails[0][0]['value']; ?></p>
                            <table class="table shipping_table">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $shippingDetails[0][8]['value']; ?></td>
                                        <td><?php echo $shippingDetails[0][9]['value']; ?></td>
                                        <td><?php echo $shippingDetails[0][1]['value']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $shippingDetails[0][6]['value']; ?></td>
                                        <td><?php echo $shippingDetails[0][2]['value']; ?></td>
                                        <td><?php echo $shippingDetails[0][3]['value']; ?></td>
                                        <td><?php echo $shippingDetails[0][10]['value']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $shippingDetails[0][7]['value']; ?></td>
                                        <td><?php echo $shippingDetails[0][4]['value']; ?></td>
                                        <td><?php echo $shippingDetails[0][5]['value']; ?></td>
                                        <td><?php echo $shippingDetails[0][11]['value']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <?php foreach($shippingDetails as $key=>$row) {
                            if($key > 0 ) { ?>
                                <div class="cod_container">
                                    <?php foreach ($row as $value) { ?>
                                        <p><?php echo $value['value'] ?></p>
                                    <?php } ?>
                                </div>
                        <?php }
                             }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(function(){
  $('#btn-edit-save').on('click',function(){
    if($(this).attr('data-type')=='edit'){
      $(this).attr('data-type','save')
      $('.label-name').each(function(i){
        $(this).html('<input type="text" value="'+$(this).html()+'" >');
      });
      $(this).html('save')
    }else{
      let data=[];
      $('.label-name').each(function(i){
        data.push({
          'id':$(this).attr('data-id'),
          'name':$(this).find('input').val()
        });
      });
      let url='<?php echo site_url("label/update");?>';
      $.post(url,
       {
           data:data
       },
       function(data,status){
           window.location = "<?= site_url('label'); ?>";
       });
    }
  })
})
</script>
