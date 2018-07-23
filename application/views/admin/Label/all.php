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
                <button class='btn btn-info pull-right hidden' id="btn-add" data-type="add">
                    <i class='glyphicon glyphicon-plus' ></i> Add</button>
            </div>
            <div class='panel-body'>

                <div id="refreshBox">
                    <table id="data-table" class="table table-bordered table-hover data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Label</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php
                              $i=1;
                              foreach($label_data as $var){
                                if($var['label_id']<>4){
                                ?>
                                <tr data-id='<?=$var['label_id']?>'>
                                  <td><?=$i?></td>
                                  <td <?=!in_array($var['label_id'],array(1,2,3))?'class="label-mark"':''?> data-id='<?=$var['label_id']?>' data-type='' ><?=$var['Name']?></td>
                                  <td class="label-name" data-id='<?=$var['label_id']?>' data-type=''><?=$var['Value']?></td>
                                  <td>
                                    <?php
                                    if(!in_array($var['label_id'],array(1,2,3))){
                                      ?>
                                      <button class="btn btn-danger hidden btn-delete" data-target="<?=$var['label_id']?>">Delete</button>
                                      <?php
                                    }
                                    ?>
                                  </td>
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
                                <th></th>
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

      $('.label-mark').each(function(i){
        $(this).html('<input type="text" value="'+$(this).html()+'" >');
      });

      $('#btn-add').removeClass('hidden');
      $('.btn-delete').removeClass('hidden');
      $(this).html('save')
    }else{
      let data=[];
      $('.label-name').each(function(i){
        data.push({
          'id':$(this).attr('data-id'),
          'type':$(this).attr('data-type'),
          'name':$(this).find('input').val(),
          'mark':$(this).closest('tr').find('.label-mark').find('input').val()
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
  let newID=0;
  $('#btn-add').click(function(){
    newID--;
    $('#table-body').append('<tr data-id=\''+newID+'\'>\
      <td></td>\
      <td class="label-mark" data-id=\''+newID+'\' data-type=\'\' ><input type="text" value="sample"></td>\
      <td class="label-name" data-id=\''+newID+'\' data-type=\'\'><input type="text" value="sample"></td>\
      <td>\
      \
          <button class="btn btn-danger btn-delete" data-target="'+newID+'">Delete</button>\
      </td>\
    </tr>')
  });

  $('#data-table').on('click','.btn-delete',function(){
    let elm=$(this);
    if(confirm('Are you sure?')){
      elm.closest('tr').addClass('hidden');
      elm.closest('tr').find('.label-name').attr('data-type','del');
    }
  })
})
</script>
