<?php

namespace trxnMVC;

$debugMode = true;

if($debugMode == true){
    //setup error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

/*
 * Basic Requirements
 */
require_once(__DIR__.'/../application/libs/BaseController.class.php');
require_once(__DIR__.'/../application/libs/BaseModel.class.php');
require_once(__DIR__.'/../application/libs/BaseView.class.php');
require_once(__DIR__.'/../application/libs/Bootstrap.class.php');

/*
 * Library
 */
require_once(__DIR__.'/../application/libs/MongoDB.database.class.php');
require_once(__DIR__ . '/../application/libs/TrxnSession.class.php');

/*
 * Configurations
 */

require_once(__DIR__.'/../application/config/config.php');

if(isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST']=='trxnmvc.localhost')){
    require_once(__DIR__ . '/../application/config/localpaths.php');
} else {
    require_once(__DIR__.'/../application/config/paths.php');
}

$app = new Bootstrap();