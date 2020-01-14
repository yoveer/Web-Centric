
<section>
    <div class="bouton">
        <button class="btn btn-primary" onclick="display('myDIV1')">Product Display</button>
        <button class="btn btn-primary" onclick="display('myDIV2')">Add a product</button>
    </div>

     
     <div class="main" id="myDIV1" style="display:none;">
        <?php
            $sql = "SELECT * FROM Product";

            $Result = $conn->query($sql);
            ?>
            <table class="table table-dark table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Photo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>    
            <?php 
            while ($row = mysqli_fetch_assoc($Result)) { ?>
            <form name="form1" action="showdetails.php" method="post">
                
                <tr class="flex-column">
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td>Rs <?php echo $row['Price']; ?></td>
                <td><img src= <?php echo $row['photo']; ?> width=500px/></td>
                <td><button type='submit' name='submit1' class=''>
                            <i class=''></i>Show Details
                        </button></td>
                </tr>
                    
            </form>       
            <?php
                }//end while
            ?>
            </tbody>
            </table>
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