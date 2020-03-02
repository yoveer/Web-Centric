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
          <form action="includes/signup.inc.php" method="post" onsubmit="return Validate()" name="RegForm">
          <!-- Automatic HTML Form Validation -->
          <!-- If a form field (fname) is empty, the required attribute prevents this form from being submitted -->
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-uppercase">Username</label> 
              <input type="text" class="form-control" placeholder="" name="uid" required>
              <p id="p2"></p>

            </div>
            <div class="form-group">
              <label for="exampleInputfname1" class="text-uppercase">First Name</label>
              <input type="text" class="form-control" placeholder="" name="fname" required>
              <p id="p1"></p>
            </div>
            <div class="form-group">
              <label for="exampleInputlname1" class="text-uppercase">Last Name</label>
              <input type="text" class="form-control" placeholder="" name="lname" required>
              <p id="p1"></p>
            </div>
            <div class="form-group">
              <label for="exampleInputPnum1" class="text-uppercase">Phone Number</label>
              <input type="tel" class="form-control" placeholder="" name="pnum" required>
              <p id="p6"></p>
            </div>
            <div class="form-group">
              <label for="exampleInputadd1" class="text-uppercase">Address</label>
              <input type="text" class="form-control" placeholder="" name="add" required>
              <p id="p5"></p>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-uppercase">Email</label>
              <input type="email" class="form-control" placeholder="" name="mail" required>
              <p id="p3"></p>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="text-uppercase">Password</label>
              <input type="password" class="form-control" placeholder="" name="pwd" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="text-uppercase">Repeat Password</label>
              <input type="password" class="form-control" placeholder="" name="pwd-repeat" required>
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

<script> 
function Validate()                                    
{ 
    // Make quick references to our fields.
    var Username = document.forms["RegForm"]["uid"];
    var Fname = document.forms["ReForm"]["fname"];
    var Lname = document.forms["ReForm"]["lname"];  
    var phone = document.forms["RegForm"]["pnum"];     
    var address =  document.forms["RegForm"]["add"];              
    var email = document.forms["RegForm"]["mail"];  
    var password = document.forms["RegForm"]["pwd"];
    var password_rep = document.forms["RegForm"]["pwd-repeat"];

    if (Username.value != "" && Fname.value != "" && Lname.value != "" && phone.value != "" &&
        address.value != "" && email.value != "" && password.value != "" &&
        password_rep.value != "")                                  
    { 
        // Check each input in the order that it appears in the form.
        
        if (lengthDefine(Username, 6, 50)) {
        if (inputAlphabet(Fname, "* For your name please use alphabets only *")) {
        if (inputAlphabet(Lname, "* For your name please use alphabets only *")) {
        if (emailValidation(email, "* Please enter a valid email address *")) {
        if (textNumeric(phone, "* Please enter a valid Phone number *")) {
        if (textAlphanumeric(address, "* For Address please use numbers and letters *")) {
        return true;
        }
        }
        }
        }
        }
        }
        return false;
    } 
}
//This segment displays the validation rule for name text field.
function inputAlphabet(inputtext, alertMsg){
  var alphaExp = /^[a-zA-Z]+$/;
  if(inputtext.value.match(alphaExp)){
    return true;
  }else{
    document.getElementById('p1').innerText = alertMsg;
    inputtext.focus();
    return false;
  }
}

//This segment displays the validation rule for phone number field.
function textNumeric(inputtext, alertMsg){
  var numericExpression = /^[0-9]{8}$/;
  if(inputtext.value.match(numericExpression)){
    return true;
  }else{
    document.getElementById('p6').innerText = alertMsg;
    inputtext.focus();
    return false;
  }
}

//This segment displays the validation rule for address field.
function textAlphanumeric(inputtext, alertMsg){
  var alphaExp = /^[0-9a-zA-Z]+$/;
  if(inputtext.value.match(alphaExp)){
    return true;
  }else{
    document.getElementById('p5').innerText = alertMsg;
    inputtext.focus();
    return false;
  }
}

//This segment displays the validation rule for username.
function lengthDefine(inputtext, min, max){
  var uInput = inputtext.value;
  if(uInput.length >= min && uInput.length <= max){
    return true;
  }else{
    document.getElementById('p2').innerText = "* Please enter between " +min+ " and " +max+ " characters *";
    inputtext.focus();
    return false;
  }
}

//This segment displays the validation rule for E-mail.
function emailValidation(inputtext, alertMsg){
  var emailExp = /^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
  if(inputtext.value.match(emailExp)){
    return true;
  }else{
    document.getElementById('p3').innerText = alertMsg;
    inputtext.focus();
    return false;
  }
}
</script>