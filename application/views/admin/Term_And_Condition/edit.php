<br />
<div id="user_add_content">
    <div class="mediumBox">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                        Edit Terms And Conditions
                    </div>
                    <div class="box-body">

                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">

                        </div>
                        <form id="collection_form" method="POST" action="<?php echo site_url("TermAndCondition/edit/" . $term_and_condition[0]['term_and_condition_id']); ?>">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <label>Term And Condition</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id='EditArea'>


                                      <label>header</label>

                                    <input type="text" class="form-control tas-head" required name="term_and_condition_header" placeholder="Body" id="tas-head" value="<?= $term_and_condition[0]['term_and_condition_header'] ?>">
                                    <br>
                                        <label>description</label>


                                    <?php
                                      foreach ($term_and_condition as $key=>$var) {
                                    ?>
                                    <br class='tas-des' data-id="<?=$var['term_and_condition_id']?>" />
                                    <br class='tas-des' data-id="<?=$var['term_and_condition_id']?>" />
                                    <input type="text" class="form-control tas-des" required data-id="<?=$var['term_and_condition_id']?>" data-type='up' placeholder="Body"  value="<?= $var['term_and_condition_description'] ?>">
                                    <a class="btn btn-danger btn-delete-des" data-target="<?=$var['term_and_condition_id']?>">delete</a>
                                    <?php
                                      }
                                    ?>
									               </div>
                                 <br>

                            </div>
                            <br/>
                            <a class="btn btn-success pull-right" id="btn-add-des">
                              add
                            </a>
                            <hr>
                            <br/>
                            <input type="submit" class="btn btn-flat btn-info pull-right" value="save">
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
               window.location = "<?= site_url('TermAndCondition'); ?>";
           }, 1500);

         });
    }
    $(document).ready(function () {

        var collection_form = document.getElementById("collection_form");
        collection_form.addEventListener("submit", function (e) {
            e.preventDefault();
            form_submit(collection_form);
        });
        var basic_elements = ["form_collection"];
        for (var i = 0; i < basic_elements.length; i++) {
            document.getElementById(basic_elements[i]).addEventListener("invalid", function () {
                $('#tabs a[href="#basic"]').tab('show');
                $("#" + basic_elements[i]).css("background-color", "#f7ada3");
            });
        }
    });
    let id=-1;
    $('#EditArea').on('click','.btn-delete-des',function(){
      let elm=$(this);
      if(confirm("Are you sure?")){
        $('.tas-des[data-id='+elm.attr('data-target')+']').addClass('hidden').attr('data-type','del').attr('type','hidden');
        elm.addClass('hidden');
      }
    });

    $('#btn-add-des').click(function(){
      $('#EditArea').append('<br class=\'tas-des\' data-id="'+id+'" />\
                              <br class=\'tas-des\' data-id="'+id+'" />\
      <input type="text" class="form-control tas-des" required data-id="'+id+'" data-type=\'new\' placeholder="Body"  value="">\
      <a class="btn btn-danger btn-delete-des" data-target="'+id+'">delete</a>');
      id--;
    });


</script>
