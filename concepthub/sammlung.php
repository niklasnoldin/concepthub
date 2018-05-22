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
GROUP BY 
    concepts.id, 
    users.username,
    concepts.author,
    concepts.title,
    concepts.creationdate,
    concepts.private
ORDER BY 
    concepts.creationdate DESC
;");
$getnames = $dbh->prepare("SELECT firstname, lastname FROM users WHERE username = ?");

$concepthandle->execute(array($_SESSION['user']));

$concepts = $concepthandle->fetchAll();


?>

<main>
    <a id="add" href="add_project.php">+</a>
<ul>
<?php
if($concepts):
foreach($concepts as $concept):
    $getnames->execute(array($concept->author));
    $names = $getnames->Fetch();
    $tempfilename = str_pad($concept->id, 5,'0',STR_PAD_LEFT).'_000';
    $filename = glob("upload_files/$tempfilename.*");
    if(!empty($filename)) $backgpic = $filename[0];
    else $backgpic = "";
?>
        <li class="samml_item">
            <a href="concept.php?id=<?=$concept->id?>" class=" <?php if (empty($backgpic)) echo "circlepattern";?>
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
                echo " locked\"";
            }
            if(!($concept->private)){
        ?>
            " <?php
            
            if (!empty($backgpic)){
                echo "style=\"background-image: url(".$backgpic."\"";
            }
            }?>
            >
                <h2>
                    <?=$concept->title?>
                </h2>
                <div>
                <?php
                if(!($concept->author == $_SESSION['user'])) echo "<h3>von $names->firstname $names->lastname</h3>";
                ?>
                </div>
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