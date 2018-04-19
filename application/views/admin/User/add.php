<div class="modal fade" tabindex="-1" role="dialog" id="user_type_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose your User Type</h4>
            </div>
            <div class="modal-body">
                <select id="user_type" class="form-control">
                    <option value="ADMIN">Administrative</option>
                    <option value="SALE">Agent</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" id="user_type_btn" class="btn btn-primary">Go</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<br />
<div id="user_add_content">

</div>
<script>
    $(document).ready(function () {
        $('#user_type_modal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#user_type_btn").click(function () {
            var url = "<?= site_url("User/load_add_user_form"); ?>/" + $("#user_type").val();

            $.get(url, function (response) {
                $("#user_add_content").html(response);
            });

            $("#user_type_modal").modal("hide");
        });
    });
    
    function form_submit(form){
        var data = new FormData(form);
            var url = $(form).attr("action");
            $.ajax({
                url : url,
                data : data,
                processData : false,
                contentType : false,
                type : "POST",
                success : function(data){
                    if(data.status){
                        $("body").loadingModal({
                            text : "Successfully added"
                        });
                        setTimeout(function(){
                            window.location = "<?= site_url('User'); ?>";
                        },1500);
                    }else{
                        $(".user_form_alert").html(data.message);
                        $(".user_form_alert").removeClass("hidden");
                    }
                },
                
                dataType : "JSON"
            });
    }

    
</script>