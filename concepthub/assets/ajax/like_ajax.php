<?php
    include '../../function.php';
    $likehandle = $dbh->prepare("INSERT INTO likes (follower, conceptid) VALUES (?, ?)");
    $id2like = $_POST['id'];
    $personthatlikes = $_SESSION['user'];
    $likehandle->execute(array($personthatlikes, $id2like));
?>