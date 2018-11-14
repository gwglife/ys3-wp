<?php
ini_set('memory_limit','64M');
ini_set('max_execution_time', 10800);
ini_set('soap.wsdl_cache_enabled', '0');
ini_set("display_errors", 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
//error_reporting(E_ERROR & E_PARSE);
include("globals.php");
require_once "database.class.php";
//include("error.class");
//controls our session
include("allowed.php");
include("utility.php");
include("controller.php");
?>