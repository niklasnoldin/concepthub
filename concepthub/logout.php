<?php
include "function.php";
$pagetitle = "Login";

$_SESSION = array();
if (isset($_SESSION[session_name()])){
    setcookie(
        session_name(),
        'useless string',
        time()-1000,
        '/'
    );
}
session_destroy();
header("Location:index.php");


// ============================ Ausgabe ===============

include "header.php";
?>
    <p>Some kind of weird error occured</p>
<?php
include "footer.php";
?>
