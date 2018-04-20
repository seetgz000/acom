<div class='loginBox '>
    <div class="panel-heading">
        Reset Password
    </div>
    <div class='panel-body'>
        <form method="post">
            <label>New Password</label>
            <input name='password' type="password" class="form-control"/>
            <br/>
            <label>Confirm Password</label>
            <input name='password2' type="password" class="form-control"/>
            <div class ="button-container">
                <input type="submit" value='Reset Password' class="btn btn-default" style='margin-top : 3%;margin-left: 75%;margin-bottom : 5%;'>
            </div>
        </form>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger alert-dismissable">
                <?php echo $error; ?>
            </div>
        <?php }; ?>
    </div>

</div>
