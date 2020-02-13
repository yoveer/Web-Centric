<div class="container">



<!-- eCommerce Product List - START -->
<?php
    $sql = "SELECT * FROM Product";

    $Result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($Result)) {
        $name = $row['Name'];
        $photo = $row['photo'];
        $desc = $row['Description'];
        $price = $row['Price'];
        $ID = $row['ProductID']; ?>

<div class="container">
    <div class="row">
    
        
<!--start --><div class="col-md-4" style="padding:5px;">
                    <div style="display:inline-block; border:solid 1px #808080; padding:5px">
                        <div>
                            <img class="img-responsive" src= <?php echo $photo ?> width=500px/>
                            <br/>
                            <h2 class="pull-right">Rs <?php echo $price ?></h2>
                            <h2><a href="#"><?php echo $name ?></a></h2>
                            <br/>
                            <p class="text-justify"><?php echo $desc ?></p>
                        </div>
                        <br />
                        <div class="btn-ground text-center" style="padding-bottom: 30px">
                            <button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productmodal1"><i class="fa fa-info"></i> Info</button>
                        </div>
                    </div>
                </div> <!--end -->
        
        
    </div>
</div>

<div class="modal fade" id="productmodal1" tabindex="-1" role="dialog" aria-labelledby="productmodal1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><?php echo $name ?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                    <img class="img-responsive" src= <?php echo $photo ?> width=240px/>
                    </div>
                    <div class="col-md-6 product_content">
                        <h4>ID: <span><?php echo $ID ?></span></h4>
                        <br />
                        <p class="text-justify"><?php echo $desc ?></p>
                        <br />
                        <h2 class="pull-right">Rs <?php echo $price ?></h2>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
        
    </div>
</div>
<?php
            }//end while
?>

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>


