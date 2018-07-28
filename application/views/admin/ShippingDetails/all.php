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
                            <p><?php echo $shippingDetails[0]['value'][0]['value']; ?></p>
                            <table class="table shipping_table">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $shippingDetails[8]['value'][0]['value']; ?></td>
                                        <td><?php echo $shippingDetails[9]['value'][0]['value']; ?></td>
                                        <td><?php echo $shippingDetails[1]['value'][0]['value']; ?></td>
                                    </tr>
                                    <tr>        
                                        <td><?php echo $shippingDetails[6]['value'][0]['value']; ?></td>
                                        <td><?php echo $shippingDetails[2]['value'][0]['value']; ?></td>
                                        <td><?php echo $shippingDetails[3]['value'][0]['value']; ?></td>
                                        <td><?php echo $shippingDetails[10]['value'][0]['value']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $shippingDetails[7]['value'][0]['value']; ?></td>
                                        <td><?php echo $shippingDetails[4]['value'][0]['value']; ?></td>
                                        <td><?php echo $shippingDetails[5]['value'][0]['value']; ?></td>
                                        <td><?php echo $shippingDetails[11]['value'][0]['value']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <?php foreach($shippingDetails as $row) {
                            if($row['shipping_details_id'] > 12 ) { ?>
                                <div class="cod_container">
                                    <?php foreach ($row['value'] as $value) { ?>
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