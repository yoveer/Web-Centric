<!DOCTYPE html>
<html>

<head>
    <?php include 'components/header.php'; ?>
    <link rel="stylesheet" href="styles/signup1.css">
</head>

<body>
    <?php include 'components/navigation_bar.php'; ?>

    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Authenticate Now</h2>
                    <form class="box" action="includes/login.inc.php" method="POST">
                        <div class="form-group">
                            <label for="InputEmail1" class="text-uppercase">Username or Email</label>
                            <input type="text" class="form-control" placeholder="" name="mailuid">

                        </div>
                        <div class="form-group">
                            <label for="InputPassword1" class="text-uppercase">Password</label>
                            <input type="password" class="form-control" placeholder="" name="pwd">
                        </div>


                        <div class="form-check" style="text-align: center">
                            <label class="form-check-label">
                                <a href="signup.php">Isn't a registered User ?</a>
                            </label>
                        </div>


                        <button type="submit" class="btn btn-info btn-block" value="Submit Button" name="login-submit">Submit</button>

                    </form>
                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carousel-login" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="https://cdn.discordapp.com/attachments/666663327153258506/678283398678052931/Untitled.png" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>Join us for full access on our unique collection</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        </div>
    </section>





    <?php include 'components/footer.php'; ?>
</body>

</html>