<?php
session_start();
require_once "includes/dbh.inc.php";
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE Product SET flag='0' WHERE flag='1'";
    $result = $conn->query($sql);

    if ($result) {
        echo "<div class='alert alert-success' role='success'>";
        echo "<center>Deleted all successfully</center>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "</div>";
    }
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
                <center>
                    <h2>Empty the choices for Manager's Choice of the week</h2>
                </center>
                <div class="table-responsive">
                    <table class="table table-bordered table-dark table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <?php
                        $sql = "SELECT * FROM Product WHERE flag='1'";
                        $Result = $conn->query($sql);
                        while ($row = mysqli_fetch_assoc($Result)) {
                            $PID = $row['ProductID'];
                            $name = $row['Name'];
                            $desc = $row['Description'];
                            $photo = $row['photo'];
                        ?>
                            <tbody>
                                <tr>
                                    <td><img width="100" height="100" src=<?php echo $photo ?>></td>
                                    <td><?php echo $PID ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $desc ?></td>
                                </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                    </table>
                    <div>
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                            <button type="submit" class="btn btn-info">Empty Choices</button>
                        </form>
                    </div>
                </div>
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