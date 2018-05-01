<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <script src="assets/jquery-3.3.1.js"></script>
    <script src="assets/main.js"></script>
    <title><?= $pagetitle?>.</title>
</head>
<body>
    <header>
        <section id="logo_title">
            <button id="nav_toggler"></button>
            <div id="burger_icon"></div>
            <a href="index.php">
                <div id="logo_main_l"></div>
                <div id="logo_main_r"></div>
            </a>
            <h1><?= $pagetitle?></h1>
        </section>
        <nav>
            <ul>
                <form action="search.php" method="get">
                    <input type="text" name="search" placeholder="Suche">
                    <input type="submit" value=" " id="submit_search">
                </form>
                <a href="index.php"><li>sammlung</li></a>
                <a href="stoeber.php"><li>stöbern</li></a>
                <a href="person.php?id=<?= $loggedId ?>"><li>mein Konto</li></a>
                <a href="index.php"><li id="logout_button">logout</li></a>
            </ul>
        </nav>
    </header>
