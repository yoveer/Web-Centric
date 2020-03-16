<!DOCTYPE html>
<html>

<head>
  <?php include 'components/header.php'; ?>
</head>

<body>
  <?php include 'components/navigation_bar.php'; ?>

  <section class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-auto">
        <div style="padding-top: 20px">
          <center>
            <h2><strong> <i class="fas fa-envelope"></i> Send Us A Message <i class="fas fa-envelope"></i> </strong></h2>
          </center>
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
          <button type="submit" name="submit-contact" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-md-auto">

        <div style="padding-top: 20px">
          <center>
            <h2><strong> <i class="fas fa-envelope-open"></i>Directly send us an Email? <i class="fas fa-envelope-open"></i> </strong></h2>
          </center>
        </div>

        <form action="mailto:nmltd@gmail.com" method="post" enctype="text/plain">
          <div class="text-center">
            <button type="submit" name="Sending Mail" class="btn btn-primary">Click Here!</button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <?php include 'components/footer.php'; ?>

</body>

</html>