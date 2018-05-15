<?php
include "function.php";
include "login_function.php";

if(empty($_SESSION['user'])): include "login.php";
else:



include "header.php";
?>
<main>



</main>
<?php
endif;
include "footer.php";
?>