<link rel="stylesheet" type="text/css" href="<?php echo urlpath; ?>/public/css/featured-content-slider/featured-content-slider.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" ></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
    });
</script>
<div class="contentWrapper">
    <div id="leftBox">
        <div id="leftBoxContent">
            <h2>TrxnMVC Framework</h2>
            <div class="textBody">
                TrxnMVC is a very basic MVC Framework that utilises MongoDB.  <br />
                <br />
                This website is running on TrxnMVC Framework.  When you download via GitHub you get this version or an improved version of the TrxnMVC Framework.            </div>
            <div id="featured" >
                <ul class="ui-tabs-nav">
                    <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1"><a href="#fragment-1"><img src="<?php echo urlpath; ?>/public/images/featured-content-slider/image1-small.jpg" alt="" /><span>Social Networking and User Management</span></a></li>
                    <li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment-2"><img src="<?php echo urlpath; ?>/public/images/featured-content-slider/image2-small.jpg" alt="" /><span>MongoDB Integration and Starter Pack</span></a></li>
                    <li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment-3"><img src="<?php echo urlpath; ?>/public/images/featured-content-slider/image3-small.jpg" alt="" /><span>Administration Area Provided</span></a></li>
                    <li class="ui-tabs-nav-item" id="nav-fragment-4"><a href="#fragment-4"><img src="<?php echo urlpath; ?>/public/images/featured-content-slider/image4-small.jpg" alt="" /><span>Showcase Your Talents</span></a></li>
                </ul>

                <!-- First Content -->
                <div id="fragment-1" class="ui-tabs-panel" style="">
                    <img src="<?php echo urlpath; ?>/public/images/featured-content-slider/image1.jpg" alt="" />
                    <div class="info" >
                        <h2><a href="#" >Social Networking</a></h2>
                        <p>Have visitors subscribe to your mailing lists, display your twitter feed and provide them with the ability to login to a user area</p>
                    </div>
                </div>

                <!-- Second Content -->
                <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide" style="">
                    <img src="<?php echo urlpath; ?>/public/images/featured-content-slider/image2.jpg" alt="" />
                    <div class="info" >
                        <h2><a href="#" >MongoDB Integration</a></h2>
                        <p>Provides a starter class to allow you to integrate your development with a NoSQL Database using MongoDB</p>
                    </div>
                </div>

                <!-- Third Content -->
                <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide" style="">
                    <img src="<?php echo urlpath; ?>/public/images/featured-content-slider/image3.jpg" alt="" />
                    <div class="info" >
                        <h2><a href="#" >Administration Area</a></h2>
                        <p>Displays page access statistics and provides an area for you to build your own statistics</p>
                    </div>
                </div>

                <!-- Fourth Content -->
                <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide" style="">
                    <img src="<?php echo urlpath; ?>/public/images/featured-content-slider/image4.jpg" alt="" />
                    <div class="info" >
                        <h2><a href="<?php echo urlpath; ?>/demo/showcase" >Talent showcase</a></h2>
                        <p>Showcase your talents by using some of the latest showcase techniques, see <a href="<?php echo urlpath; ?>/demo/showcase">example here</a></p>
                    </div>
                </div>
            </div>
            <div class="textBody">
                <br />
                TrxnMVC is also good at being used for mobile web development (non-native), see the following webpage for example: <a href="<?php echo urlpath; ?>/mobile/index"><span> (sample mobile website)</span></a><br />
                <br />
                <a href="<?php echo urlpath; ?>/demo/showcase">See the TrxnMVC Showcase</a>
            </div>
        </div>
    </div>
    <div id="rightWrapper">
        <?php   require_once(__DIR__ . '/../layout/rightNav/downloads.php');
        require_once(__DIR__ . '/../layout/rightNav/subscribe.php');
        require_once(__DIR__.'/../layout/rightNav/twitter.php');?>
    </div>
</div>