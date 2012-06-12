<?php if(trxnMVC\Session::get('subscribedToMailingList') !== true){ ?>
<div class="rightBox">
    <div class="rightBoxContent">
        <h3>Twitter</h3>
        <hr />
        <div class="textBodyRight">
            <script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
            <script>
                new TWTR.Widget({
                    version: 2,
                    type: 'profile',
                    rpp: 4,
                    interval: 30000,
                    width: 275,
                    height: 275,
                    theme: {
                        shell: {
                            background: '#333333',
                            color: '#ffffff'
                        },
                        tweets: {
                            background: '#000000',
                            color: '#ffffff',
                            links: '#4aed05'
                        }
                    },
                    features: {
                        scrollbar: false,
                        loop: false,
                        live: false,
                        behavior: 'all'
                    }
                }).render().setUser('<?php echo trxnMVC\twitterusername;?>').start();
            </script>
        </div>
        </form>
    </div>
</div>
</div>
<?php } ?>