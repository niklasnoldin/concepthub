<?php
// Multimedia Projekt 1
// Multimedia Technology
// Fachhochschule Salzburg
// Niklas Clemens Noldin
// fhs41321



include "../../function.php";

$killer1 = $dbh->prepare("DELETE FROM likes WHERE conceptid = ?;");
$killer2 = $dbh->prepare("DELETE FROM needsa WHERE conceptid = ?;");
$killer3 = $dbh->prepare(" DELETE FROM concepts WHERE id = ?;");

$killer1->execute(array($_POST['id']));
$killer2->execute(array($_POST['id']));
$killer3->execute(array($_POST['id']));

$deletestring = "../../upload_files/".str_pad($_POST['id'], 5,'0',STR_PAD_LEFT)."_*";
array_map('unlink', glob($deletestring));
?>

