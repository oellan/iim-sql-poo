<?php

session_start();

$path = explode("index.php", $_SERVER["SCRIPT_NAME"]);
$path = dirname($_SERVER['SERVER_PROTOCOL'])."://".$_SERVER["HTTP_HOST"].$path[0];
define("URI", $path);

define("ROOT", dirname(__DIR__));
require ROOT."/Autoloader.php";
Autoloader::register();

require ROOT."/router.php";