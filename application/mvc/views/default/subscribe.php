<div class="contentWrapper">
    <div id="leftBox">
        <div id="leftBoxContent">
            <h2>Subscribe</h2>
            <div class="textBody">
                You have been successfully added to the mailing list. <br />
                <br />
                <?php   if(isset($this->params['mailChimpSuccess']) && ($this->params['mailChimpSuccess']===true)){ ?>
                A verification message has been sent to your email address, please click on the subscribe link in the email to confirm.
                <?php   } ?>
            </div>
        </div>
    </div>
    <div id="rightWrapper">
        <?php   require_once(__DIR__ . '/../layout/rightNav/downloads.php');
        require_once(__DIR__ . '/../layout/rightNav/subscribe.php');
        require_once(__DIR__.'/../layout/rightNav/googleMap.php');?>
    </div>
</div>