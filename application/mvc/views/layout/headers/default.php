<!doctype html>
<html>
<head>
    <title><?php if(isset($this->customTitle)) echo $this->customTitle; else echo 'TrxnMVC'; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo urlpath; ?>/public/css/base.css" />
    <script type="text/javascript" src="<?php echo urlpath; ?>/public/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo urlpath; ?>/public/js/jquery-ui-1.8.20.custom.min.js"></script>
</head>
<body>
<div id="header">
    <div id="topArea">
        <div id="topNav" align="center">
            <div id="logo">
                <div id="logoText"><h1><a class="mainLogoText" href="<?php echo urlpath;?>">TrxnMVC</a> | Sampler</h1></div>
            </div>
            <div id="logoSubText">A sample MVC MongoDB Framework</div>
        </div>
    </div>
    <?php require_once(__DIR__.'/../topNav/default.php'); ?>
</div>
<div class="spacer"></div>
<div id="content">