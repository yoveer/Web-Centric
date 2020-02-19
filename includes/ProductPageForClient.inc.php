<!-- sending to cart-product table -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" ){
        $PID = $_POST['pid'];
        $QTY = $_POST['quantity'];
        $UID = $_SESSION['userId'];
        $dt = date("Y-m-d");
        $week_limit = 1;
        $added_timestamp = strtotime('+'.$week_limit.' week', time());
        $dt_limit = date('Y-m-d', $added_timestamp);

        //$sql = "SELECT * FROM Cartproduct, Product WHERE Cartproduct.ProductID=Product.ProductID AND Cartproduct.ProductID = '$PID'";
        
        // if Qty > quantity then set Qty to quantity

        
        $sql = "SELECT * FROM Cartproduct WHERE ProductID = '$PID'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) !== 1){
            $query = "INSERT INTO Cartproduct(ProductID, UserID, Date, ExpiryDate, Qty, Confirmation)
                        VALUES ('$PID','$UID','$dt','$dt_limit','$QTY', '0')";
            $result = mysqli_query($conn, $query);
        }
        else{
            
                $query = "UPDATE Cartproduct SET Qty = Qty + '$QTY' WHERE ProductID = '$PID'";
                $result = mysqli_query($conn, $query);
            
        }
                    
        
                    
        
                        
                 
                

        

        $result = $conn->query($sql);

        if ($result) {
            echo "Added to cart successfully";
            // header("Location: cart.php"); if you want to go to cart
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    }

?>
<!-- PRODUCTS-->

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
            
            <div class="col-12 col-md-6 col-lg-3" class="container-fluid">
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" >
                    <div class="card" style="height:550xpx;">
                        <img class="card-img-top" src=<?php echo $photo ?> alt="Card image cap" >
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $name ?></h4>
                            <p class="card-text"><?php echo $desc ?></p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">Rs <?php echo $price ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="button" name="view" class="btn btn-info btn-block view_data" value="view" id="<?php echo $ID ?>">
                                    <br/>
                                </div>
                            </div>  
                            <?php
                            if (isset($_SESSION['userId'])) {?>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="product-quantity" name="quantity" value="1" size="21" />
                                    </div>
                                    <div class="col">
                                        <button type="submit" name="cart-submit" class="btn btn-success btn-block">Add to <i class="material-icons" style="vertical-align: middle;">shopping_cart</i></button>
                                        <input type="hidden" name="pid" value="<?php echo $ID ?>" />
                                    </div>
                                </div>
                            <?php
                            }
					        ?>
                            <!-- <input type="submit" value="Add to Cart" name="cart-submit" class="btn btn-success btn-block"/> -->
                            <!-- <button type="submit" name="cart-submit" class="btn btn-success btn-block">Add to <i class="material-icons" style="vertical-align: middle;">shopping_cart</i></button> -->
                        </div>
                    </div>
                </form>
            </div>
                
                <?php
                 }//end while
                ?>  
            </div>
        </div>

    </div>
</div>

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Product Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="product_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>






<script>
$(document).ready(function(){
    $('.view_data').click(function(){
        var product_id = $(this).attr("id");

        $.ajax({
            url:"showdetails.php",
            method:"post",
            data:{product_id:product_id},
            success:function(data){
                $('#product_detail').html(data);
                $('dataModal').modal("show");
            }
        });
        $('#dataModal').modal("show");
    });
});
</script>