<?php

if (isset($_POST['submit-contact'])) {
    require 'dbh.inc.php';

    $email = $_POST['email'];
    $rate = $_POST['rate'];
    $message = $_POST['message'];

    if (empty($email) || empty($rate) || empty($message)) {
        session_start();
        $_SESSION['message'] = "<strong>Do not leave the fields empty!</strong> Try again.";
        header("Location: ../contactus.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        session_start();
        $_SESSION['message'] = "<strong>Invalid Mail!</strong> Try again.";
        header("Location: ../contactus.php");
    } else if (!preg_match("/^[a-zA-Z0-9 \s,!?.';:]*$/", $message)) {
        session_start();
        $_SESSION['message'] = "<strong>Invalid message</strong> Try again.";
        header("Location: ../contactus.php");
    } else {

        $sql = "INSERT INTO Contact(email, rating, message) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            session_start();
            $_SESSION['message'] = "<strong>Do not leave the fields empty!</strong> Try again.";
            header("Location: ../contactus.php");
        } else {
            mysqli_stmt_bind_param($stmt, "sss", $email, $rate, $message);
            mysqli_stmt_execute($stmt);
            header("Location: ../contactus.php?contact=success");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../contactus.php");
    exit();
}
