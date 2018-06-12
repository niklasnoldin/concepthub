<?php

// Multimedia Projekt 1
// Multimedia Technology
// Fachhochschule Salzburg
// Niklas Clemens Noldin
// fhs41321

include "function.php";
include "login_function.php";
$pagetitle = 'bearbeiten';

if (empty($_SESSION['user'])): include "login.php";
else:

if(empty($_GET['id'])){
    header('Location: stoeber.php');
    exit;
} else {
    $concepthandle = $dbh->prepare("SELECT concepts.id, author, title, concepts.description as desc_long, desc_short, private
        FROM concepts
        WHERE id = ?");

    $concepthandle->execute(array($_GET['id']));
    $concept = $concepthandle->Fetch();

    $needsahandle = $dbh->prepare("SELECT courses.name, courses.id FROM needsa INNER JOIN courses ON(courses.id = courseid) WHERE conceptid = ?");
    $needsahandle->execute(array($_GET['id']));
    $needs = $needsahandle->FetchAll();

    if(!$concept->author == $_SESSION['user']){
        header("Location: index.php");
        exit;
    } else {
        
        if(!empty($_POST['title'])){
            $updater = $dbh->prepare("UPDATE concepts SET title = ?, description = ?, desc_short = ?, private = ? WHERE id = ?");
            $needsupdater1 = $dbh->prepare("DELETE FROM needsa WHERE conceptid = ?");
            $needsupdater2 = $dbh->prepare("INSERT INTO needsa(conceptid, courseid) VALUES (?, ?)");
            $getidhandle = $dbh->prepare('SELECT "id" FROM courses WHERE name = ?');

            $updater->execute(array(
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['long_desc']),
                htmlspecialchars($_POST['description']),
                htmlspecialchars($_POST['private']),
                htmlspecialchars($_GET['id'])
            ));
            $needsupdater1->execute(array(
                $_GET['id']
            ));
            
            foreach($_POST['ineed'] as $need){
                $getidhandle->execute(array($need));
                $courseid = $getidhandle->fetch()->id;

                $needsupdater2->execute(array(
                    $_GET['id'],
                    $courseid
                ));
            }
            foreach($_FILES['picture']['name'] as $key => $name){
                if($_FILES['picture']['error'][$key] == UPLOAD_ERR_OK){
                    $uploaddirectory = 'upload_files/';
                    $ext = pathinfo($_FILES['picture']['name'][$key]);
                    $ext = $ext['extension'];
                    if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg'){
                        $filename = str_pad($_GET['id'], 5, "0", STR_PAD_LEFT)."_".str_pad($key, 3, '0', STR_PAD_LEFT).'.'.$ext;
                        if(!move_uploaded_file($_FILES['picture']['tmp_name'][$key], $uploaddirectory.$filename)){
                            $errormessage .= 'Dateiupload fehlgeschlagen.<br>';
                        }
                    } else {
                        $errormessage .= 'Nur .jpg, .png oder .jpeg Dateien erlaubt.';
                    }
                }
            }
            header("Location: concept.php?id=".$_GET['id']);
            exit;
        }

    include "header.php";
?>
<main>
<section>
        <h2>Projekt bearbeiten</h2>
        <?php if(!empty($errormessage)) echo "<p class='error_message'>".$errormessage."</p>";?>
        <form id="add_project_form" enctype="multipart/form-data" action="edit_concept.php?id=<?= $_GET['id']?>" method="post">
            <input type="text" value="<?=$concept->title?>" name="title" autofocus required>
            <textarea name="description" rows="5" required><?=$concept->desc_short?></textarea>
            <textarea name="long_desc" rows="10" required><?=$concept->desc_long?></textarea>
            <fieldset id="skills">
                <legend>Welche Skills suchst du?</legend>
                <?php 
                foreach($needs as $need){
                ?>
                <div>
                    <select name="ineed[]" required>
                        <option value="default" disabled >Studiengang</option>
                        <option value="Multimedia Technology" <?php if($need->name == "Multimedia Technology") echo "selected" ?>>Multimedia Technology</option>
                        <option value="Multimedia Art" <?php if($need->name == "Multimedia Art") echo "selected" ?>>Multimedia Art</option>
                        <option value="Biomedizinische Analytik" <?php if($need->name == "Biomedizinische Analytik") echo "selected" ?>>Biomedizinische Analytik</option>
                        <option value="Betriebswirtschaft" <?php if($need->name == "Betriebswirtschaft") echo "selected" ?>>Betriebswirtschaft</option>
                        <option value="Design & Produktmanagement" <?php if($need->name == "Design & Produktmanagement") echo "selected" ?>>Design & Produktmanagement</option>
                        <option value="Ergotherapie" <?php if($need->name == "Ergotherapie") echo "selected" ?>>Ergotherapie</option>
                        <option value="Gesundheits- & Krankenpflege" <?php if($need->name == "Gesundheits- & Krankenpflege") echo "selected" ?>>Gesundheits- & Krankenpflege</option>
                        <option value="Hebammen" <?php if($need->name == "Hebammen") echo "selected" ?>>Hebammen</option>
                        <option value="Holztechnologie & Holzbau" <?php if($need->name == "Holztechnologie & Holzbau") echo "selected" ?>>Holztechnologie & Holzbau</option>
                        <option value="Informationstechnik & System-Management" <?php if($need->name == "Informationstechnik & System-Management") echo "selected" ?>>Informationstechnik & System-Management</option>
                        <option value="Innovation & Management im Tourismus" <?php if($need->name == "Innovation & Management im Tourismus") echo "selected" ?>>Innovation & Management im Tourismus</option>
                        <option value="KMU-Management & Entrepreneurship" <?php if($need->name == "KMU-Management & Entrepreneurship") echo "selected" ?>>KMU-Management & Entrepreneurship</option>
                        <option value="Orthoptik" <?php if($need->name == "Orthoptik") echo "selected" ?>>Orthoptik</option>
                        <option value="Physiotherapie" <?php if($need->name == "Physiotherapie") echo "selected" ?>>Physiotherapie</option>
                        <option value="Radiologietechnologie" <?php if($need->name == "Radiologietechnologie") echo "selected" ?>>Radiologietechnologie</option>
                        <option value="Smart Building" <?php if($need->name == "Smart Building") echo "selected" ?>>Smart Building</option>
                        <option value="Soziale Arbeit" <?php if($need->name == "Soziale Arbeit") echo "selected" ?>>Soziale Arbeit</option>
                        <option value="Wirtschaftsinformatik & Digitale Transformation" <?php if($need->name == "Wirtschaftsinformatik & Digitale Transformation") echo "selected" ?>>Wirtschaftsinformatik & Digitale Transformation</option>
                        <option value="Applied Image and Signal Processing" <?php if($need->name == "Applied Image and Signal Processing") echo "selected" ?>>Applied Image and Signal Processing</option>
                        <option value="Holztechnologie & Holzwirtschaft" <?php if($need->name == "Holztechnologie & Holzwirtschaft") echo "selected" ?>>Holztechnologie & Holzwirtschaft</option>
                        <option value="Suchmaschinenmarketing" <?php if($need->name == "Suchmaschinenmarketing") echo "selected" ?>>Suchmaschinenmarketing</option>
                    </select>
                    <span>x</span>
                </div>
                <?php }?>
                <p id="add_skill">+ weitern skill hinzufügen</p>
            </fieldset>
            <fieldset>
                <label class="radiobutton">
                    öffentlich.
                    <input type="radio" name="private" value="false" <?php if(!$concept->private) echo "checked";?>>
                    <span></span>
                </label>
                <label class="radiobutton">
                    privat.
                    <input type="radio" name="private" value="true" <?php if($concept->private) echo "checked";?>>
                    <span></span>
                </label>
            </fieldset>
            <fieldset>
                <legend>Bilder</legend>
                <h3 class="error_message">Derzeit ist das Löschen von Bildern nicht möglich.</h3>
                <h3 class="error_message">Durch erneuten Upload werden alte Daten überschrieben.</h3>
                <div title="Bilderformular">
                    <input type="file" name="picture[]" accept="image/jpeg, image/png">
                    <span>x</span>
                </div>
                <p id="add_file">+ weiteres bild hinzufügen</p>
            </fieldset>
            <input type="submit" value="Update">
        </form>
        <button id="delete_button">Konzept löschen.</button>
    </section>

</main>
<?php
    }
}
endif;
include "footer.php";
?>