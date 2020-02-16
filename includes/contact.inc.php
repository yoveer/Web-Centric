<?php

if (isset($_POST['submit-contact'])) {
    require 'dbh.inc.php';

    $email = $_POST['email'];
    $rate = $_POST['rate'];
    $message = $_POST['message'];

    if (empty($email) || empty($rate) || empty($message)) {
        header("Location: ../contactus.php?error=emptyfields");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../contactus.php?error=invalidmail");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9 ,!?.]*$/", $message)){
            header("Location: ../sign_up.php?error=invalidmsg");
            exit();
        }
        else{

            $sql = "INSERT INTO Contact(email, rating, message) VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../contactus.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sss", $email, $rate, $message);
                mysqli_stmt_execute($stmt);
                header("Location: ../contactus.php?signup=success");
                exit();
            }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../contactus.php");
    exit();
}
