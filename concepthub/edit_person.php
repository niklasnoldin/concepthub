<?php
include "function.php";
include "login_function.php";

if(empty($_SESSION['user'])): include "login.php";
else:

if(!($_GET['user'] == $_SESSION['user']) || empty($_GET['user'])){
    header("Location: person.php?user=".$_SESSION['user']);
    exit;
} else {

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
        WHERE username = ?"
    );

    $userhandle->execute(array(
        $_GET['user']
    ));
    $user = $userhandle->Fetch();

    $smthpath = "upload_files/".$user->username."*";
    $pathtoprofilepic = glob($smthpath)[0];

$pagetitle = "Profil";

include "header.php";
?>
<main>
    <section class="flex_container">
        <h2>Dein Profil bearbeiten</h2>
        <form action="edit_person.php" enctype="multipart/form-data">
            <fieldset>
                <?php if ($pathtoprofilepic){?>
                    <img class="thumb" src="<?= $pathtoprofilepic?>" alt="profilbild">
                <?php } ?>
                <legend>Profilbild</legend>
                <input type="file" name="picture">
            </fieldset>
            <input type="text" placeholder="username" name="username" value="<?=$user->username?>" required>
            <input type="text" placeholder="e-mail" name="email" value="<?=$user->email?>" required>
            <input type="text" placeholder="vorname" name="firstname" value="<?=$user->firstname?>" required>
            <input type="text" placeholder="nachname" name="lastname" value="<?=$user->lastname?>" required>
            <textarea name="description" rows="5" placeholder="erzähl etwas über dich."><?=$user->description?></textarea>
            <select name="course" required>
                <option value="default" disabled >Studiengang</option>
                <option value="Multimedia Technology" <?php if($user->name == "Multimedia Technology") echo "selected" ?>>Multimedia Technology</option>
                <option value="Multimedia Art" <?php if($user->name == "Multimedia Art") echo "selected" ?>>Multimedia Art</option>
                <option value="Biomedizinische Analytik" <?php if($user->name == "Biomedizinische Analytik") echo "selected" ?>>Biomedizinische Analytik</option>
                <option value="Betriebswirtschaft" <?php if($user->name == "Betriebswirtschaft") echo "selected" ?>>Betriebswirtschaft</option>
                <option value="Design & Produktmanagement" <?php if($user->name == "Design & Produktmanagement") echo "selected" ?>>Design & Produktmanagement</option>
                <option value="Ergotherapie" <?php if($user->name == "Ergotherapie") echo "selected" ?>>Ergotherapie</option>
                <option value="Gesundheits- & Krankenpflege" <?php if($user->name == "Gesundheits- & Krankenpflege") echo "selected" ?>>Gesundheits- & Krankenpflege</option>
                <option value="Hebammen" <?php if($user->name == "Hebammen") echo "selected" ?>>Hebammen</option>
                <option value="Holztechnologie & Holzbau" <?php if($user->name == "Holztechnologie & Holzbau") echo "selected" ?>>Holztechnologie & Holzbau</option>
                <option value="Informationstechnik & System-Management" <?php if($user->name == "Informationstechnik & System-Management") echo "selected" ?>>Informationstechnik & System-Management</option>
                <option value="Innovation & Management im Tourismus" <?php if($user->name == "Innovation & Management im Tourismus") echo "selected" ?>>Innovation & Management im Tourismus</option>
                <option value="KMU-Management & Entrepreneurship" <?php if($user->name == "KMU-Management & Entrepreneurship") echo "selected" ?>>KMU-Management & Entrepreneurship</option>
                <option value="Orthoptik" <?php if($user->name == "Orthoptik") echo "selected" ?>>Orthoptik</option>
                <option value="Physiotherapie" <?php if($user->name == "Physiotherapie") echo "selected" ?>>Physiotherapie</option>
                <option value="Radiologietechnologie" <?php if($user->name == "Radiologietechnologie") echo "selected" ?>>Radiologietechnologie</option>
                <option value="Smart Building" <?php if($user->name == "Smart Building") echo "selected" ?>>Smart Building</option>
                <option value="Soziale Arbeit" <?php if($user->name == "Soziale Arbeit") echo "selected" ?>>Soziale Arbeit</option>
                <option value="Wirtschaftsinformatik & Digitale Transformation" <?php if($user->name == "Wirtschaftsinformatik & Digitale Transformation") echo "selected" ?>>Wirtschaftsinformatik & Digitale Transformation</option>
                <option value="Applied Image and Signal Processing" <?php if($user->name == "Applied Image and Signal Processing") echo "selected" ?>>Applied Image and Signal Processing</option>
                <option value="Holztechnologie & Holzwirtschaft" <?php if($user->name == "Holztechnologie & Holzwirtschaft") echo "selected" ?>>Holztechnologie & Holzwirtschaft</option>
                <option value="Suchmaschinenmarketing" <?php if($user->name == "Suchmaschinenmarketing") echo "selected" ?>>Suchmaschinenmarketing</option>
            </select>
            <label for="phone">Telefonnummer</label>
            <input type="tel" name="phone" placeholder="Telefonnummer" value="<?=$user->phone?>">
            <label for="facebook">Facebook Username</label>
            <input type="text" name="facebook" placeholder="Facebook Username" value="<?=$user->facebook?>">
            <label for="skype">Skype Username</label>
            <input type="text" name="skype" placeholder="Skype Username" value="<?=$user->skype?>">
            <label for="linkedin">LinkedIn Username</label>
            <input type="text" name="linkedin" placeholder="LinkedIn Username" value="<?=$user->linkedin?>">
            <input type="submit" value="update">
        </form>
    </section>
</main>
<?php
  
}
endif;
include "footer.php";
?>