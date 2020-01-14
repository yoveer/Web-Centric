<!DOCTYPE html>
<html>
    <head>
        <?php include 'components/header.php';?>
        <link rel="stylesheet" href="styles/login.css">
    </head>	
        
    <body>
        <?php include 'components/navigation_bar.php';?>
        <section>
        <form class="box" action="includes/login.inc.php" method="POST">
            <h1>Login</h1>
            <input type="text" name="mailuid" placeholder="Username/Email">
            <input type="password" name="pwd" placeholder="Password">
            <input type="submit" name="login-submit" value="Login">
            <a href="sign_up.php">Isn't a registered User ?</a>
        </form>
        </section>       
		<?php include 'components/footer.php';?>
    </body>
</html>