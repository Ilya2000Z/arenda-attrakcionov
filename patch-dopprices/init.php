<?php
namespace MyClasses;

Error_Reporting(E_ALL & ~E_NOTICE);
mb_internal_encoding('UTF-8');

define("DBName", "arenda24");
define("HostName", "127.0.0.1:3310");
define("UserName", "effectik");
define("Password", "qZ0jY8oO4j");





$localhost = (strstr($_SERVER["SERVER_NAME"], "localhost")) ? 1 : 0;

if ($localhost) {
	$_SERVER['DOCUMENT_ROOT'] .= "/art";
}



foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/patch-dopprices/classes/*Class.php") as $file) {
    require ($file);
}

$mysql = new MySqliClass(HostName, UserName, Password, DBName);




?>