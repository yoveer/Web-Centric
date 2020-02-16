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
        echo $output; 
    }
?>

<!-- <tr>
    <td width="40%"><img class="card-img-top" src='.$row["ProductID"].' alt="Card image cap" ></td>
</tr> -->