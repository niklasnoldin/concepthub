<?php
    if(!empty($_POST['user'])){
        $passchecker = $dbh->prepare("SELECT \"password\" AS pass FROM users WHERE \"username\" = ? LIMIT 1");

        $passchecker->execute(array($_POST['user']));

        $actualpass = $passchecker->fetch();

        if( 
            password_verify($_POST['pass'], $actualpass->pass)
            ) {

            $_SESSION['user'] = $_POST['user'];
        } else {
            $errormessage_login = "Benutzername oder Passwort ist ungültig.";
        }
    } else if(!empty($_POST['username'])){

        $isfemale = $_POST['isfemale'];
        if ($isfemale == "null") $isfemale = null;
        
        $createhandle = $dbh->prepare("INSERT INTO 
            \"users\" (username, email, firstname, lastname, password, isfemale, membersince) 
            VALUES(?,?,?,?,?,?,?)
        ");

        $likeshandle = $dbh->prepare("INSERT INTO likes (follower, conceptid) VALUES (?,?)");


        try{
            $createhandle->execute(array(
                $_POST['username'],
                $_POST['mail'],
                $_POST['firstname'],
                $_POST['lastname'],
                password_hash($_POST['password'], PASSWORD_BCRYPT,array("cost" => 10)),
                $isfemale,
                date(DATE_RFC822)
            ));

            $likeshandle->execute(array($_POST['username'], null));
        } catch (PDOException $e){
            header("Location: index.php?error=Es%20ist%20etwas%20schiefgelaufen.<br>Hast%20du%20eventuell%20schon%20ein%20Konto?");
            exit;
        }
        
        $_SESSION['user'] = $_POST['username'];
        header("Location: index.php");
        exit;
    }
?>