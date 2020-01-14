<!DOCTYPE html>
<html>

<head>
  <?php include 'components/header.php'; ?>
</head>

<body>
  <?php include 'components/navigation_bar.php'; ?>

  <section class="content">
    <div style="padding-top: 20px">
      <center>
        <h2><strong>Send Us A Message </strong></h2>
      </center>
    </div>
    <div class="container">
      <form action="includes/contact.inc.php" method="post">
        <div class="form-group">
          <label for="feedbackEmail">Email address</label>
          <input type="email" name ="email" class="form-control" id="feedbackEmail" placeholder="name@example.com">
        </div>
        <div class="form-group">
          <label for="feedbackRating">Please do rate our services</label>
          <select class="form-control" name="rate" id="feedbackRating">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="feedbackMessage">Leave your messages and/or requests here.</label>
          <textarea class="form-control" name="message" id="feedbackMessage" rows="7"></textarea>
        </div>
        <button type="submit" name="submit-contact" class="btn btn-primary">Submit</button>
      </form>
      <div style="padding-bottom: 20px"></div>
    </div>
  </section>
  <div style="padding-bottom: 201px"></div>
  <?php include 'components/footer.php'; ?>

</body>

</html>