<?php
session_start();
require_once "includes/dbh.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uid'];
    $first = $_POST['fname'];
    $last = $_POST['lname'];
    $pnumber = $_POST['pnum'];
    $address = $_POST['add'];
    $email = $_POST['mail'];
    $password = 1234;
    $balance = 0.0;
    $type = 'admin';

    if (empty($username) || empty($first) || empty($last) || empty($pnumber) || empty($address) || empty($email) || empty($password)) {
        session_start();
        $_SESSION['message'] = "<strong>Do not leave the fields empty!</strong> Try again.";
        header("Location: AdminAddAdmin.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        session_start();
        $_SESSION['message'] = "<strong>Invalid email or username!</strong> Try again.";
        header("Location: AdminAddAdmin.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        session_start();
        $_SESSION['message'] = "<strong>Invalid email!</strong> Try again.";
        header("Location: AdminAddAdmin.php");
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        session_start();
        $_SESSION['message'] = "<strong>Invalid username!</strong> Try again.";
        header("Location: AdminAddAdmin.php");
    } else if (!preg_match("/^[a-zA-Z]*$/", $first)) {
        session_start();
        $_SESSION['message'] = "<strong>Invalid First name!</strong> Try again.";
        header("Location: AdminAddAdmin.php");
    } else if (!preg_match("/^[a-zA-Z]*$/", $last)) {
        session_start();
        $_SESSION['message'] = "<strong>Invalid Last name!</strong> Try again.";
        header("Location: AdminAddAdmin.php");
    } else if (!preg_match("/^[0-9]{8}$/", $pnumber)) {
        session_start();
        $_SESSION['message'] = "<strong>Invalid Phone number!</strong> Try again.";
        header("Location: AdminAddAdmin.php");
    } else if (!preg_match("/^[a-zA-Z0-9 ,]*$/", $address)) {
        session_start();
        $_SESSION['message'] = "<strong>Invalid Address!</strong> Try again.";
        header("Location: AdminAddAdmin.php");
    } else {
        $sql = "SELECT UserID FROM User WHERE UserID=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            session_start();
            $_SESSION['message'] = "<strong>SQL error!</strong> Try again.";
            header("Location: AdminAddAdmin.php");
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                session_start();
                $_SESSION['message'] = "<strong>Username already taken!</strong> Try again. <br>If this is you please <a href='login.php'>login</a>.";
                header("Location: AdminAddAdmin.php");
            } else {

                $sql = "INSERT INTO User(UserID, Password, Firstname, Lastname, Phonenumber, Address, Email, Balance, type) VALUES (?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    session_start();
                    $_SESSION['message'] = "<strong>SQL error!</strong> Try again.";
                    header("Location: AdminAddAdmin.php");
                } else {

                    mysqli_stmt_bind_param($stmt, "ssssissds", $username, $password, $first, $last, $pnumber, $address, $email, $balance, $type);
                    mysqli_stmt_execute($stmt);
                    header("Location: AdminAddAdmin.php?adding=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>NML Admin Page</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="styles/adminsidebar.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include 'components/adminsidebar.php' ?>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php echo "<p style='color:blue;margin:auto;padding:0px 0px 0px 40px'>Hi, " . $_SESSION['userId'] . " <i class='fa fa-heart'></i></p>"; ?>
                    </div>
                </div>
            </nav>

            <div>
                <h2>
                    <center>Add Admin</center>
                </h2>
                <?php
                if (@$_GET['adding'] == 'success') {
                    echo "<div class='alert alert-success' role='success'>";
                    echo "<center>Admin has been successfully Added.<br>He/She can now login!</center>";
                    echo "</div>";
                }
                ?>
                <?php
                if (!empty($_SESSION['message'])) {
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo $_SESSION['message'];
                    echo "</div>";
                    unset($_SESSION['message']);
                }
                ?>
                <div class="container">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <table>
                            <tr>
                                <td>User ID</td>
                                <td><input class="form-control mb-4" type="text" name="uid" required></td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td><input class="form-control mb-4" type="text" name="fname" required></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td><input class="form-control mb-4" type="text" name="lname" required></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><input class="form-control mb-4" type="tel" name="pnum" required></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input class="form-control mb-4" type="text" name="add" required></td>
                            </tr>
                                <td>Email</td>
                                <td><input class="form-control mb-4" type="email" name="mail" required></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button class="btn btn-info btn-block my-4" type="submit" name="submit-prod">Add this Admin</td>
                            </tr>
                            <?php
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo "<strong>Password is given by admins</strong>";
                                echo "</div>";
                            
                            ?>
                        </table>
                    </form>

                </div>

            </div>
        </div>

        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
</body>

</html>