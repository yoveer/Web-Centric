<?php
    session_start();
    require_once "includes/dbh.inc.php";
    if(isset($_POST["submit-prod"])){
        $target_dir = "images/product/";
        $randoname = rand(0,10000).$_FILES['pi']['name'];
        $name = $target_dir.$randoname;
        $dst='/opt/lampp/htdocs/Web-Centric/images/product/'; // /opt/lampp/htdocs
        $target_file = $target_dir . basename($randoname);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");


        $prodid = $_POST['pid'];
        $prodname = $_POST['pn'];
        $proddesc = $_POST['pd'];
        $prodprice = $_POST['pp'];
        $prodquan = $_POST['pq'];
        $prodcat = $_POST['pc'];
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
        
            // Insert record
            $sql="INSERT INTO Product(ProductID, Name, Description, Price, Quantity, Category, photo, counter) 
                    VALUES ('$prodid', '$prodname', '$proddesc', '$prodprice', '$prodquan', '$prodcat', '$name', '0')";
            $result = $conn->query($sql);

            if ($result) {
                echo "<div class='alert alert-success' role='success'>";
                echo "<center>Added product successfully</center>";
                echo "</div>";
                // Upload file
                if (move_uploaded_file($_FILES['pi']['tmp_name'],$dst.$randoname)) {
                    echo "The file ". basename( $randoname). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                // header("Location: ../Product_collections.php?addprod=success");
                // exit();
            }
            else {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                echo "</div>";
            }
            

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
						<?php echo "<p style='color:blue;margin:auto;padding:0px 0px 0px 40px'>Hi, ".$_SESSION['userId']." <i class='fa fa-heart'></i></p>";?>
                    </div>
                </div>
            </nav>

            <div>
                <h2><center>Add Product</center></h2>
                <div class="container">
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Product ID</td>
                                <td><input class="form-control mb-4" type="text" name="pid" required></td>
                            </tr>
                            <tr>
                                <td>Product Name</td>
                                <td><input class="form-control mb-4" type="text" name="pn" required></td>
                            </tr> 
                            <tr>
                                <td>Product Description</td>
                                <td><textarea class="form-control mb-4 rounded-0" rows="5" name="pd" placeholder="Write the product description" required></textarea></td>
                            </tr> 
                            <tr>
                                <td>Product Price</td>
                                <td><input class="form-control mb-4" type="number" name="pp" required></td>
                            </tr> 
                            <tr>
                                <td>Product Quantity</td>
                                <td><input class="form-control mb-4" type="number" name="pq" required></td>
                            </tr> 
                                <td>Product Category</td>
                                <td>
                                    <select class="browser-default custom-select mb-4" name="pc" required>
                                        <option value="" disabled selected>Choose your category</option>
                                        <?php 
                                        $sql = "SELECT * FROM Categories";
                                        $Result = $conn->query($sql);
                                        while ($row = mysqli_fetch_assoc($Result)) {
                                            $cat = $row['Category'];
                                        ?>
                                            <option value=<?php echo $cat ?>><?php echo $cat ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr> 
                                <td>Product Image</td>
                                <td><input class="form-control-file btn btn-info" type="file" name="pi" required></td>
                            </tr>   
                            <tr> 
                                <td></td>
                                <td><button class="btn btn-info btn-block my-4" type="submit" name="submit-prod">Add this product</td>
                            </tr> 
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
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>