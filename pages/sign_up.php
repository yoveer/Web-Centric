<!DOCTYPE html>
<html>
    <head>
        <!-- <title>2</title> -->
        <?php include 'header.php';?>        
        <link rel="stylesheet" href="styles/signup.css">	
    </head>	
        
    <body>
        <?php include 'navigation_bar.php';?>
        <section>
            <div class="signup-form">
                    <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyfields") {
                                echo '<p>Fill in all fields</p>';
                            }
                            else if ($_GET["error"] == "invaliduidmail") { //mo cav fr encr
                                echo '<p>Invalid Username and Email</p>';
                            }
                            //ena encr
                        }
                        else if ($_GET["signup"] == "success") {
                            echo '<p>Signup Successfull</p>';
                        }
                    ?>
                    <form action="includes/signup.inc.php" method="post">
                    <h1>Sign Up</h1>
                    <input type="text" name="uid" placeholder="Username" class="txtb">
                    <input type="text" name="fname" placeholder="First Name" class="txtb">
                    <input type="text" name="lname" placeholder="Last Name" class="txtb">
                    <input type="tel" name="pnum" placeholder="Phone Number" class="txtb">
                    <input type="text" name="add" placeholder="Address" class="txtb">
                    <input type="email" name="mail" placeholder="Email" class="txtb">
                    <input type="password" name="pwd" placeholder="Password" class="txtb">
                    <input type="password" name="pwd-repeat" placeholder="Repeat Password" class="txtb">
                    <input type="submit" name="signup-submit" value="Create Account" class="signup-btn">
                    <a href="login.php">Already Have One ?</a>
                </form>
            </div>
        </section>
        <?php include 'footer.php';?>
    </body>
</html>