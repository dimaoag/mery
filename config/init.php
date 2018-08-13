<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . "/public");
define("APP", ROOT . "/app");
define("CORE", ROOT . "/vendor/mery/core");
define("LIBS", ROOT . "/vendor/mery/core/libs");
define("CACHE", ROOT . "/tmp/cache");
define("CONFIG", ROOT . "/config");
define("LAYOUT", "mery");

//http://shop2.com
$app_path = "http://{$_SERVER['HTTP_HOST']}";
define("PATH", $app_path);
define("ADMIN", $app_path . "/admin");

require ROOT . "/vendor/autoload.php";
