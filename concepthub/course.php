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

$coursehandle = $dbh->prepare("SELECT courses.name as course, universities.name AS uni, adress 
FROM courses
LEFT JOIN universities ON (courses.university = universities.id)
WHERE courses.id = ?
");

$conceptshandle = $dbh->prepare("SELECT title, author, id 
    FROM concepts 
    LEFT JOIN needsa ON (concepts.id = conceptid)
    WHERE private = false 
    AND courseid = ?");

$conceptshandle->execute(array($_GET['id']));
$projects = $conceptshandle->FetchAll();

$coursehandle->execute(array($_GET['id']));
$course = $coursehandle->Fetch();

$pagetitle = "kurs";
include "header.php";

if (empty($_SESSION['user'])): include "login.php";
else:
?>

<main>
    <div class="hero">
        <h2><?=$course->course;?></h2>
        <img src="assets/img/arrow.svg" alt="scroll_arrow" class="scroll_arrow">
    </div>
    <section>
        <p><?=$course->uni?></p>
        <p><a href="https://maps.google.com/?q=<?=$course->uni?>" target="_blank"><?=$course->adress?></a></p>
        
    </section>

    <ul class="flex_container">
        <?php 
            foreach($projects as $project){
        ?>
                <li class="big_item flex_container">
                    <a href="concept.php?id=<?=$project->id?>"><?=$project->title?></a>
                    <a class="positive_message" href="person.php?user=<?=$project->author?>"><?=$project->author?></a>
                </li>
        <?php
            }
        ?>
        </ul>

</main>


<?php
endif;
include "footer.php"
?>