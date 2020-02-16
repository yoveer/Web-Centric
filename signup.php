<head>
  <?php include 'components/header.php'; ?>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="styles/signup1.css">
</head>

<body>
  <?php include 'components/navigation_bar.php'; ?>
  <?php
  if (@$_GET['signup'] == 'success')
    echo '<div class="copy-text"><center>You have registered successfully.<br>Welcome dear user<i class="fa fa-heart"></i></center></div>'
  ?>
  <section class="login-block">
    <div class="container">
      <div class="row">
        <div class="col-md-4 login-sec">
          <h2 class="text-center">Create Account</h2>
          <form action="includes/signup.inc.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-uppercase">Username</label>
              <input type="text" class="form-control" placeholder="" name="uid">

            </div>
            <div class="form-group">
              <label for="exampleInputfname1" class="text-uppercase">First Name</label>
              <input type="text" class="form-control" placeholder="" name="fname">
            </div>
            <div class="form-group">
              <label for="exampleInputlname1" class="text-uppercase">Last Name</label>
              <input type="text" class="form-control" placeholder="" name="lname">

            </div>
            <div class="form-group">
              <label for="exampleInputPnum1" class="text-uppercase">Phone Number</label>
              <input type="tel" class="form-control" placeholder="" name="pnum">
            </div>
            <div class="form-group">
              <label for="exampleInputadd1" class="text-uppercase">Address</label>
              <input type="text" class="form-control" placeholder="" name="add">

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-uppercase">Email</label>
              <input type="email" class="form-control" placeholder="" name="mail">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="text-uppercase">Password</label>
              <input type="password" class="form-control" placeholder="" name="pwd">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="text-uppercase">Repeat Password</label>
              <input type="password" class="form-control" placeholder="" name="pwd-repeat">
            </div>


            <div class="form-check" style="text-align: center">
              <label class="form-check-label">
                <a href="login.php">Already Have One Account?</a>
              </label>
            </div>
            <button type="submit" class="btn btn-info btn-block" value="Submit Button" name="signup-submit">Submit</button>

          </form>
        </div>
        <div class="col-md-8 banner-sec">
          <div id="carouselsignup" class="carousel-slide carousel-fade" data-ride="carousel" data-interval="4000">
            <ol class="carousel-indicators">
              <li data-target="#carouselsignup" data-slide-to="0" class="active"></li>
              <li data-target="#carouselsignup" data-slide-to="1"></li>
              <li data-target="#carouselsignup" data-slide-to="2"></li>
              <li data-target="#carouselsignup" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="https://cdn.discordapp.com/attachments/666663327153258506/678283398678052931/Untitled.png" alt="First slide" style="height: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <div class="banner-text">
                    <h2>Join us for full access on our unique collection</h2>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/product/gf2-2.jpg" alt="First slide" style="height: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <div class="banner-text">
                    <h2>This is Heaven</h2>
                    <p>“I'm selfish, impatient and a little insecure. I make mistakes, I am out of control and at times hard to handle. But if you can't handle me at my worst, then you sure as hell don't deserve me at my best.”</p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/product/gf2-4.jpg" alt="First slide" style="height: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <div class="banner-text">
                    <h2>This is Heaven</h2>
                    <p>“Be yourself; everyone else is already taken.”</p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/product/gf14-5.jpg" alt="First slide" style="height: 100%;">
                <div class="carousel-caption d-none d-md-block">
                  <div class="banner-text">
                    <h2>This is Heaven</h2>
                    <p>“Be the change that you wish to see in the world.”</p>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselsignup" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#carouselsignup" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>

          </div>
        </div>
      </div>
  </section>
  <?php include 'components/footer.php'; ?>
</body>