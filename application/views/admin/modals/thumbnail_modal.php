<div class="modal fade" tabindex="-1" role="dialog" id="thumbnail_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h4 class="modal-title">Change thumbnail</h4>
            </div>
            <form method="POST" action="<?= site_url("User/changeThumbnail/".$agent['user_id']."?current_url=".  urlencode(current_url())); ?>" enctype="multipart/form-data">
            <div class="modal-body bg-gray" style="text-align:center;">
                <div class="thumbnail_wrapper">
                    <img src="<?= site_url().$this->session->userdata("thumbnail"); ?>" class="img-circle thumbnail" id="modal_img_preview">
                </div>
                <input type="file" onchange="imagePreview(this)" data-target="modal_img_preview" name="thumbnail" class="form-control" style="width:50%;margin-left : 25%;">
            </div>
            
            <div class="modal-footer bg-gray-active">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="dum" value="1" id="user_type_btn" class="btn btn-primary">Go</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function(){
        $(".user_thumbnail").click(function(){
            $("#thumbnail_modal").modal("show");
        });
    });
</script>