<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="styles/share.css">
  <?php include 'components/header.php'; ?>
</head>

<body>
  <?php include 'components/navigation_bar.php'; ?>

  <section class="container">
    <section id="" data-text-list="[]" data-scroll-target="#" class="first-fold align-center pattern-gradient-light">
      <div class="container  banner-content l-banner " data-scroll-target="">

        <center>
          <h1>We’d love to hear from you</h1>
          <p class="sub-text">Whether you have a question about features, pricing, or anything else, our team is ready to answer all your questions</p>
        </center>

      </div>
    </section>

    <div class="row justify-content-md-center">
      <div class="col-md-auto">
        <div style="padding-top: 20px">
          <center>
            <h2><strong> <i class="fas fa-envelope"></i> Send Us A Message <i class="fas fa-envelope"></i> </strong></h2>
          </center>
          <?php

          if (@$_GET['contact'] == 'success'){
            echo "<div class='alert alert-success' role='success'>";
            echo "<center>You have successfully sent your feedback <i class='fa fa-heart'></i></center>";
            echo "</div>";
          }

          if (!empty($_SESSION['message'])) {
            echo "<div class='alert alert-danger' role='alert'>";
            echo $_SESSION['message'];
            echo "</div>";
            unset($_SESSION['message']);
          }
          ?>
        </div>

        <form action="includes/contact.inc.php" method="post">
          <div class="form-group">
            <label for="feedbackEmail"> <i class="fas fa-user-edit"></i> Email Address</label>
            <input type="email" name="email" class="form-control" id="feedbackEmail" placeholder="wizard@hogwarts.com">
          </div>
          <div class="form-group">
            <label for="feedbackRating"> <i class="fas fa-check-double"></i> Please do rate our services</label>
            <select class="form-control" name="rate" id="feedbackRating">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="form-group">
            <label for="feedbackMessage"> <i class="fas fa-comment-alt"></i> Leave your messages and/or requests here.</label>
            <textarea class="form-control" name="message" id="feedbackMessage" placeholder="Type your messages here" rows="7"></textarea>
          </div>
          <center>
            <button type="submit" name="submit-contact" class="btn btn-primary">Submit</button>
          </center>
        </form>
      </div>
      <div class="col-md-auto">

        <div style="padding-top: 20px">
          <center>
            <h2><strong> <i class="fas fa-envelope-open"></i>Directly send us an Email? <i class="fas fa-envelope-open"></i> </strong></h2>
          </center>
        </div>

        <div>
          <center>
            <img src="gif/mail-gif-10.gif" alt="Sending mail gif" width="400" height="386">
          </center>
        </div>

        <div class="text-center" style="padding-top: 14px">
          <button class="btn btn-primary" onclick="window.location.href = 'mailto:query@nmltd.com?subject=Query to NML&body=Hello Madam%2c%0D%0A%0D%0A I\'m writing this e-mail for queries pertaining to your company as follows: %0D%0A1)';">Click Here</button>
        </div>
      </div>
    </div>
  </section>

  <div style="padding-bottom: 40px"></div>

  <section class="content">
    <ul id="services">
      <h3><u>Connect with us on Social media</h3></u>
      <li>
        <div class="facebook">
          <a href="https://facebook.com" class="flex flex-column items-center justify-center color-inherit w-100 pa2 br2 br--top no-underline hover-bg-blue4 hover-white">
            <i class="fab fa-facebook" style="font-size: 48px;  color:blue;"></i>
          </a>
        </div>
        <span style="color:blue">Facebook</span>
      </li>
      <li>
        <div class="twitter">
          <a href="https://twitter.com" class="flex flex-column items-center justify-center color-inherit w-100 pa2 br2 br--top no-underline hover-bg-blue4 hover-white">
            <i class="fab fa-twitter-square" style="font-size: 48px; color:#1da1f2;"></i>
          </a>
        </div>
        <span style="color:#1da1f2;">Twitter</span>
      </li>
      <li>
        <div class="youtube">
          <a href="https://youtube.com" class="flex flex-column items-center justify-center color-inherit w-100 pa2 br2 br--top no-underline hover-bg-blue4 hover-white">
            <i class="fab fa-youtube-square" style="font-size: 48px; color:red;"></i>
          </a>
        </div>
        <span style="color:red;">YouTube</span>
      </li>
      <li>
        <div class="linkedin">
          <a href="https://linkedin.com" class="flex flex-column items-center justify-center color-inherit w-100 pa2 br2 br--top no-underline hover-bg-blue4 hover-white">
            <i class="fab fa-linkedin" style="font-size: 48px; color:#62A3DA;"></i>
          </a>
        </div>
        <span style="color:#62A3DA;">LinkedIn</span>
      </li>
      <li>
        <div class="instagram">
          <a href="https://instagram.com" class="flex flex-column items-center justify-center color-inherit w-100 pa2 br2 br--top no-underline hover-bg-blue4 hover-white">
            <i class="fab fa-instagram" style="font-size: 48px; color:black;"></i>
          </a>
        </div>
        <span style="color:black;">Instagram</span>
      </li>
      <li>
        <a class="twitter-timeline" data-lang="en" data-width="220" data-height="150" data-theme="dark" href="https://twitter.com/jeremie_daniel?ref_src=twsrc%5Etfw">Tweets by jeremie_daniel</a>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </li>
    </ul>
  </section>

  <?php include 'components/footer.php'; ?>

</body>

</html>