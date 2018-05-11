<?php
session_start();

$pagetitle = Seitentitel;
$errormessage_login = "";

ini_set('display_errors', '1');
date_default_timezone_set('Europe/Vienna');

include "config.php";

$dbh = new PDO($DSN, $DB_USER, $DB_PASS,array(PDO::ATTR_PERSISTENT => false));
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

include "login_function.php";

?>