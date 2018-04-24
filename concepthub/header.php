<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900i" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <script src="assets/main.js"></script>
    <title><?= $pagetitle?></title>
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
            <h1 id="pagetitle"><?= $pagetitle?></h1>
        </section>
        <nav>
            <ul>
                <form action="search.php" method="get">
                    <input type="text" name="search" placeholder="Suche">
                    <input type="submit" value=" " id="submit_search">
                </form>
                <a href="#"><li>Seite 1</li></a>
                <a href="#"><li>Seite 1</li></a>
                <a href="#1"><li>Seitge 2</li></a>
                <a href="#2"><li>Seite 3</li></a>
                <a href="#3"><li>Seite 4</li></a>
            </ul>
        </nav>
    </header>
