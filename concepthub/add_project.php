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
        <form id="add_project_form" action="add_project.php" method="post">
            <input type="text" placeholder="titel." name="title" autofocus required>
            <textarea name="description" rows="5" placeholder="kurzbeschreibung des projektes." required></textarea>
            <textarea name="long_desc" rows="10" placeholder="ausführliche beschreibung." required></textarea>
            <fieldset>
                <legend>Welche Skills suchst du?</legend>
                <div>
                    <select name="ineed[]" required>
                        <option value="default" selected disabled >Studiengang</option>
                        <option value="MMT">Multimedia Technology</option>
                        <option value="MMA">Multimedia Art</option>
                    </select>
                    <span>x</span>
                </div>
                <p id="add_skill">+ skill hinzufügen</p>
            </fieldset>
            <fieldset>
                <label class="radiobutton">
                    öffentlich.
                    <input type="radio" name="private" value="false" selected>
                    <span></span>
                </label>
                <label class="radiobutton">
                    privat.
                    <input type="radio" name="private" value="true">
                    <span></span>
                </label>
            </fieldset>
            <input type="submit" value="Woopie">
        </form>
    </section>
</main>


<?php
endif;
include "footer.php";
?>