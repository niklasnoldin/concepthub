<?php
include "../../function.php";

$usernamechecker = $dbh->prepare("SELECT username FROM users WHERE username = ?");
$usernamechecker->execute(array($_POST['val']));
$username = $usernamechecker->Fetch();

if(empty($username) || ($_POST['val'] == $_POST['name'])) echo "false";
else echo "true";
?>