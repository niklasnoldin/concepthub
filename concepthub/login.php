<?php
    if(!empty($_POST['user'])){
        $passchecker = $dbh->prepare("SELECT password AS pass FROM users WHERE 'username' = $1");

        $passchecker->execute( array( $_POST['user'] ) );

        $actualpass = $passchecker->Fetch();

        print_r($passchecker);

        echo "<br>received user->".$_POST['user'];

        echo "<br>actual pass->".$actualpass;

        echo "<br>posted user->".$_POST[user];

        echo "<br>posted pass->".$_POST['pass'];

        if($_POST['pass'] == $actualpass) {
            $_SESSION['user'] = $_POST['user'];
            header("Location: index.php");
            exit;
        } else {
            $errormessage_login = "Benutzername oder Passwort ist ungültig.";
            
        }
    } else if(!empty($_POST[username])){
        
    }
?>
<main>
    <section id="login_screen">
        <img id="logo_fh"src="img/FH_Salzburg_Logo_DE_klein.png" alt="FH Salzburg Logo">
        <h2>Das Konzeptportal der Fachhochschule Salzburg</h2>
        <form id="login" action="index.php" method="post">
            <?php echo "<p style='color: red; font-size: 0.5em; text-align: center;'>".$errormessage_login."</p>";?>
            <input type="text" name="user" placeholder="benutzername." required>
            <input type="password" name="pass" placeholder="passwort." required>
            <input type="submit" value="login.">
        </form>
        <a href="#" id="show_register">Noch kein Mitglied?</a>
        <form id="register" action="index.php" method="post">
            <input type="text" name="firstname" placeholder="vorname."  required>
            <input type="text" name="lastname" placeholder="nachname." required>
            <input type="text" name="username" placeholder="benutzername." required>
            <input type="password" name="password" placeholder="passwort." required>
            <input type="password" name="password2" placeholder="passwort wiederholen." required>
            <input type="mail" name="mail" placeholder="email.">
            <input type="submit" value="let's go.">
        </form>
    </section>
</main>