<?php
include "function.php";
include "login_function.php";
$pagetitle = "stoebern";



include "header.php";

if (empty($_SESSION['user'])): include "login.php";
else:
?>
<main id="stoeber_container">



</main>


<?php
endif;
include "footer.php";
?>