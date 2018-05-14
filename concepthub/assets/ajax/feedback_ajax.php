<?php
    include '../../function.php';
    $feedbackhandle = $dbh->prepare("INSERT INTO feedback (feedbacker, conceptid, stars, creationdate, data) VALUES (?, ?, ?, ?, ?)");
    $feedbackhandle->execute(array(
        $_SESSION['user'],
        $_POST['id'],
        $_POST['stars'],
        date(DATE_RFC822),
        $_POST['data']
    ));
?>