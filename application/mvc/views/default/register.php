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
    <?php if(isset($this->params['captchaEnabled']) && (isset($this->params['captchaPublicKey'])) && ($this->params['captchaEnabled']=='true')){ ?>
    <script type="text/javascript"
            src="http://www.google.com/recaptcha/api/challenge?k=<?php echo $this->params['captchaPublicKey'];?>">
    </script>
    <noscript>
        <iframe src="http://www.google.com/recaptcha/api/noscript?k=<?php echo $this->params['captchaPublicKey'];?>"
                height="300" width="500" frameborder="0"></iframe><br>
        <textarea name="recaptcha_challenge_field" rows="3" cols="40">
        </textarea>
        <input type="hidden" name="recaptcha_response_field"
               value="manual_challenge">
    </noscript>
    <?php } ?>
    <label></label><input type="submit" />
</form>