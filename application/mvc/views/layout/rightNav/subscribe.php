<?php if(trxnMVC\Session::get('subscribedToMailingList') !== true){ ?>
<div class="rightBox">
    <div class="rightBoxContent">
        <h3>Subscribe</h3>
        <hr />
        <div class="textBodyRight">
            If you want to be kept in touch with the latest goings on TrxnMVC then please subscribe<br />
            <br />
            <form action="<?php echo urlpath; ?>/subscribe" method="post">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"/>
                <input type="submit" />
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>