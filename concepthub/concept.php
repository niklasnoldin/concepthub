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

    $didhelikehandle = $dbh->prepare("SELECT * FROM likes WHERE conceptid = ? AND follower = ?");
    $didhelikehandle->execute(array($_GET['id'], $_SESSION['user']));
    $didhelike = $didhelikehandle->Fetch();

    $needsahandle = $dbh->prepare("SELECT courses.name, courses.id FROM needsa INNER JOIN courses ON(courses.id = courseid) WHERE conceptid = ?");
    $needsahandle->execute(array($_GET['id']));
    $needs = $needsahandle->FetchAll();

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
    <section class="flex_container flex_row">

    <div id="clap" class="flex_container flex_row
    <?php
        if(empty($didhelike)){ echo "likeable"; } else { echo "liked"; }
    ?>
    ">
        <p><?= $concept->likecount;?></p>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 456.5 456.5"><path d="M391.6 54.8c-16 0-29 13-29 29l-.1 42L244.7 8a27.4 27.4 0 0 0-46 13l-2-2.1a27.2 27.2 0 0 0-38.7 0 27.4 27.4 0 0 0 0 38.6l6.5 6.6a27.1 27.1 0 0 0-21 26.5c0 7.3 2.9 14.2 8 19.4l13.4 13.4a27.2 27.2 0 0 0-21 26.5c0 7.3 2.8 14.2 8 19.4l8.9 8.8c-.4 2-.6 3.9-.6 5.9v18.9a27.4 27.4 0 0 0-41.7 23.3V368c0 31.3 10.8 61.9 30.5 86.1a6.5 6.5 0 1 0 10.1-8.2 124 124 0 0 1-27.6-77.9V226.2a14.3 14.3 0 0 1 28.7 0v91.1a6.5 6.5 0 1 0 13 0V184a14.3 14.3 0 0 1 28.6 0v124.6a6.5 6.5 0 1 0 13 0V151.5a14.3 14.3 0 0 1 28.7 0v163.9a6.5 6.5 0 1 0 13 0V177.7a14.3 14.3 0 0 1 28.6 0v183c.2 1.5.8 2.8 2 3.9a6.5 6.5 0 0 0 9.1 0l40.9-40.7a16 16 0 0 1 22.5 22.6l-97.5 97.3a6.5 6.5 0 1 0 9.2 9.2l97.5-97.3a29 29 0 0 0-40.9-41l-29.8 29.7v-44.6a136.4 136.4 0 0 0 30.2 8.2 6.5 6.5 0 0 0 1-13 123.2 123.2 0 0 1-31.2-9.3v-108a27.4 27.4 0 0 0-28.8-27.3l-102-102A14.3 14.3 0 0 1 187.4 28L303.4 144a6.5 6.5 0 0 0 9.2-9.2l-97.4-97.4a14.2 14.2 0 0 1 0-20.2 14.3 14.3 0 0 1 20.3 0L358.3 140a82.2 82.2 0 0 0-39.3 40.8 82.3 82.3 0 0 0-1.5 63.4 6.5 6.5 0 1 0 12.1-4.7c-6.7-17.4-6.2-36.3 1.3-53.4s21.2-30.4 38.7-36.8c6-2.3 5.9-6.4 5.9-7.8V83.8a15.9 15.9 0 0 1 16-16 16 16 0 0 1 16 16l-.1 137.8c0 3.6 2.9 6.5 6.4 6.5 3.6 0 6.6-2.9 6.6-6.5V83.8c.1-16-12.9-29-28.8-29zM187.5 156.7c-8.2 0-15.5 3.6-20.5 9.2l-6-5.8a14.2 14.2 0 0 1 0-20.3 14.4 14.4 0 0 1 20.4 0l20.4 20.4v.5c-4.2-2.6-9-4-14.3-4zm15.6-13.5l-42.4-42.4a14.2 14.2 0 0 1 0-20.3 14.2 14.2 0 0 1 20.1-.1l44.2 44.1a27.4 27.4 0 0 0-21.9 18.7zM98.8 153.6a6.5 6.5 0 0 0 1.1-12.9l-56.2-10.4a6.5 6.5 0 1 0-2.3 12.8l56.2 10.4 1.2.1zM124.6 116.7c3-2 3.7-6 1.7-9L94 60.6A6.5 6.5 0 0 0 83.2 68l32.4 47a6.5 6.5 0 0 0 9 1.7zM104.6 182.7l-47 32.4a6.5 6.5 0 0 0 7.3 10.7l47.1-32.4a6.5 6.5 0 0 0-7.4-10.7z"/></svg>
    </div>
    
    <div class="flex_container">
        <?php if($concept->author == $_SESSION['user']) echo "<a id='edit_button' class='fullwidth' href='edit_concept.php?id=$concept->id'>bearbeiten</a>"; ?>
        <p><?= $concept->desc_short ?></p>
        <p><?= $concept->desc_long ?></p>
        <div id="needs_list" class="fullwidth">
            <p><em><?=$concept->firstname?> braucht für sein Projekt:</em></p>
            <ul>
            <?php
            foreach($needs as $need){
                echo "<a href=\"course.php?id=$need->id\"><li>$need->name</li></a>";
            }
            ?>
            </ul>
        </div>
    </div>
    <form id="feedback_form">
        <input type="text" placeholder="feedback" title="nur der autor des concepts kann diese nachricht sehen." id="feedback" required>
        <input type="range" min="0" max="5" step="1" required id="stars">
        <input type="submit" value="senden" id="submit_feedback">
    </form>
    </section>
    <section class="flex_container">
    <ul class="feedback">
    <?php
        if($concept->author == $_SESSION['user']){
            $feedbackgetter = $dbh->prepare("SELECT data, stars, feedbacker, creationdate FROM feedback WHERE conceptid = ?");
            $feedbackgetter->execute(array(
                $_GET['id']
            ));
            $feed = $feedbackgetter->FetchAll();
            foreach($feed as $f){
                ?>
                <li>
                    <a href="person.php?user=<?= $f->feedbacker?>"><?=$f->feedbacker?></a>
                    <p>
                    <?php for($i = 0; $i < $f->stars; $i++) echo "★" ?>
                    </p>
                    <p><?= $f->data ?></p>
                </li>
                <?php
            }
        }?>
        </ul>
    </section>
</main>
<?php
endif;
include "footer.php";
?>