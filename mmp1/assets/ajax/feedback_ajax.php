
<?php
// Multimedia Projekt 1
// Multimedia Technology
// Fachhochschule Salzburg
// Niklas Clemens Noldin
// fhs41321

    include '../../function.php';
    $feedbackhandle = $dbh->prepare("INSERT INTO feedback (feedbacker, conceptid, stars, creationdate, data) VALUES (?, ?, ?, ?, ?)");
    $feedbackhandle->execute(array(
        $_SESSION['user'],
        htmlspecialchars($_POST['id']),
        htmlspecialchars($_POST['stars']),
        date(DATE_RFC822),
        htmlspecialchars($_POST['data'])
    ));
?>