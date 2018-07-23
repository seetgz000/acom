<section class="content-header">
    <h1>
        Shipping Details
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>Category"><i class="fa fa-folder-open"></i> Shipping Details</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="main-shop-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="shipping_details_container">
                            <p>All deliveries will be made via Pos Laju. All shipping fees will be calculated automatically upon check out based on weight and shipping venue.
                            Please refer to the following rates for your kind reference:</p>
                            <table class="table shipping_table">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>Estimated Delivery Time</td>
                                        <td>Standard Shipping fee</td>
                                        <td>Purchase Above MYR 150</td>
                                    </tr>
                                    <tr>        
                                        <td>West Malaysia</td>
                                        <td>2-3 working days</td>
                                        <td>MYR 8</td>
                                        <td>Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <td>East Malaysia</td>
                                        <td>4-5 working days</td>
                                        <td>MYR 12</td>
                                        <td>Free Shipping</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="container-fluid">
                            <p>* Please email a copy of payment slip with your order number/ID attached to cherio.clo@hotmail.com</p>
                            <p>* Your purchased products will not be delivered until we have received confimation. </p>
                            <p>* Tracking number will be provided by email once they are shipped out.</p>
                            <p>* All shipping fees will be calculated automatically upon check out</p>
                        </div>
                        <div class="cod_container">
                            <p>Cash On Delivery:</p>
                            <p>Cash On Delivery (COD) is also available at Subang Jaya, Sunway, Desa Park City and Sungai Buloh.<br/><br/>
                            Subang Jaya & Sunway: 016-2334243<br/><br/>
                            Desa Park City & Sungai Buloh : 012-9774480</p>
                        </div>
                        
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
