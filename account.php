<!DOCTYPE html>
<html>
    <head>
		<!-- <title>2</title> -->
        <?php include 'components/header.php';?>
        <link rel="stylesheet" href="styles/searchbar.css">		
	</head>	

	<body>
        <?php include 'components/navigation_bar.php';
              require_once "includes/dbh.inc.php";
              $UID=$_SESSION['userId'];
              $sql = "SELECT * FROM User WHERE UserID=$UID";
              $Result = $conn->query($sql);
              if ($row = mysqli_fetch_assoc($Result)) {
                echo $UID;
              }
        ?>
        
        


        <?php include 'components/footer.php';?>
    </body>
</html>