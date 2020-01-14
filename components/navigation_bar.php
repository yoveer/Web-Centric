<?php
    session_start();
?>
<nav class="navbar fixed-top navbar-fixed-top sticky-top navbar-expand-lg bg-dark navbar-primary ">
		<a class="navbar-brand" href="index.php"><i class="material-icons nml">home</i>NML</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"><i class="material-icons">menu</i></span></button>
   
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ">
					<li class="nav-item"> <a class="nav-link" href="About.php"><i class="material-icons">info</i> About Us </a></li>
					<li class="nav-item"> <a class="nav-link" href="Product_collections.php"><i class="material-icons">collections</i>Product Collections</a></li>
					<li class="nav-item"> <a class="nav-link" href="cart.php"><i class="material-icons">shopping_cart</i> Cart </a></li>
					<li class="nav-item"> <a class="nav-link" href="code_of_conduct.php"><i class="material-icons">description</i>Code of Conduct</a></li>
					<li class="nav-item"> <a class="nav-link" href="contactus.php"><i class="material-icons">mail</i>Contact US</a></li>
					
					
					<?php 
						if (isset($_SESSION['userId'])) {  // test if session has started for userId
							echo '<li class="nav-item"> <a class="nav-link" href="account.php"><i class="material-icons">account_circle</i>My Account</a></li>';
							// echo '<li class="nav-item"> <form action="includes/logout.inc.php" method="post"><button type="submit" name="logout-submit">Logout</button></form></li>' ;
							echo '<li class="nav-item"> <a class="nav-link" href="includes/logout.inc.php"><i class="material-icons">logout</i>Logout</a></li>';
                        }
                        else {
                            echo '<li class="nav-item"> <a class="nav-link" href="login.php"> <i class="material-icons">person</i>Login</a> </li>
							<li class="nav-item"> <a class="nav-link" href="signup.php"><i class="material-icons">assignment_ind</i>Sign Up</a></li>';
                        }
                    ?>
				</ul>
			</div>
</nav>

					