<h1>Register</h1>

<?php
if(isset($this->params['success']) && ($this->params['success']==false)){ ?>
<div class="error">Unsuccessful Registration, Please Try A Different Username</div>
<?php
} ?>

<form action="<?php echo urlpath; ?>/register" method="post">
    <label>Username</label><input type="text" name="username"/><br />
    <label>Password</label><input type="password" name="password"/><br />
    <label>Password Confirm</label><input type="password" name="passwordConfirm"/><br />
    <label></label><input type="submit" />
</form>