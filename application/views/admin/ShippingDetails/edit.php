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
                                            <div class="row ">
                                                <div class="shipping_details_container">
                                                    <input type="text" class="form-control input-data" placeholder="Top desciption" data-type="up" value="<?=$shippingDetails[0][0]['value']?>" data-id='<?=$shippingDetails[0][0]['shipping_details_id']?>' data-p='0'>
                                                    <br/>
                                                    <table class="table shipping_table edit">
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td><input type="text" class="form-control input-data" placeholder="Estimated Delivery Time" data-type="up" value="<?=$shippingDetails[0][8]['value']?>" data-id='<?=$shippingDetails[0][8]['shipping_details_id']?>' data-p='0'></td>
                                                                <td><input type="text" class="form-control input-data" placeholder="Standard Shipping fee" data-type="up" value="<?php echo  $shippingDetails[0][9]['value']; ?>" data-id='<?=$shippingDetails[0][9]['shipping_details_id']?>' data-p='0'></td>
                                                                <td><input type="text" class="form-control input-data" placeholder="Purchase Above MYR 150" data-type="up" value="<?php echo  $shippingDetails[0][1]['value']; ?>" data-id='<?=$shippingDetails[0][1]['shipping_details_id']?>' data-p='0'></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control input-data" placeholder="West Malaysia" data-type="up" value="<?php echo  $shippingDetails[0][6]['value']; ?>" data-id='<?=$shippingDetails[0][6]['shipping_details_id']?>' data-p='0'></td>
                                                                <td><input type="text" class="form-control input-data" placeholder="2-3 working days" data-type="up" value="<?php echo  $shippingDetails[0][2]['value']; ?>" data-id='<?=$shippingDetails[0][2]['shipping_details_id']?>' data-p='0'></td>
                                                                <td><input type="text" class="form-control input-data" placeholder="Free Shipping" data-type="up" value="<?php echo  $shippingDetails[0][10]['value']; ?>" data-id='<?=$shippingDetails[0][10]['shipping_details_id']?>' data-p='0'></td>
                                                                <td><input type="text" class="form-control input-data" placeholder="MYR 8" data-type="up" value="<?php echo  $shippingDetails[0][3]['value']; ?>" data-id='<?=$shippingDetails[0][3]['shipping_details_id']?>' data-p='0'></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control input-data" placeholder="East Malaysia" data-type="up" value="<?php echo  $shippingDetails[0][7]['value']; ?>" data-id='<?=$shippingDetails[0][7]['shipping_details_id']?>' data-p='0'></td>
                                                                <td><input type="text" class="form-control input-data" placeholder="4-5 working days" data-type="up" value="<?php echo  $shippingDetails[0][4]['value']; ?>" data-id='<?=$shippingDetails[0][4]['shipping_details_id']?>' data-p='0'></td>
                                                                <td><input type="text" class="form-control input-data" placeholder="MYR 12" data-type="up" value="<?php echo  $shippingDetails[0][5]['value']; ?>" data-id='<?=$shippingDetails[0][5]['shipping_details_id']?>' data-p='0'></td>
                                                                <td><input type="text" class="form-control input-data" placeholder="Free Shipping" data-type="up" value="<?php echo  $shippingDetails[0][11]['value']; ?>" data-id='<?=$shippingDetails[0][11]['shipping_details_id']?>' data-p='0'></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="shipping_group_container">
                                                <?php
                                                $i=0;
                                                foreach($shippingDetails as $key=>$row) {

                                                    if($i > 0 ) { ?>
                                                        <div class="panel panel-default" data-p="<?=$key?>">
                                                            <div class="panel-heading">
                                                                <h4 class="whiteTitle" style="display: inline-block;">Group</h4>
                                                                <a class="btn btn-danger pull-right btn_delete_group" data-p="<?=$key?>" title="delete group"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="panel-input" data-p="<?=$key?>">
                                                                <?php foreach ($row as $value) { ?>
                                                                    <input type="text" data-type="up" class="form-control input-data" data-id="<?=$value['shipping_details_id']?>" data-p="<?=$key?>" placeholder="New Lines" value="<?php echo $value['value']; ?>">
                                                                    <a class="btn btn-danger btn_delete_line" data-id="<?=$value['shipping_details_id']?>" title="delete line"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                                                <?php } ?>
                                                                </div>
                                                                <br/>
                                                                <a class="btn btn-success pull-right btn-add-line" data-p="<?=$key?>">
                                                                add new line
                                                                </a>
                                                            </div>
                                                        </div>
                                                <?php }
                                                $i++;
                                                    }
                                                  ?>
                                              </div>
                                            </div>
                                            <a class="btn btn-warning pull-right" id="btn-add-group">add new group</a>
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

        $('input.input-data').each(function(){
          data.push({
            'id':$(this).attr('data-id'),
            'name':$(this).attr('data-p'),
            'value':$(this).val(),
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
               window.location = "<?php site_url('shippingDetails/edit'); ?>";
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
    let name=-1;
    $('#shippingDetails_form').on('click','.btn-delete-des',function(){
      let elm=$(this);
      if(confirm("Are you sure?")){
        $('.tas-des[data-id='+elm.attr('data-target')+']').addClass('hidden').attr('data-type','del').attr('type','hidden');
        elm.addClass('hidden');
      }
    });

    $('#shippingDetails_form').on('click','.btn_delete_group',function(){
      let elm=$(this);
      if(confirm("Are you sure?")){
        $('input.input-data[data-p='+elm.attr('data-p')+']').attr('data-type','del');
        $('div.panel-default[data-p='+elm.attr('data-p')+']').addClass('hidden');
        elm.addClass('hidden');
      }
    });

    $('#shippingDetails_form').on('click','.btn_delete_line',function(){
      let elm=$(this);
      if(confirm("Are you sure?")){
        $('input.input-data[data-id='+elm.attr('data-id')+']').attr('data-type','del').addClass('hidden');
        elm.addClass('hidden');
      }
    });

    $('#btn-add-group').click(function(){
      $('.shipping_group_container').append('<div class="panel panel-default" data-p="'+name+'">\
          <div class="panel-heading">\
              <h4 class="whiteTitle" style="display: inline-block;">Group</h4>\
              <a class="btn btn-danger pull-right btn_delete_group" data-p="'+name+'" title="delete group"><i class="fa fa-times" aria-hidden="true"></i></a>\
          </div>\
          <div class="panel-body">\
              <div class="panel-input" data-p="'+name+'">\
\
                  <input type="text" data-type="up" data-p="'+name+'" class="form-control input-data" data-id="'+id+'" placeholder="New Lines" value="sample">\
                  <a class="btn btn-danger btn_delete_line" data-id="'+id+'" title="delete line"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>\
              </div>\
              <br/>\
              <a class="btn btn-success pull-right btn-add-line" data-p="'+name+'">\
              add new line\
              </a>\
          </div>\
      </div>');
      id--;
      name--;
    });

    $('#shippingDetails_form').on('click','.btn-add-line',function(){
      let pid=$(this).attr('data-p');
      $('.panel-input[data-p='+pid+']').append('<input type="text" data-type="up" data-p="'+pid+'" class="form-control input-data" data-id="'+id+'" placeholder="New Lines" value="sample">\
      <a class="btn btn-danger btn_delete_line" data-id="'+id+'" title="delete line"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>\
');
      id--;
    });


</script>
