<?php
if(isset($this->params['selectedTab'])){
    var_dump($this->params['selectedTab']);
    $selected = $this->params['selectedTab'];
} else $selected = 'dashboard';

if(\trxnMVC\Session::get('loggedIn') === null){
    require_once(__DIR__.'/../topNav/default.php');
    exit();
}
?>

<div id="navArea">
    <div id="navList" align="center">
        <ul>
            <li class="navItem<?php if($selected==='dashboard')      echo 'Selected';?>"><a href="<?php echo urlpath;?>/dashboard/index">Dashboard</a></li>
            <?php   if(\trxnMVC\Session::get('loggedIn') === null){ ?>
            <li class="navItem<?php if($selected==='home')      echo 'Selected';?>"><a href="<?php echo urlpath;?>">Home</a></li>
            <li class="navItem<?php if($selected==='login')    echo 'Selected';?>"><a href="<?php echo urlpath; ?>/login">Login</a></li>
            <li class="navItem<?php if($selected==='register')    echo 'Selected';?>"><a href="<?php echo urlpath; ?>/register">Register</a></li>
            <?php   } else if(\trxnMVC\Session::get('loggedIn') == true){ ?>
            <li class="navItem"><a href="<?php echo urlpath; ?>/logout">Logout</a></li>
            <?php   } ?>
        </ul>
    </div>
</div>