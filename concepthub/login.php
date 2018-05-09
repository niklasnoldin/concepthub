<main>
    <section id="login_screen">
        <a href="https://www.fh-salzburg.ac.at/">
            <img class="logo_fh" src="assets/img/fhs.svg" alt="FH Salzburg" title="FH Salzburg">
        </a>
        
        <h2>Das Konzeptportal der Fachhochschule Salzburg</h2>
        <form id="login" action="index.php" method="post">
            <?php
                if(!empty($errormessage_login)) echo "<p style='color: red; font-size: 0.5em; text-align: center;'>".$errormessage_login."</p>";
                if(!empty($_GET['error'])) echo "<p style='color: red; font-size: 0.5em; text-align: center;'>".$_GET['error']."</p>";
            ?>
            <input type="text" name="user" placeholder="benutzername." required title="USER: user PASS: user">
            <input type="password" name="pass" placeholder="passwort." required title="USER: user PASS: user">
            <input type="submit" value="login.">
        </form>
        <a href="#" id="show_register">Noch kein Mitglied?</a>
        <form id="register" action="index.php" method="post">
            <input type="text" name="firstname" placeholder="vorname."  required>
            <input type="text" name="lastname" placeholder="nachname." required>
            <input type="text" name="username" placeholder="benutzername." required>

            <fieldset>
                <legend>geschlecht.</legend>
            <label class="radiobutton">
                weiblich.
                <input type="radio" name="isfemale" value="true">
                <span></span>
            </label>
            <label class="radiobutton">
                männlich.
                <input type="radio" name="isfemale" value="false">
                <span></span>
            </label>
            <label class="radiobutton">
                anderes.
                <input type="radio" name="isfemale" value="null" selected>
                <span></span>
            </label>
            </fieldset>

            <input type="password" name="password" placeholder="passwort." required>
            <input type="password" name="password2" placeholder="wiederholen." required>
            <input type="mail" name="mail" placeholder="email." required>
            <input type="submit" value="let's go.">
        </form>
    </section>
</main>