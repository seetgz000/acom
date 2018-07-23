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
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <input type="text" class="form-control tas-head" required name="term_and_condition_header" placeholder="Body" id="tas-head" value="<?= $term_and_condition[0]['term_and_condition_header'] ?>">
                                    <?php
                                      foreach ($term_and_condition as $key=>$var) {
                                    ?>
                                    <br />
                                    <input type="text" class="form-control tas-des" required name="term_and_condition_description" data-id="<?=$var['term_and_condition_id']?>" placeholder="Body" id="form_name" value="<?= $var['term_and_condition_description'] ?>">
                                    <?php
                                      }
                                    ?>
									               </div>
                            </div>
                            <br/>
                            <input type="submit" class="btn btn-flat btn-info pull-right" value="edit">
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

        $('.tas-des').each(function(){
          data.push({
            'header':$('#tas-head').val(),
            'des':$(this).val(),
            'id':$(this).attr('data-id')
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
</script>
