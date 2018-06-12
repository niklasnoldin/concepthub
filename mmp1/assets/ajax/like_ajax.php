<?php

// Multimedia Projekt 1
// Multimedia Technology
// Fachhochschule Salzburg
// Niklas Clemens Noldin
// fhs41321



    include '../../function.php';
    $likehandle = $dbh->prepare("INSERT INTO likes (follower, conceptid) VALUES (?, ?)");
    $id2like = $_POST['id'];
    $personthatlikes = $_SESSION['user'];
    $likehandle->execute(array($personthatlikes, $id2like));
?>