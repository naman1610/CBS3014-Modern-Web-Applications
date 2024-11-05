<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $feedback = htmlspecialchars($_POST['feedback']);
    //Set the timezone to India
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");

    $feedbackEntry = "Date: $timestamp\nName: $name\nEmail: $email\nMessage: $feedback\n\n";

    file_put_contents('feedback.txt', $feedbackEntry, FILE_APPEND | LOCK_EX);
    header("Location: index.php?success=1");
    exit();
}
?>