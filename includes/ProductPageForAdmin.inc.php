
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
            <form name="form1" action="includes/addproduct.php" method="post" enctype="multipart/form-data">
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
                        <option value="shoes">shoes</option>
                        <option value="slippers">slippers</option>
                        <option value="sandals">sandals</option>
                        <option value="ballerina">ballerina</option>
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