This is the default navigation

<?php
if(\trxnMVC\Session::get('loggedIn') == true){ ?>
<a href='<?php echo urlpath;?>/logout'>Logout</a>
<?php
} else { ?>
<a href='<?php echo urlpath;?>/login'>Login</a>
<?php
} ?>