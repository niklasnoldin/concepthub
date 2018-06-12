<?php

// Multimedia Projekt 1
// Multimedia Technology
// Fachhochschule Salzburg
// Niklas Clemens Noldin
// fhs41321

?>


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
                <!-- <div id="logo_main_l"></div>
                <div id="logo_main_r"></div> -->

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="650 390 150 120" id="logo_main">
                    <g data-name="4 rechts">
                        <path fill="#fff" d="M781.3 418.3v48.9l-34.7 34.6-17.3-17.3v-24.4l5.3-5.3-5.3-5.1v-25.3l17.3-16.4 4.2 5 13.1-12 17.4 17.3z"/>
                        <path data-name="4" d="M764 398.1l-12.3 12.3-5-5-19.4 19.2v26.1l4.3 4.3-4.3 4.2v26.2l19.3 19.3 36.6-36.6v-50.6zm0 5.7l14.4 14.5-14.5 14.5-14.4-14.5 2.2-2.3 1.4-1.4zm-31.8 56.3l5-5.1 9.4-9.4 14.5 14.5-14.5 14.4zm16.4-18.2v-18.8l13.3 13.3v18.8zm.3-28.7l-4.3 4.3v20.4l-12.4-12.4 14.4-14.5zm-17.6 35.9v-18.8l12.5 12.5-9.4 9.4zm0 15.8l13.3 13.3V497l-13.3-13.3zm17.3 32.1v-18.8l17.3-17.3v-24.5l13.3-13.3v43.3z"/>
                    </g>
                    <g data-name="3 links">
                        <path fill="#fff" d="M712.1 441v-24.4l-17.3-17.3-34.6 34.6v48.9l17.3 17.3.1-.2 12.1-12 5.1 5 17.3-17.3v-24.4l-5.1-5.1 5.1-5.1z"/>
                        <path d="M714 415.7l-19.2-19.3-36.6 36.6v50.6l19.3 19.3 12.2-12.2 5 5 19.4-19.2v-26.2l-4.3-4.2 4.3-4.3zm-4.8.9l-15.9 15.8-1.4 1.5 13.7 13.6 3.6 3.7-14.4 14.4L663 434l31.8-31.8zm-47 22l30.6 30.7v18.8l-1.7-1.6-15.6-15.7v24.5L662.2 482zm24.7 49.3l-7.4 7.4v-14.8zm9.9.2v-18.8L710 456v18.8zm10.2-44.8l-9.4-9.4 12.5-12.5v18.8z"/>
                    </g>
                    <g data-name="2 rechts">
                        <g data-name="2">
                        <path fill="#fff" d="M763.9 401l-17.3 17.3v24.5l17.3 17.3v-17.3l17.4 24.4v-48.9L763.9 401zM729.3 460.1v24.4l17.3 17.3v-24.4l-17.3-17.3z"/>
                        <path d="M782.7 416.9l-17.3-17.3h-2.9l-17.3 17.3a2 2 0 0 0-.6 1.4v24.5l.6 1.4 17.3 17.3 3.4-1.4v-23.7l13.3-13.3v44.1a2 2 0 0 0 4 0v-49a2 2 0 0 0-.5-1.3zm-20.8 38.3L748.6 442v-18.8l13.3 13.3zm2-22.4l-14.4-14.5 14.4-14.5 14.5 14.5zM730.8 458.6l-3.5 1.5v24.4l.6 1.4 17.3 17.4 3.4-1.5v-24.4l-.6-1.4zm13.8 38.4l-13.3-13.3v-18.8l13.3 13.3z"/>
                        <path fill="none" d="M727.3 398.1h55.9v106.5h-55.9z"/>
                        </g>
                    </g>
                    <g data-name="1 links" id="1_left" cx="0">
                        <path fill="#fff" d="M671.9 469.4l22.9 23.5 17.3-17.3v-24.4l-22.7-19.5"/>
                        <path d="M696.2 432.4l-.7.7-1.4-1.4-2.2 2.2 17.3 17.3-14.4 14.4-21-21-2.8 3 21.8 21.7v18.8l-17.3-17.3v6.6h.9l18.4 18.4 19.3-19.3v-26.2zm.6 55.7v-18.8L710 456v18.8z"/>
                        <path fill="none" d="M658.2 396.4h55.9v106.5h-55.9z"/>
                    </g>
                    <animate 
                    xlink:href="#1_left"
                    attributeName="cx"
                    from="0"
                    to="50" 
                    dur="1s"
                    begin="mouseover"
                    fill="freeze"/>
                </svg>
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
