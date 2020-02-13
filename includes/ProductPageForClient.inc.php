<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
            <?php
              $sql = "SELECT * FROM Product";

              $Result = $conn->query($sql);
              while ($row = mysqli_fetch_assoc($Result)) {
                  $name = $row['Name'];
                  $photo = $row['photo'];
                  $desc = $row['Description'];
                  $price = $row['Price'];
                  $ID = $row['ProductID'];
            ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src=<?php echo $photo ?> alt="Card image cap" >
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product"><?php echo $name ?></a></h4>
                            <p class="card-text"><?php echo $desc ?></p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">Rs <?php echo $price ?></p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success btn-block">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }//end while
                ?>  
            </div>
        </div>

    </div>
</div>