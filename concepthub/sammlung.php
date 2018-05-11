<?php

$concepthandle = $dbh->prepare("SELECT 
    concepts.id,
    users.username,
    concepts.author,
    concepts.title, 
    users.firstname, 
    users.lastname,
    concepts.creationdate,
    concepts.private
FROM 
    users
INNER JOIN
    likes ON (likes.follower = users.username)
INNER JOIN 
    concepts ON concepts.author = users.username OR likes.conceptid = concepts.id
WHERE 
    users.username = ?
ORDER BY 
    concepts.creationdate;
;");

$concepthandle->execute(array($_SESSION['user']));

$concepts = $concepthandle->fetchAll();
?>

<main>
    <a id="add" href="add_project.php">+</a>
<ul>

<?php

if($concepts):
foreach($concepts as $concept):
?>  
        <li>
            <a href="concept.php?id=<?=$concept->id?>" class="
        <?php
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
            }
            if($concept->private){
                echo " locked \"";
            }
            if(!($concept->private)){
        ?>
            " style="background-image: url(<?php
            $tempfilename = str_pad($concept->id, 5,'0',STR_PAD_LEFT).'_000';
            echo(glob("upload_files/$tempfilename.*")[0]);
            ?>);"
            <?php };?>
            >
                <h2>
                    <?=$concept->title?>
                </h2>
                <?php
                if($concept->username == $_SESSION['user']) echo "<p>von $concept->firstname $concept->lastname</p>";
                ?>
            </a>
        </li>
<?php
endforeach;
else:
    echo "<h2 style=\"margin: 30vh 0 0 50vw; transform: translate(-50%,-50%); z-index: -10;\">Noch keine Konzepte vorhanden</h2>";
endif;
?>
    </ul>
</main>