<section class="content-header">
    <h1>
        Label
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>Category"><i class="fa fa-folder-open"></i> Label</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="mediumBox">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h4 class="whiteTitle" style='display: inline-block;'>Label</h4>
                <button class='btn btn-info pull-right' id="btn-edit-save" data-type="edit">
                    <i class='glyphicon glyphicon-plus' ></i> Edit</button>
            </div>
            <div class='panel-body'>

                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Label</th>
                                <th>Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $i=1;
                              foreach($label_data as $var){
                                if($var['label_id']<>4){
                                ?>
                                <tr>
                                  <td><?=$i?></td>
                                  <td><?=$var['Name']?></td>
                                  <td class="label-name" data-id='<?=$var['label_id']?>'><?=$var['Value']?></td>

                                </tr>
                                <?php
                                $i++;
                                }
                              }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Label</th>
                                <th>Name</th>
                            </tr>
                        </tfoot>
                    </table>
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
