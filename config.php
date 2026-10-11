<?php
declare(strict_types=1);
define('DB_HOST','127.0.0.1'); define('DB_NAME','smart_blood_donor_finder');
define('DB_USER','root'); define('DB_PASS',''); // Change for your MySQL setup
define('APP_NAME','Smart Blood Donor Finder System');
if(session_status()===PHP_SESSION_NONE){session_set_cookie_params(['httponly'=>true,'secure'=>!empty($_SERVER['HTTPS']),'samesite'=>'Lax']);session_start();}
function db():PDO{static $p=null;if(!$p){$p=new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',DB_USER,DB_PASS,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES=>false]);}return $p;}
