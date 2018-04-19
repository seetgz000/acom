<<<<<<< HEAD
<section class="content-header">
    <h1>
        Agents
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>agent"><i class="fa fa-users"></i> Agents</a></li>
        <li><a href="<?= base_url() ?>agent/add">Add agents</a></li>
    </ol>
</section>
<br>
=======
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

<script>
    $(document).ready(function () {
       
        $("#user_type_btn").click(function () {
            alert($("#user_type").val());
        });
    });
</script>
>>>>>>> 0fa3017c51b6eb6a723ec0eb80d3d41e4501eeb1
