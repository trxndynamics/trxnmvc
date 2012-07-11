<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>TrxnMVC Showcase</title>

    <!-- Google Webfonts and our stylesheet -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow|Open+Sans:300" />
    <link rel="stylesheet" href="<?php echo urlpath; ?>/public/css/showcase/showcase.css" />

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

<div id="impress" class="impress-not-supported">

    <div id="intro" class="step" data-x="0" data-y="0">
        <h2>TrxnMVC Features</h2>
        <p>TrxnMVC is an MVC Framework that utilizes MongoDB.<br />
            <br />
            Features include integrations into MailChimp, Google and Twitter,<br />
            an administration area and a user area which users can register, <br />
            subscribe and login.<br />
        </p>
    </div>

    <div id="integrations" class="step" data-x="1100" data-y="1200" data-scale="1.8" data-rotate="190">
        <h2>Integrations</h2>
        <p><br />TrxnMVC integrates into: <br /><br />
            MailChimp for Email Management<br />
            Twitter for Social Networking<br />
            Google Captcha for form verification<br />
            Google Maps for displaying your location</p>
    </div>

    <div id="create" class="step" data-x="-300" data-y="600" data-scale="0.2" data-rotate="270">
        <h2>Code &amp; Create</h2>
        <p>TrxnMVC aims to improve web development. <br />It provides a platform for learning how to use Model-View-Controller frameworks aswell as providing a platform for creating your own websites.</p>
    </div>

    <div id="social" class="step" data-x="-200" data-y="1500" data-rotate="180">
        <h2>Social Networking</h2>
        <p>TrxnMVC integrates into Twitter and MailChimp, providing you with two different methods of communication with your contacts.</p>
    </div>

    <div id="website" class="step" data-x="-1200" data-y="1000" data-scale="0.8" data-rotate="270">
        <h2>Visit The Website</h2>
        <p>
            <br /><br />
            To find out more information about TrxnMVC and its uses go to <a href="http://www.trxnmvc.com">www.trxnmvc.com</a><br /><br />
            Download TrxnMVC from <a href="https://github.com/trxndynamics/trxnmvc">GitHub</a><br /></p>
    </div>

</div>

<a id="arrowLeft" class="arrow">&lt;</a>
<a id="arrowRight" class="arrow">&gt;</a>

<footer>
    <a class="tzine" href="http://www.trxnmvc.com">Head on over to <i><b>TrxnMVC</b></i> for more information</a>
</footer>

<!-- JavaScript includes -->
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="<?php echo urlpath; ?>/public/js/showcase/impress.js"></script>
<script src="<?php echo urlpath; ?>/public/js/showcase/script.js"></script>

</body>
</html>