<div class="contentWrapper">
    <div id="leftBox">
        <div id="leftBoxContent">
            <h2>Login</h2>
            <div class="textBody">
                <?php
                if(isset($this->params['success']) && ($this->params['success']==false)){ ?>
                    <div class="error">Unsuccessful Login, please check your credentials</div>
                    <?php
                }
                ?>

                <form action="<?php echo urlpath; ?>/login" method="post">
                    <legend></legend>
                    <div class="formContent">
                        <div class="formLabel"><label for="username">Username</label></div>
                        <div class="formInput"><input type="text" id="username" name="username"/></div>
                        <br />
                        <div class="formLabel"><label for="password">Password</label></div>
                        <div class="formInput"><input type="password" id="password" name="password"/></div><br />
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
