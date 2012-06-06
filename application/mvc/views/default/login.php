<h1>Login</h1>

<?php
if(isset($this->params['success']) && ($this->params['success']==false)){ ?>
<div class="error">Unsuccessful Login, please check your credentials</div>
<?php
}
?>

<form action="<?php echo urlpath; ?>/login" method="post">
    <label>Username</label><input type="text" name="username"/><br />
    <label>Password</label><input type="password" name="password"/><br />
    <label></label><input type="submit" />
</form>