<?php

if (isset($_POST['signup-submit'])){ //we know that the user clicked on submit on the signup page not by writing the link in url

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $first = $_POST['fname'];
    $last = $_POST['lname'];
    $pnumber = $_POST['pnum'];
    $address = $_POST['add'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $balance = 0.0;

    if (empty($username) || empty($first) || empty($last) || empty($pnumber) || empty($address) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $first)){
        header("Location: ../signup.php?error=invalidfname&mail=".$email);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $last)){
        header("Location: ../signup.php?error=invalidlname&mail=".$email);
        exit();
    }
    else if (!preg_match("/^[0-9]{8}$/", $pnumber)){
        header("Location: ../signup.php?error=invalidpnum&mail=".$email);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9 ,]*$/", $address)){           
        header("Location: ../signup.php?error=invalidadd&mail=".$email);
        exit();
    }
    else if ($password !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
    else {
        $sql = "SELECT UserID FROM User WHERE UserID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else {

                $sql = "INSERT INTO User(UserID, Password, Firstname, Lastname, Phonenumber, Address, Email, Balance) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


                    mysqli_stmt_bind_param($stmt, "ssssissd", $username, $hashedPwd, $first, $last, $pnumber, $address, $email, $balance);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../signup.php");
    exit();
}