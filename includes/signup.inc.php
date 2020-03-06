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
        session_start();
        $_SESSION['message'] = "<strong>Do not leave the fields empty!</strong> Try again.";
        header("Location: ../signup.php");
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        session_start();
        $_SESSION['message'] = "<strong>Invalid email or username!</strong> Try again.";
        header("Location: ../signup.php");
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        session_start();
        $_SESSION['message'] = "<strong>Invalid email!</strong> Try again.";
        header("Location: ../signup.php");
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        session_start();
        $_SESSION['message'] = "<strong>Invalid username!</strong> Try again.";
        header("Location: ../signup.php");
        
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $first)){
        session_start();
        $_SESSION['message'] = "<strong>Invalid First name!</strong> Try again.";
        header("Location: ../signup.php");
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $last)){
        session_start();
        $_SESSION['message'] = "<strong>Invalid Last name!</strong> Try again.";
        header("Location: ../signup.php");
    }
    else if (!preg_match("/^[0-9]{8}$/", $pnumber)){
        session_start();
        $_SESSION['message'] = "<strong>Invalid Phone number!</strong> Try again.";
        header("Location: ../signup.php");
    }
    else if (!preg_match("/^[a-zA-Z0-9 ,]*$/", $address)){   
        session_start();
        $_SESSION['message'] = "<strong>Invalid Address!</strong> Try again.";
        header("Location: ../signup.php");
    }
    else if ($password !== $passwordRepeat){
        session_start();
        $_SESSION['message'] = "<strong>Passwords does not match!</strong> Try again.";
        header("Location: ../signup.php");
    }
    else {
        $sql = "SELECT UserID FROM User WHERE UserID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            session_start();
            $_SESSION['message'] = "<strong>SQL error!</strong> Try again.";
            header("Location: ../signup.php");
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                session_start();
                $_SESSION['message'] = "<strong>Username already taken!</strong> Try again.";
                header("Location: ../signup.php");
            }
            else {

                $sql = "INSERT INTO User(UserID, Password, Firstname, Lastname, Phonenumber, Address, Email, Balance) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    session_start();
                    $_SESSION['message'] = "<strong>SQL error!</strong> Try again.";
                    header("Location: ../signup.php");
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