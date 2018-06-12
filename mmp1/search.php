<?php

// Multimedia Projekt 1
// Multimedia Technology
// Fachhochschule Salzburg
// Niklas Clemens Noldin
// fhs41321

include "function.php";

$searchhandle = $dbh->prepare("
(SELECT '1' AS type, firstname  AS firstname_desc_coursename, lastname AS lastname_author_university, username AS username_title_adress, '0' AS id 
    FROM users
    WHERE lower(firstname) LIKE lower(?)
        OR lower(lastname) LIKE lower(?) 
        OR lower(username) LIKE lower(?) 
        OR lower(description) LIKE lower(?) 
        OR lower(username) LIKE lower(?))
UNION ALL 
(SELECT '2', title, author, desc_short, id
    FROM concepts 
    WHERE (lower(title) LIKE lower(?) 
        OR lower(author) LIKE lower(?) 
        OR lower(desc_short) LIKE lower(?)
        OR lower(description) LIKE lower(?))
        AND private = false)
UNION ALL 
(SELECT '3', courses.name AS coursename, universities.name AS uniname, adress, courses.id
    FROM courses
    LEFT JOIN universities ON (courses.university = universities.id)
    WHERE lower(courses.name) LIKE lower(?));");

$searchparam = '%'.$_GET['search'].'%';

$searchhandle->bindParam(1, $searchparam);
$searchhandle->bindParam(2, $searchparam);
$searchhandle->bindParam(3, $searchparam);
$searchhandle->bindParam(4, $searchparam);
$searchhandle->bindParam(5, $searchparam);
$searchhandle->bindParam(6, $searchparam);
$searchhandle->bindParam(7, $searchparam);
$searchhandle->bindParam(8, $searchparam);
$searchhandle->bindParam(9, $searchparam);
$searchhandle->bindParam(10, $searchparam);

$searchhandle->execute();
$result = $searchhandle->FetchAll();

$pagetitle = "concepthub";
include "header.php";
?>
<main class="flex_container person_list">
<form action="search.php" method="get">
    <input type="search" name="search" placeholder="Search" value="<?=htmlspecialchars($_GET['search'])?>">
    <input type="submit" value=" " id="submit_search_main">
</form>

<ul>
<?php
foreach($result as $item):
?>

<?php
    switch ($item->type) {
        case '1':
            ?>
            <li class="flex_container flex_row">
                <img src="<?php echo glob(htmlspecialchars("upload_files/$item->username_title_adress.*"))[0]?>" alt="" class="thumb">
                <p>
                    <a href="person.php?user=<?=htmlspecialchars($item->username_title_adress)?>">
                    <?= htmlspecialchars($item->firstname_desc_coursename." ".$item->lastname_author_university)?>
                    </a>
            </li>
            <?php
            break;
        case '2':
            ?>
            <li class="flex_container container">
                <p>
                <a href="concept.php?id=<?=htmlspecialchars($item->id)?>"><em><?=htmlspecialchars($item->firstname_desc_coursename)?></em></a>
                <h3><a href="person.php?user=<?=htmlspecialchars($item->lastname_author_university)?>"><?=htmlspecialchars($item->lastname_author_university)?></a></h3>
                <?= htmlspecialchars($item->username_title_adress)?>
                
            </li>
            <?php
            break;
        case '3':
            ?>
            <li class="flex_container container">
                <p>
                    <h3><a href="course.php?id=<?=htmlspecialchars($item->id)?>"><?=htmlspecialchars($item->firstname_desc_coursename)?></a></h3>
                    <h3>
                    <?=htmlspecialchars($item->lastname_author_university)?>
                    </h3>
                    <?=htmlspecialchars($item->username_title_adress)?>
                    
                
            </li>
            <?php
            break;
        default:
            break;
    }
?>
<?php
endforeach;
?>
</ul>


</main>

<?php
include "footer.php";
?>