<!DOCTYPE html>
<html>
    <head>
        <?php include 'components/header.php';?>   
	</head>	

	<body>
        <?php include 'components/navigation_bar.php';?>
        <!-- include 'components/sidebar.php' -->
        <?php 
              require_once "includes/dbh.inc.php";
              include 'includes/ProductPageForClient.inc.php';
        ?>
        
        <?php include 'components/footer.php';?>
    </body>
</html>