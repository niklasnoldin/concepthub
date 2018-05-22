<?php
include "function.php";
include "login_function.php";

$coursehandle = $dbh->prepare("SELECT courses.name as course, universities.name AS uni, adress 
FROM courses
LEFT JOIN universities ON (courses.id = universities.id)
WHERE courses.id = ?
");

$coursehandle->execute(array($_GET['id']));
$course = $coursehandle->Fetch();




$pagetitle = "kurs";
include "header.php";

if (empty($_SESSION['user'])): include "login.php";
else:
?>

<main>
    <div class="hero">
        <h2><?=$course->course?></h2>
    </div>
    <section>
        <p><?=$course->uni?></p>
        <p><a href="https://maps.google.com/?q=<?=$course->uni?>" target="_blank"><?=$course->adress?></a></p>
        
    </section>

</main>


<?php
endif;
include "footer.php"
?>