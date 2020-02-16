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
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="button" name="view" class="btn btn-info btn-block view_data" value="view" id="<?php echo $ID ?>">
                                    <br>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-success btn-block">Add to <i class="material-icons">shopping_cart</i></a>  
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