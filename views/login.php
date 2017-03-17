<form action="login.php" method="post" class="form-horizontal">
    <fielset>
        <legend>Log In</legend>
        <?php if($errorMessage) { echo '<div class="alert alert-danger" role="alert">'.$errorMessage.'</div>'; } ?>
        <div class="form-group" <?php if($errorMessage) { echo 'class="has-error"'; }?>>
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-5">
                <input type="text" name="username" id="username" placeholder="Username" class="form-control">
            </div>
        </div>
        <div class="form-group" <?php if($errorMessage) { echo 'class="has-error"'; }?>>
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-5">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="submit" value="Login" class="btn btn-primary">
            </div>
        </div>
    </fielset>
</form>