<?php
session_start();

$pagetitle = Seitentitel;

include "config.php";

$dbh = new PDO($DSN, $DB_USER, $DB_PASS);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>