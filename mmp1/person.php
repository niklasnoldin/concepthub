<!-- 
Multimedia Projekt 1
Multimedia Technology
Fachhochschule Salzburg
Niklas Clemens Noldin
fhs41321
-->

<?php
include "function.php";
include "login_function.php";

if(empty($_SESSION['user'])): include "login.php";
else:

if(!empty($_GET['user'])){
    // =========== EINZELNE PERSON  =============
    $userhandle = $dbh->prepare("SELECT 
        username,
        email,
        firstname,
        lastname,
        description,
        course,
        membersince,
        phone,
        facebook,
        skype,
        linkedin,
        courses.name
        FROM users
        LEFT JOIN courses ON (courses.id = users.course)
        WHERE username = ?;"
    );
    $projecthandle = $dbh->prepare("SELECT
        title,
        id,
        private
        FROM concepts
        WHERE author = ?
        ORDER BY creationdate
        ;");
    
    $userhandle->execute(array(
        $_GET['user']
    ));
    $user = $userhandle->Fetch();

    $projecthandle->execute(array(
        $_GET['user']
    ));
    $projects = $projecthandle->FetchAll();
    $pagetitle = $user->firstname;
    include "header.php";
?>
<main>
    <div class="hero">
        <div style="background-image:url(<?php
            echo(glob("upload_files/$user->username.*")[0]);
            ?>)" alt="heropicture">
        </div>
        <h2><?=$user->firstname." ".$user->lastname?></h2>
        <img src="assets/img/arrow.svg" alt="scroll_arrow" class="scroll_arrow">
    </div>

    <section class="flex_container">
    <?php
        if($_GET['user'] == $_SESSION['user']){ ?>
        <a id="edit_button" href="edit_person.php?user=<?= $_GET['user'];?>">bearbeiten</a>
    <?php
    } ?>
        <?php if(!empty($user->description)) echo "<p>".$user->description."</p>";
        ?>
    </section>
    <section class="flex_container">
        <h2>Steckbrief</h2>
        <p><em>E-Mail:</em> <a href="mailto:<?=$user->email?>"><?= $user->email?></a></p>
        <?php if (!empty($user->course)){?>
        <p><em>Studiengang:</em> <a href="course.php?id=<?=$user->course?>"><?= $user->name?></a></p>
        <?php }?>
        <?php if (!empty($user->phone)){?>
        <p><em>Telefonnummer:</em> <a href="tel:<?=$user->phone?>"><?= $user->phone?></a></p>
        <?php }?>
        <?php if (!empty($user->facebook)){?>
        <p><em>Facebook:</em> <a href="https://www.facebook.com/<?=$user->facebook?>" target='_blank'><?= $user->firstname." ".$user->lastname ?></a></p>
        <?php }?>
        <?php if (!empty($user->skype)){?>
        <p><em>Skype:</em> <a href="skype:<?=$user->skype?>?call"><?= "@".$user->skype?></a></p>
        <?php }?>
        <?php if (!empty($user->linkedin)){?>
        <p><em>LinkedIn:</em> <a href="https://www.linkedin.com/in/<?=$user->linkedin?>" target="_blank"><?= "@".$user->linkedin ?></a></p>
        <?php }?>
        <p><em>Mitglied seit: </em> <?= strftime("%A, den %d. %B %Y", strtotime($user->membersince))?></p>
    </section>

    <section class="flex_container">
        <h2><?= $user->firstname?>'s Projekte</h2>
        <ul class="flex_container">
        <?php 
            foreach($projects as $project){
                if(!($project->private)){
        ?>
                <li class="big_item">
                    <a href="concept.php?id=<?=$project->id?>"><?=$project->title?></a>
                </li>
        <?php
                }
            }
        ?>
        </ul>
    </section>
</main>

<?php
    // =========== PERSONEN LISTE =============
} else {
    $everyonehandle = $dbh->prepare("SELECT username, firstname, lastname FROM users ORDER BY lastname OFFSET ? LIMIT 20");
    $everyonehandle->execute(array(0));
    $everyone = $everyonehandle->FetchAll();
    $pagetitle = "Personen";
    include "header.php";
    
    ?>
<main class="flex_container person_list"> 
    <h2>Alle Personen</h2>
    <ul>
        <?php
        foreach($everyone as $one){
            ?>
            <li class="flex_container flex_row">
                <img src="<?php echo glob("upload_files/$one->username.*")[0]?>" alt="" class="thumb">
                <p>
                    <a href="person.php?user=<?=$one->username?>">
                    <?= $one->firstname." ".$one->lastname ?>
                    </a>
                </p>
            </li>
            
            <?php

        }
        ?>
    </ul>
</main>
<?php
}
?>
<?php
endif;
include "footer.php";
?>