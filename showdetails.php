<?php
    require_once "includes/dbh.inc.php";
    if(isset($_POST["product_id"])){
        $output = '';
        $query = "SELECT * FROM Product WHERE ProductID = '" . $_POST["product_id"]."'";
        $result = mysqli_query($conn,$query);
        $output .='
        <div class="table-responsive">
            <table class="table table-bordered">';
        while($row=mysqli_fetch_array($result)) {
            ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php echo '<img src=" '.$row["photo"].' " width="220" height="220" alt="my image" />' ?>
        </div>
        <?php
            $output .='
                <tr>
                    <td width="20%"><lable>Product ID</label></td>
                    <td width="80%"><lable>'.$row["ProductID"].'</label></td>
                </tr>
                <tr>
                    <td width="20%"><lable>Product Name</label></td>
                    <td width="80%"><lable>'.$row["Name"].'</label></td>
                </tr>
                <tr>
                    <td width="20%"><lable>Product Description</label></td>
                    <td width="80%"><lable>'.$row["Description"].'</label></td>
                </tr>
                <tr>
                    <td width="20%"><lable>Product Price</label></td>
                    <td width="80%"><lable>Rs'.$row["Price"].'</label></td>
                </tr>
                    
                ';
                
        }  
        $output .="</table></div>";
        ?>
        
        <div class="col-md-6">
            <?php echo $output;?>
        </div>
    </div>
</div> 
<?php
    }
?>