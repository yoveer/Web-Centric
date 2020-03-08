<?php
  require_once "includes/dbh.inc.php";
?>
<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h5 class="text-white h4">Collapsed content</h5>
      <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>
  </div>
  <nav class="navbar navbar navbar-light bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <h2 style="color: white">Categories</h2>
        <?php 
          $sql = "SELECT DISTINCT Category FROM Product";
          $Result = $conn->query($sql);
          while ($row = mysqli_fetch_assoc($Result)) {
            $cat = $row['Category'];
        ?>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: white"><?php echo $cat ?><span class="sr-only">(current)</span></a>
        </li>
        <?php 
          }
        ?>
      </ul>
    </div>
  </nav>
</div>