<?php
    if(isset($_POST["submit-prod"])){
        $target_dir = "images/product/";
        $name = $target_dir.$_FILES['pi']['name'];
        $dst='/var/www/html/Web-Centric/images/product/';
        $target_file = $target_dir . basename($_FILES["pi"]["name"]);

                // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");


        $prodid = $_POST['pid'];
        $prodname = $_POST['pn'];
        $proddesc = $_POST['pd'];
        $prodprice = $_POST['pp'];
        $prodquan = $_POST['pq'];
        $prodcat = $_POST['pc'];
        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
        
            // Insert record
            $sql="INSERT INTO Product(ProductID, Name, Description, Price, Quantity, Category, photo) 
                    VALUES ('$prodid', '$prodname', '$proddesc', '$prodprice', '$prodquan', '$prodcat', '$name')";
            $result = $conn->query($sql);

            if ($result) {
                echo "Added product successfully";
                // Upload file
                move_uploaded_file($_FILES['pi']['tmp_name'],$dst.$_FILES['pi']['name']);
                // header("Location: ../Product_collections.php?addprod=success");
                // exit();
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            

        }

        
    }
    
?>

<section>
    <div class="bouton">
        <button class="btn btn-primary" onclick="display('myDIV1')">Product Display</button>
        <button class="btn btn-primary" onclick="display('myDIV2')">Add a product</button>
    </div>

     
    <div class="main" id="myDIV1" style="display:none;">
        <?php
            include 'ProductPageForClient.inc.php';
        ?>
    </div>
    <div class="main" id="myDIV2" style="display:none;">
        <h2>Add Product</h2>
        <div class="block">
            <form name="form1" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
                <table>
                <tr>
                <td>Product ID</td>
                <td><input type="text" name="pid" required></td>
                </tr>
                <tr>
                <td>Product Name</td>
                <td><input type="text" name="pn" required></td>
                </tr> 
                <tr>
                <td>Product Description</td>
                <td><textarea cols="21" rows="5" name="pd" required></textarea></td>
                </tr> 
                <tr>
                <td>Product Price</td>
                <td><input type="number" name="pp" required></td>
                </tr> 
                <tr>
                <td>Product Quantity</td>
                <td><input type="number" name="pq" required></td>
                </tr> 
                <td>Product Category</td>
                <td>
                    <select name="pc" required>
                        <option value="" disabled selected>Choose your category</option>
                        <?php 
                        $sql = "SELECT DISTINCT Category FROM Product";
                        $Result = $conn->query($sql);
                        while ($row = mysqli_fetch_assoc($Result)) {
                            $cat = $row['Category'];
                        ?>
                            <option value=<?php echo $cat ?>><?php echo $cat ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
                </tr> 
                <td>Product Image</td>
                <td><input type="file" name="pi"></td>
                </tr>   
                </tr> 
                <td></td>
                <td><input type="submit" name="submit-prod" value="Add this product"></td>
                </tr> 
                </table>
            </form>
            
        </div>
    </div>    
    <script>
        function display(section) {
            var all = document.getElementsByClassName("main");
            for (var i = 0; i < all.length; i++){
                all[i].style.display = 'none';
            }
            document.getElementById(section).style.display = 'block';
        }
        
    </script>
</section>