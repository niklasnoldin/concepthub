<?php
include "function.php";
include "login_function.php";

if(empty($_GET['id'])){
    header('Location: stoeber.php');
    exit;
} else {
    $concepthandle = $dbh->prepare("SELECT count(likes.follower) as likecount, concepts.id, title, author, firstname, lastname, concepts.description as desc_long, desc_short, creationdate 
    FROM concepts 
    INNER JOIN users ON (author = username)
    INNER JOIN likes ON (concepts.id = conceptid)
    WHERE (private = false
    OR author = ?)
    AND id = ?
    GROUP BY concepts.id, title, author, firstname, lastname, desc_long, desc_short, creationdate");

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
        <h3>von <a href="person.php?user=<?=$concept->author?>"><?=$concept->firstname.' '.$concept->lastname;?></a></h3>
    </div>
    <p><?= $concept->desc_short ?></p>
    <p><?= $concept->desc_long ?></p>


</main>


<?php
endif;
include "footer.php";
?>