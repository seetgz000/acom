<div class="mediumBox">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            <div class="box box-default">
                <div class="box-header">
                    Add Admin
                </div>
                <div class="box-body">
                    <form id="user_form" method="POST" action="<?php echo site_url("User/do_add_admin"); ?>" >
                        <div class="alert alert-danger hidden user_form_alert" id="form_alert">
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Username</label>
                                <input type="text" class="form-control" required name="username" placeholder="username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Email</label> <small> <i> a password will be sent to this email </i> </small>
                                <input type="email" class="form-control" required name="email" placeholder="email" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="full_name" required placeholder="Full Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Nick Name</label> <i><small>optional</small></i>
                                <input type="text" class="form-control" name="nick_name"  placeholder="Nick Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Contact </label>
                                <input type="text" class="form-control" name="contact"  placeholder="xxxxxxxxxx" required>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <label>Role</label>
                                <select name="role_id" class="form-control">
                                    <?php foreach($roles as $row){ ?>
                                    <option value="<?= $row['role_id']; ?>"><?= $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <br />
                        <input type="submit" class="btn btn-flat btn-info pull-right" value="add">


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var user_form = document.getElementById("user_form");
        
        user_form.addEventListener("submit",function(e){
            e.preventDefault();
            form_submit(user_form);
        });
        
    });
</script>