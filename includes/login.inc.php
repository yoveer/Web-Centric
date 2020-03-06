<?php

if (isset($_POST['login-submit'])){
    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)){
        session_start();
        $_SESSION['message'] = "<strong>Do not leave the fields empty!</strong> Try again.";
        header("Location: ../login.php");
    }
    else {
        $sql = "SELECT * FROM User WHERE UserID=? OR Email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            session_start();
            $_SESSION['message'] = "<strong>Problem with SQL codes!</strong> Try again.";
            header("Location: ../login.php");
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['Password']);
                if ($pwdCheck == false) {
                    session_start();
                    $_SESSION['message'] = "<strong>Wrong password!</strong> Try again.";
                    header("Location: ../login.php");
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['UserID'];           //session start for userID
                    $_SESSION['is_admin'] = $row['type'];           //session start for type of account
                    header("Location: ../index.php?login=success");
                }
                else {
                    session_start();
                    $_SESSION['message'] = "<strong>Error with repeated password!</strong> Try again.";
                    header("Location: ../login.php");
                }
            }
            else {
                session_start();
                $_SESSION['message'] = "<strong>Not a user!</strong> Try again or <a href='signup.php'>create a new account</a>";
                header("Location: ../login.php");
            }
        }
    }
}
else {
    header("Location: ../login.php");
    exit();
}