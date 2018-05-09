<?php
include "function.php";
$pagetitle = "concepthub";

include "header.php";

if (empty($_SESSION['user'])) include "login.php";
else include "sammlung.php";

include "footer.php";
?>