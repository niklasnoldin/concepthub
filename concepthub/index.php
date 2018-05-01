<?php
include "function.php";
$pagetitle = "concepthub";


include "header.php";


if (!empty($_SESSION['user'])) include "sammlung.php";
else include "login.php";

include "footer.php";
?>