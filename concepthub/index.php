<!-- 
Multimedia Projekt 1
Multimedia Technology
Fachhochschule Salzburg
Niklas Clemens Noldin
fhs41321
-->

<?php
include "function.php";
$pagetitle = "concepthub";

include "header.php";

if (empty($_SESSION['user'])) include "login.php";
else include "sammlung.php";

include "footer.php";
?>