<?php

// Multimedia Projekt 1
// Multimedia Technology
// Fachhochschule Salzburg
// Niklas Clemens Noldin
// fhs41321

include "function.php";
include "login_function.php";

$concepthandle = $dbh->prepare("SELECT concepts.id, title, author, firstname, lastname, desc_short, creationdate
    FROM concepts
    LEFT JOIN users ON (author = username)
    LEFT JOIN needsa ON (concepts.id = conceptid)
    LEFT JOIN courses ON (courseid = courses.id)
    WHERE private = false
    GROUP BY concepts.id, title, author, firstname, lastname, desc_short, creationdate
    ORDER BY creationdate DESC
    LIMIT 1 OFFSET 0
");

$concepthandle->execute();
$concept = $concepthandle->Fetch();

$needsahandle = $dbh->prepare("SELECT courses.name, courses.id FROM needsa INNER JOIN courses ON(courses.id = courseid) WHERE conceptid = ? LIMIT 3");

$pagetitle = "stöbern";
include "header.php";

if (empty($_SESSION['user'])): include "login.php";
else:
?>


<main class="flex_container gradient">

<img src="assets/img/arrow.svg" alt="arrow_right" id="arrow_right">
<img src="assets/img/arrow.svg" alt="arrow_left" id="arrow_left">

<ul id="stoeber_list">
    <?php
        $needsahandle->execute(array($concept->id));
        $needs = $needsahandle->FetchAll();

        $tempfilename = str_pad($concept->id, 5,'0',STR_PAD_LEFT).'_000';
        $filename = glob("upload_files/$tempfilename.*");
        if(!empty($filename)) $backgpic = $filename[0];
        else $backgpic = "";

        ?>
        <li class="stoeber_item curr_concept">
            <div class="<?php 
            if (empty($backgpic)) echo "circlepattern ";
            $random = rand(0,4);
            switch ($random) {
                case 0:
                    echo "green_bg";
                    break;
                case 1:
                    echo "orange_bg";
                    break;
                case 2:
                    echo "blue_bg";
                    break;
                case 3:
                    echo "red_bg";
                    break;
                default:
                    echo "orange_bg";
                    break;
            }?> hero"
            <?php 
                if (!empty($backgpic)){
                echo "style=\"background-image: url(".htmlspecialchars($backgpic)."\"";
            }
            ?>
            >
                <h2><a href="concept.php?id=<?=htmlspecialchars($concept->id)?>"><?=htmlspecialchars($concept->title)?></a></h2>
                <h3><a href="person.php?user=<?=htmlspecialchars($concept->author)?>">von <?=htmlspecialchars($concept->firstname." ".$concept->lastname)?></a></h3>
            </div>
            <a href="concept.php?id=<?=htmlspecialchars($concept->id)?>">
            <p>
            <?=htmlspecialchars($concept->desc_short)?>
            
            <div id="needs_list">
                <p><em><?=htmlspecialchars($concept->firstname)?> braucht für sein Projekt:</em></p>
                <ul>
                    <?php
                    foreach($needs as $need){
                        echo "<li>".htmlspecialchars($need->name)."</li>";
                    }
                    ?>
                </ul>
            </div>
            </a>
        </li>
</ul>
</main>
<?php
endif;
include "footer.php";
?>