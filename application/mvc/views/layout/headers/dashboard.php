<?php
    if(\trxnMVC\Session::get('loggedIn') == null){
        \trxnMVC\Session::destroy();
        header('Location: ../logout');
        exit();
    }
?>
<!doctype html>
<html>
<head>
    <title><?php if(isset($this->customTitle)) echo $this->customTitle; else echo 'TrxnMVC'; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo urlpath; ?>/public/css/base.css" />
    <link href='http://fonts.googleapis.com/css?family=Quattrocento' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo urlpath; ?>/public/js/jquery.js"></script>
</head>
<body>
<div id="topArea">
    <div id="topNav" align="center">
        <div id="logo">
            <div id="logoText"><h1><a class="mainLogoText" href="<?php echo urlpath;?>">TrxnMVC</a> | Sampler</h1></div>
        </div>
        <div id="logoSubText">A sample MVC MongoDB Framework: The Dashboard Area</div>
    </div>
</div>
<?php require_once(__DIR__.'/../topNav/dashboard.php'); ?>
<div class="spacer"></div>
<div id="content">