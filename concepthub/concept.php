<?php
include "function.php";
include "login_function.php";

if(empty($_GET['id'])){
    header('Location: stoeber.php');
    exit;
} else {
    $concepthandle = $dbh->prepare("SELECT id, title, author, firstname, lastname, concepts.description as description, desc_short, creationdate 
    FROM concepts 
    INNER JOIN users ON (author = username)
    WHERE (private = false
    OR author = ?)
    AND id = ?");

    $concepthandle->execute(array($_SESSION['user'], $_GET['id']));
    $concept = $concepthandle->Fetch();

    $pagetitle = 'concept';
}
include "header.php";
if (empty($_SESSION['user'])): include "login.php";
else:
?>

<main>
    <div class="hero">
        <div style="background-image:url(<?php
            $tempfilename = str_pad($concept->id, 5,'0',STR_PAD_LEFT).'_000';
            echo(glob("upload_files/$tempfilename.*")[0]);
            ?>)" alt="heropicture">
        </div>
        <h2><?=$concept->title?></h2>
        <p>von <a href="person.php?user=<?=$concept->author?>"><?=$concept->firstname.' '.$concept->lastname;?></a></p>
    </div>



</main>


<?php
endif;
include "footer.php";
?>