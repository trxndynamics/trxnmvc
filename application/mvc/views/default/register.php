<div class="contentWrapper">
    <div id="leftBox">
        <div id="leftBoxContent">
            <h2>Register</h2>
            <div class="textBody">
                <?php
                if(isset($this->params['success']) && ($this->params['success']==false)){ ?>
                    <div class="error">Unsuccessful Login, please check your credentials</div>
                    <?php
                }
                ?>

                <form action="<?php echo urlpath; ?>/register" method="post">
                    <legend></legend>
                    <div class="formContent">
                        <div class="formLabel"><label for="username">Username</label></div>
                        <div class="formInput"><input type="text" id="username" name="username"/></div>
                        <br />
                        <div class="formLabel"><label for="password">Password</label></div>
                        <div class="formInput"><input type="password" id="password" name="password"/></div>
                        <br />
                        <div class="formLabel"><label for="passwordConfirm">Password Confirm</label></div>
                        <div class="formInput"><input type="password" id="passwordConfirm" name="passwordConfirm"/></div><br />
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
                        <input class="button" type="submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="rightWrapper">
        <?php   require_once(__DIR__ . '/../layout/rightNav/downloads.php');
        require_once(__DIR__ . '/../layout/rightNav/subscribe.php');
        require_once(__DIR__.'/../layout/rightNav/googleMap.php');?>
    </div>
</div>