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
    <link rel="stylesheet" href="<?php echo urlpath; ?>/public/css/base.css" />
    <script type="text/javascript" src="<?php echo urlpath; ?>/public/js/jquery.js"></script>
</head>
<body>
<div id="header">
    This is the dashboard header<br />
    <?php require_once(__DIR__.'/../topNav/default.php'); ?>
</div>
<div id="content">