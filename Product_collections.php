<!DOCTYPE html>
<html>
    <head>
        <?php include 'components/header.php';?>
        <style>
              /* disparet */
            .bouton {
                text-align: center;
            }
        </style>    
	</head>	

	<body>
		<?php include 'components/navigation_bar.php';?>
        <?php include 'components/sidebar.php';
              require_once "includes/dbh.inc.php";
        ?>
        
        <?php
            if (($_SESSION['is_admin'])=="admin") {
                include 'includes/ProductPageForAdmin.inc.php';
            }
            else{
                include 'includes/ProductPageForClient.inc.php';
            }
        ?>
        
        <?php include 'components/footer.php';?>
    </body>
</html>