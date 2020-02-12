<!DOCTYPE html>
<html>
    <head>
		<!-- <title>2</title> -->
        <?php include 'components/header.php';?>
        <link rel="stylesheet" href="styles/searchbar.css">	
        <style>
            body{padding-top:30px;}

            .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

            small {
            display: block;
            line-height: 1.428571429;
            color: #999;
            }
        </style>	
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	</head>	

	<body>
        <?php include 'components/navigation_bar.php';
              require "includes/dbh.inc.php";
              if(isset($_SESSION['userId'])){
                  $UID = $_SESSION['userId'];
                  $q = mysqli_query($conn,"SELECT * FROM User WHERE UserID = '$UID'");
                  if($q === false) {
                    echo "error while executing mysql: " . mysqli_error($conn);
                   }
                   else{
                    $r = mysqli_fetch_row($q);
                    $fname = $r[2];
                    $lname = $r[3];
                    $pnum = $r[4];
                    $add = $r[5];
                    $email = $r[6];
                    $bal = $r[7];
                    $typ = $r[8]; 
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
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-sm-6 col-md-8">
                                <h4>
                                    <?php echo $fname.' '.$lname ?></h4>
                                <small><cite title="San Francisco, USA"><?php echo $add ?> <i class="glyphicon glyphicon-map-marker">
                                </i></cite></small>
                                <p>
                                    <i class="glyphicon glyphicon-envelope"></i><?php echo $email?>
                                    <br />
                                    <i class="glyphicon glyphicon-globe"></i><?php echo $pnum ?>
                                    <br />
                                    <i class="glyphicon glyphicon-gift"></i><?php echo $bal ?></p>
                                <!-- Split button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">
                                    <?php echo $typ?> type</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        


        <?php include 'components/footer.php';?>
    </body>
</html>