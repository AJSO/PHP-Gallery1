<?php

// This will handle all the configurations.
define('WEBSITE_TITLE', "My Website");

/*set database variables*/

define('DB_TYPE','mysql');
define('DB_NAME','abaana_gala_db');
define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST','localhost');

/*protocal type http or https*/
define('PROTOCAL','http');

/*root and asset paths*/

$path = str_replace("\\", "/",PROTOCAL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

// Root contains the path to the public folder.
define('ROOT', str_replace("app/core", "public", $path));

// contains the path to the public assets folder.
define('ASSETS', str_replace("app/core", "public/assets", $path));

/*set to true to allow error reporting
set to false when you upload online to stop error reporting*/

define('DEBUG',true);

if(DEBUG)
{
	ini_set("display_errors",1);
}else{
	ini_set("display_errors",0);
}