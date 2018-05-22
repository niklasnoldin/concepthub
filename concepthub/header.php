<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900i" rel="stylesheet">
    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#000000">
    <link rel="shortcut icon" href="assets/img/favicon/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="concepthub.">
    <meta name="application-name" content="concepthub.">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="msapplication-config" content="assets/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/main.js"></script>
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
                    <input type="search" name="search" placeholder="Suche">
                    <input type="submit" value=" " id="submit_search">
                </form>
                <a href="index.php"><li>sammlung</li></a>
                <a href="stoeber.php"><li>stöbern</li></a>
                <a href="person.php?user=<?=$_SESSION['user'] ?>"><li>mein Konto</li></a>
                <a href="person.php?>"><li>Personen</li></a>
                <a href="logout.php"><li>logout</li></a>
            </ul>
        </nav>
    </header>
