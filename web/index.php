<?php

namespace trxnMVC;

//setup error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
require_once(__DIR__.'/../application/libs/Session.class.php');

/*
 * Configurations
 */

require_once(__DIR__.'/../application/config/config.php');
require_once(__DIR__.'/../application/config/paths.php');
require_once(__DIR__.'/../application/config/database.php');

$app = new Bootstrap();