<div class="main">
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
            <div class="single-product">
                <tr class="flex-column">
                <input type="hidden" name="pid" value="<?php echo $row['ProductID']; ?>" />
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td>Rs <?php echo $row['Price']; ?></td>
                <td><img src= <?php echo $row['photo']; ?> width=500px/></td>
                <td><button type='submit' name='submit1' class=''>
                            <i class=''></i>Show Details
                        </button></td>
                </tr>
            </div>
        </form>       
        <?php
            }//end while
        ?>
        </tbody>
        </table>
</div>
