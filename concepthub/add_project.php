<?php
include "function.php";

include "login_function.php";
$pagetitle = "Konzept erstellen";

include "header.php";

if (empty($_SESSION['user'])): include "login.php";
else:
?>


<main>
    <section>
        <h2>Was schwebt dir vor</h2>
        <form action="add_project.php" method="post">
            <input type="text" placeholder="titel." name="title">
            <textarea name="description" rows="5" placeholder="kurzbeschreibung des projektes."></textarea>
            <textarea name="long_desc" rows="10" placeholder="ausführliche beschreibung."></textarea>
            
        </form>
    </section>
</main>


<?php
endif;
include "footer.php";
?>