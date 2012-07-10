<!DOCTYPE html>
<html>
<head>
    <title>TrxnMVC Mobile</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
    <script type="text/javascript" src="mobile.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div data-role="page" id="welcome">
    <div data-role="header">
        <h1>TrxnMVC</h1>
    </div>
    <div data-role="content">
        <p>Welcome to the TrxnMVC Mobile App.</p>
        <p>This is a non-native mobile application built using JQuery Mobile and integrated into the TrxnMVC Framework.</p>
        <a href="<?php echo urlpath;?>/mobile/register" rel="external" data-role="button">Register Here</a>
    </div>
</div>
</body>
</html>