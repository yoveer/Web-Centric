<style>
    .popover
    {
        width:100%;
        max-width: 800px;
    }
</style>

<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>
                <a class="navbar-brand" href="/">YOYO</a>
            </div>

            <div id="navbar-cart" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            <span class="badge"></span>
                            <span class="total_price">Rs 0.00</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>  
    <div id="popover_content_wrapper" style="display:none;">
        <span id="cart_details"></span>
        <div align="right">
            <a href="#" class="btn btn-primary" id="check_out_cart">
                <span class="glyphicon glyphicon-shopping-cart"></span> Check out
            </a>
            <a href="#" class="btn btn-default" id="clear_cart">
                <span class="glyphicon glyphicon-trash"></span> Clear
            </a>
        </div>
    </div>
</div>

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
                <div class="col-12 col-md-6 col-lg-3" class="container">
                    <div class="card" style="height:550xpx;">
                        <img class="card-img-top" src=<?php echo $photo ?> alt="Card image cap" >
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $name ?></h4>
                            <p class="card-text"><?php echo $desc ?></p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">Rs <?php echo $price ?></p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success btn-block">Add to <i class="material-icons">shopping_cart</i></a>
                                    <input type="text" name="quantity" id="quantity<?php echo $ID?>" class="form-control" value="1" />
                                </div>
                                <div class="col">
                                    <input type="hidden" name="hidden_name" id="name<?php echo $ID?>" value="<?php echo $name?>" />
                                    <input type="hidden" name="hidden_price" id="price<?php echo $ID?>" value="<?php echo $price?>" />
                                    <input type="button" name="add_to_cart" id="<?php echo $ID?>" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="button" name="view" class="btn btn-info btn-block view_data" value="view" id="<?php echo $ID ?>">
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

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Product Details</h4>
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