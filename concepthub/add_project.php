<?php
include "function.php";
include "login_function.php";
$pagetitle = "Konzept erstellen";

if(!empty($_POST['title'])):
        
    $inserthandle = $dbh->prepare("INSERT INTO concepts(title, author, description, desc_short, creationdate, private) VALUES(?, ?, ?, ?, ?, ?) RETURNING id");


    $inserthandle->execute(array(
        $_POST['title'],
        $_SESSION['user'],
        $_POST['long_desc'],
        $_POST['description'],
        date(DATE_RFC822),
        $_POST['private']
    ));

    $insertid = $inserthandle->fetch()->id;

    $needshandle = $dbh->prepare("INSERT INTO needsa(conceptid, courseid) VALUES(?,?)");
    $likeshandle = $dbh->prepare("INSERT INTO likes(follower, conceptid) VALUES(?,?)");
    $likeshandle->execute(array(null, $insertid));

    $getidhandle = $dbh->prepare('SELECT "id" FROM courses WHERE name = ?');

    foreach ($_POST['ineed'] as $need) {
        
        $getidhandle->execute(array($need));
        $courseid = $getidhandle->fetch()->id;

        $needshandle->execute(array(
            $insertid,
            $courseid
        ));
    }
    $errormessage = "";

    foreach($_FILES['picture']['name'] as $key => $name){
        if($_FILES['picture']['error'][$key] == UPLOAD_ERR_OK){
            $uploaddirectory = 'upload_files/';
            $ext = pathinfo($_FILES['picture']['name'][$key]);
            $ext = $ext['extension'];
            if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg'){
                $filename = str_pad($insertid, 5, "0", STR_PAD_LEFT)."_".str_pad($key, 3, '0', STR_PAD_LEFT).'.'.$ext;
                if(!move_uploaded_file($_FILES['picture']['tmp_name'][$key], $uploaddirectory.$filename)){
                    $errormessage .= 'Dateiupload fehlgeschlagen.<br>';
                }
            } else {
                $errormessage .= 'Nur .jpg, .png oder .jpeg Dateien erlaubt.';
            }
        }
    }

    $url = 'Location: concept.php?id='.$insertid;
    header($url);
    exit;
endif;
include "header.php";

if (empty($_SESSION['user'])): include "login.php";
else:
?>

<main>
    <section>
        <h2>Was schwebt dir vor</h2>
        <?php if(!empty($errormessage)) echo "<p class='error_message'>".$errormessage."</p>";?>
        <form id="add_project_form" enctype="multipart/form-data" action="add_project.php" method="post">
            <input type="text" placeholder="titel." name="title" autofocus required>
            <textarea name="description" rows="5" placeholder="kurzbeschreibung des projektes." required></textarea>
            <textarea name="long_desc" rows="10" placeholder="ausführliche beschreibung." required></textarea>
            <fieldset id="skills">
                <legend>Welche Skills suchst du?</legend>
                <div>
                    <select name="ineed[]" required>
                        <option value="default" selected disabled >Studiengang</option>
                        <option value="Multimedia Technology">Multimedia Technology</option>
                        <option value="Multimedia Art">Multimedia Art</option>
                        <option value="Biomedizinische Analytik">Biomedizinische Analytik</option>
                        <option value="Betriebswirtschaft">Betriebswirtschaft</option>
                        <option value="Design & Produktmanagement">Design & Produktmanagement</option>
                        <option value="Ergotherapie">Ergotherapie</option>
                        <option value="Gesundheits- & Krankenpflege">Gesundheits- & Krankenpflege</option>
                        <option value="Hebammen">Hebammen</option>
                        <option value="Holztechnologie & Holzbau">Holztechnologie & Holzbau</option>
                        <option value="Informationstechnik & System-Management">Informationstechnik & System-Management</option>
                        <option value="Innovation & Management im Tourismus">Innovation & Management im Tourismus</option>
                        <option value="KMU-Management & Entrepreneurship">KMU-Management & Entrepreneurship</option>
                        <option value="Orthoptik">Orthoptik</option>
                        <option value="Physiotherapie">Physiotherapie</option>
                        <option value="Radiologietechnologie">Radiologietechnologie</option>
                        <option value="Smart Building">Smart Building</option>
                        <option value="Soziale Arbeit">Soziale Arbeit</option>
                        <option value="Wirtschaftsinformatik & Digitale Transformation">Wirtschaftsinformatik & Digitale Transformation</option>
                        <option value="Applied Image and Signal Processing">Applied Image and Signal Processing</option>
                        <option value="Holztechnologie & Holzwirtschaft">Holztechnologie & Holzwirtschaft</option>
                        <option value="Suchmaschinenmarketing">Suchmaschinenmarketing</option>
                    </select>
                    <span>x</span>
                </div>
                <p id="add_skill">+ weitern skill hinzufügen</p>
            </fieldset>
            <fieldset>
                <label class="radiobutton">
                    öffentlich.
                    <input type="radio" name="private" value="false" selected>
                    <span></span>
                </label>
                <label class="radiobutton">
                    privat.
                    <input type="radio" name="private" value="true">
                    <span></span>
                </label>
            </fieldset>
            <fieldset>
                <legend>Bilder</legend>
                <div title="Bilderformular">
                    <input type="file" name="picture[]" accept="image/jpeg, image/png">
                    <span>x</span>
                </div>
                <p id="add_file">+ weiteres bild hinzufügen</p>
            </fieldset>
            <input type="submit" value="Woopie">
        </form>
    </section>
</main>


<?php
endif;
include "footer.php";
?>