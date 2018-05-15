<?php
include "function.php";
include "login_function.php";

if(!empty($_GET['user'])){
    
}

if (empty($_SESSION['user'])): include "login.php";
else:
$pagetitle = "concepthub";
include "header.php";
?>

<?php
endif;
include "footer.php";