<div class="contentWrapper">
    <div id="leftBox">
        <div id="leftBoxContent">
            <h2>About TrxnMVC</h2>
            <div class="textBody">
                TrxnMVC is a very basic MVC Framework that utilises MongoDB.  <br />
                <br />
                Features:<br />
                <ul>
                    <li>Captcha Integration</li>
                    <li>GoogleMap Integration (see rightNav)</li>
                    <li>MongoDB Connectivity</li>
                    <li>User Registration Area and Dashboard</li>
                    <li>Admin Area (Pagetracking Statistics)</li>
                </ul>
                <br />
                It originally started as a learning exercise but seeing as a lot of MVC frameworks out there provided a lot more than I actually required, I decided to build this myself.  <br />
                <br />
                This isn't intended to provide an ideal fit for all solutions but merely a platform for creativity, if you want a very basic framework that provides an integration into MongoDB and don't particularly want to start using the likes of Symfony2 then here's a simplistic framewor for you.
            </div>
        </div>
    </div>
    <div id="rightWrapper">
    <?php   require_once(__DIR__ . '/../layout/rightNav/downloads.php');
            require_once(__DIR__ . '/../layout/rightNav/subscribe.php');
            require_once(__DIR__.'/../layout/rightNav/googleMap.php');?>
    </div>
</div>