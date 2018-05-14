<?php
include "function.php";
include "login_function.php";
$pagetitle = 'bearbeiten';




include "header.php";
if (empty($_SESSION['user'])): include "login.php";
else:
?>
<main>
<section>
        <h2>Projekt bearbeiten</h2>
        <?php if(!empty($errormessage)) echo "<p class='error_message'>".$errormessage."</p>";?>
        <form id="add_project_form" enctype="multipart/form-data" action="edit_concept.php" method="post">
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
            <input type="submit" value="Update">
        </form>
    </section>

</main>
<?php
endif;
include "footer.php";
?>