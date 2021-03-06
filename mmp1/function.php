<?php
// Multimedia Projekt 1
// Multimedia Technology
// Fachhochschule Salzburg
// Niklas Clemens Noldin
// fhs41321

session_start();

$pagetitle = Seitentitel;
$errormessage_login = "";

ini_set('display_errors', '1');
//error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set('Europe/Vienna');
setlocale(LC_TIME, "de_DE");

include "config.php";

$dbh = new PDO($DSN, $DB_USER, $DB_PASS, array(PDO::ATTR_PERSISTENT => false));
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

include "login_function.php";

?>