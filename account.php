<!DOCTYPE html>
<html>
    <head>
		<!-- <title>2</title> -->
        <?php include 'components/header.php';?>
        <link rel="stylesheet" href="styles/searchbar.css">	
        
	</head>	

	<body>
        <?php include 'components/navigation_bar.php';
              require "includes/dbh.inc.php";
              if(isset($_SESSION['userId'])){
                  $UID = $_SESSION['userId'];
                  $query = mysqli_query($conn,"SELECT * FROM User WHERE UserID = '$UID'");
                  if($query === false) {
                    echo "error while executing mysql: " . mysqli_error($conn);
                   }
                   else{
                    $row = mysqli_fetch_row($query);
                    $fname = $row[2];
                    $lname = $row[3];
                    $pnum = $row[4];
                    $add = $row[5];
                    $email = $row[6];
                    $bal = $row[7];
                    $typ = $row[8]; 
                   }
                  
              }
            //   echo 'Hello, ' .$UID;
            //   echo $fname;
            //   echo $lname;
            //   echo $pnum;
            //   echo $add;
            //   echo $email;
            //   echo $bal;
            //   echo $typ;
        ?>
        <section>
        <div class="container">
            <div class="card" style="width:400px;margin:auto;">
                <img class="card-img-top" src="images/user/img_avatar1.png" alt="Card image" style="width:100%">
                <div class="card-body">
                <h4 class="card-title"><?php echo $UID ?></h4>
                <p class="card-text">Name: <?php echo $fname.' '.$lname ?></p>
                <p class="card-text">Email: <?php echo $email ?></p>
                <p class="card-text">Phone Number: <?php echo $pnum ?></p>
                <p class="card-text">Address: <?php echo $add ?></p>
                <p class="card-text">Balance: <?php echo $bal ?></p>
                <a href="#" class="btn btn-primary">Account Type: <?php echo $typ ?></a>
                </div>
        </div>

        </section>
        
        


        <?php include 'components/footer.php';?>
    </body>
</html>