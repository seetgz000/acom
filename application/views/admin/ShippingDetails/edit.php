<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Edit Shipping Details
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <form id="shippingDetails_form" method="POST" action="<?php site_url("shippingDetails/edit/") ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="clearfix"></div>
                                            <div class="row">
                                                <div class="shipping_details_container">
                                                    <input type="text" class="form-control" placeholder="Top desciption" value="<?php echo $shippingDetails[0]['value'][0]['value']; ?>">
                                                    <br/>
                                                    <table class="table shipping_table edit">
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td><input type="text" class="form-control" placeholder="Estimated Delivery Time" value="<?php echo $shippingDetails[8]['value'][0]['value']; ?>"></td>
                                                                <td><input type="text" class="form-control" placeholder="Standard Shipping fee" value="<?php echo  $shippingDetails[9]['value'][0]['value']; ?>"></td>
                                                                <td><input type="text" class="form-control" placeholder="Purchase Above MYR 150" value="<?php echo  $shippingDetails[1]['value'][0]['value']; ?>"></td>
                                                            </tr>
                                                            <tr>        
                                                                <td><input type="text" class="form-control" placeholder="West Malaysia" value="<?php echo  $shippingDetails[6]['value'][0]['value']; ?>"></td>
                                                                <td><input type="text" class="form-control" placeholder="2-3 working days" value="<?php echo  $shippingDetails[2]['value'][0]['value']; ?>"></td>
                                                                <td><input type="text" class="form-control" placeholder="MYR 8" value="<?php echo  $shippingDetails[3]['value'][0]['value']; ?>"></td>
                                                                <td><input type="text" class="form-control" placeholder="Free Shipping" value="<?php echo  $shippingDetails[10]['value'][0]['value']; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" placeholder="East Malaysia" value="<?php echo  $shippingDetails[7]['value'][0]['value']; ?>"></td>
                                                                <td><input type="text" class="form-control" placeholder="4-5 working days" value="<?php echo  $shippingDetails[4]['value'][0]['value']; ?>"></td>
                                                                <td><input type="text" class="form-control" placeholder="MYR 12" value="<?php echo  $shippingDetails[5]['value'][0]['value']; ?>"></td>
                                                                <td><input type="text" class="form-control" placeholder="Free Shipping" value="<?php echo  $shippingDetails[11]['value'][0]['value']; ?>"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                                <?php foreach($shippingDetails as $row) {
                                                    if($row['shipping_details_id'] > 12 ) { ?>
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="whiteTitle" style="display: inline-block;">Group</h4>
                                                            </div>
                                                            <div class="panel-body">
                                                                <?php foreach ($row['value'] as $value) { ?>
                                                                    <input type="text" class="form-control" placeholder="New Lines" value="<?php echo $value['value']; ?>">
                                                                <?php } ?>
                                                                <br/>
                                                                <a class="btn btn-success pull-right" id="btn-add-line">
                                                                add new line
                                                                </a>
                                                            </div>
                                                        </div>
                                                <?php }
                                                    }
                                                ?>
                                                <br/>
                                                <a class="btn btn-warning pull-right" id="btn-add-group">add new group</a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <br/>
                                    <input type="submit" class="btn btn-flat btn-info pull-right" value="save">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function form_submit(form) {
        var data = [];

        $('input.tas-des').each(function(){
          data.push({
            'header':$('#tas-head').val(),
            'des':$(this).val(),
            'id':$(this).attr('data-id'),
            'type':$(this).attr('data-type')
          })
        })
        var url = $(form).attr("action");


        $.post(url,
         {
             data:data
         },
         function(data,status){
           $("body").loadingModal({
               text: "Successfully updated"
           });
           setTimeout(function () {
               window.location = "<?php site_url('TermAndCondition'); ?>";
           }, 1500);

         });
    }
    $(document).ready(function () {

        var shippingDetails_form = document.getElementById("shippingDetails_form");
        shippingDetails_form.addEventListener("submit", function (e) {
            e.preventDefault();
            form_submit(shippingDetails_form);
        });
        var basic_elements = ["form_shippingDetails"];
        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#basic"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }
    });
    let id=-1;
    $('#shippingDetails_form').on('click','.btn-delete-des',function(){
      let elm=$(this);
      if(confirm("Are you sure?")){
        $('.tas-des[data-id='+elm.attr('data-target')+']').addClass('hidden').attr('data-type','del').attr('type','hidden');
        elm.addClass('hidden');
      }
    });

    $('#btn-add-line').click(function(){
      $('#shippingDetails_form').append('<br class=\'tas-des\' data-id="'+id+'" />\
                              <br class=\'tas-des\' data-id="'+id+'" />\
      <input type="text" class="form-control tas-des" required data-id="'+id+'" data-type=\'new\' placeholder="Body"  value="">\
      <a class="btn btn-danger btn-delete-des" data-target="'+id+'">delete</a>');
      id--;
    });


</script>
