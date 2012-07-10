<?php
if(isset($this->params['selectedTab'])){
    $selected = $this->params['selectedTab'];
} else $selected = 'home';
?>

<div id="navArea">
    <div id="navList" align="center">
        <ul>
            <li class="navItem<?php if($selected==='home')      echo 'Selected';?>"><a href="<?php echo urlpath;?>">Home</a></li>
            <li class="navItem<?php if($selected==='about')      echo 'Selected';?>"><a href="<?php echo urlpath;?>/about">About</a></li>
    <?php   if(\trxnMVC\TrxnSession::get('loggedIn') === null){ ?>
            <li class="navItem<?php if($selected==='login')    echo 'Selected';?>"><a href="<?php echo urlpath; ?>/login">Login</a></li>
            <li class="navItem<?php if($selected==='register')    echo 'Selected';?>"><a href="<?php echo urlpath; ?>/register">Register</a></li>
    <?php   } else if(\trxnMVC\TrxnSession::get('loggedIn') == true){ ?>
            <li class="navItem"><a href="<?php echo urlpath; ?>/logout">Logout</a></li>
    <?php   } ?>
        </ul>
    </div>
</div>