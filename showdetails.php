<!DOCTYPE html>
<html>
    <head>
		<!-- <title>2</title> -->
        <?php include 'components/header.php';?>
        <link rel="stylesheet" href="styles/searchbar.css">		
	</head>	

	<body>
		<?php include 'components/navigation_bar.php';?>
        <?php 
            if(isset($_POST['submit1'])){
                require 'includes/dbh.inc.php';
                $prodID = $_POST['pid'];

                $sql = "SELECT * FROM Product WHERE ProductID = '$prodID'";
                $Result = $conn->query($sql);
                $row = mysqli_fetch_assoc($Result); ?>

                <div>
                    <h2><?php echo $row['ProductID']; ?></h2>
                    <img src= <?php echo $row['photo']; ?> width=500px/>
                    <span>
                        <p>Name : <?php echo $row['Name']; ?></p>
                        <p>Description : <?php echo $row['Description']; ?></p>
                        <p>Price : Rs <?php echo $row['Price']; ?></p>
                        <p>Quantity : <?php echo $row['Quantity']; ?></p>
                        <p>Category : <?php echo $row['Category']; ?></p>
                    </span>
                </div>


    <?php   }
            else{
                echo "No Product Found";
            }
        ?>

        <div style="padding-bottom: 106px"></div>
        <?php include 'components/footer.php';?>
    </body>
</html> 