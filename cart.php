<!DOCTYPE html>
<html>

<head>
    <?php include 'components/header.php'; ?>
    <link rel="stylesheet" href="styles/signup1.css">
</head>

<body>
    <?php include 'components/navigation_bar.php'; 
        require_once "includes/dbh.inc.php";
        $UID = $_SESSION['userId'];
    ?>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" ){
        $ID = $_POST['key'];
        
        $sql = "DELETE FROM Cartproduct WHERE cartID='$ID' AND UserID='$UID'";

        $result = $conn->query($sql);

        if ($result) {
            echo "<div class='alert alert-success' role='success'>";
            echo "<center>Deleted from cart successful</center>";
            echo "</div>";
            //header("Location: cart.php");
        }
        else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "</div>";
        }
        
        
    }

    ?>


    <div class="wrap">
        <div class="content-append-before">
            <div class="container">
                <div class="vc_row wpb_row shop-banner">
                    <div class="wpb_column column_container col-sm-12">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="banner-advs pull-curtain-in">
                                    <a href="#" class="adv-thumb-link">
                                        <img width="1080" height="240" src="images/cart/cartgirl.jpg" class="attachment-full size-full" sizes="(max-width:1080px) 100vw, 1080px">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-page-default">
            <div class="container">
                <div class="row">
                    <div class="content-wrap col-md-12 col-sm-12 col-xs-12">
                        <div class="entry-content">
                            <div class="title-page clearfix">
                                <h2 class="title24 font-bold text-uppercase">Shopping Cart</h2>
                            </div>
                            <div class="clearfix">
                                <div class="NML">
                                <?php
                                $total = 0;
                                $totalcost = 0;
                                $sql = "SELECT * FROM Cartproduct WHERE UserID = '$UID'";
                                $result = mysqli_query($conn,$sql);
                                $rows = mysqli_num_rows($result);

                                if($rows == 0) {
                                    
                                
                                ?>
                                    <!-- if cart is emoty -->
                                    <div class="empty-cart">
                                        <p class="cart-empty">Your cart is empty.</p>
                                        <p class="return-to-product"><a class="button wc-backward" href="Product_collections.php"> Return to products </a></p>
                                    </div>
                                <?php
                                }
                                else {
                                    
                                ?>
                                    <!-- cart contains something -->
                                    <form class="NML-cart-form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                                        <table class="shop_table shop_table_responsive cart NML-cart-form_contents" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="product-remove">&nbsp;</th>
                                                    <th class="product-thumbnail">&nbsp;</th>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-subtotal">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    $sql = "SELECT * FROM Cartproduct, Product, User WHERE Cartproduct.ProductID = Product.ProductID AND Cartproduct.UserID = User.UserID AND Cartproduct.UserID = '$UID' AND Confirmation='0'";
                                                    $Result = $conn->query($sql);
                                                    while ($row = mysqli_fetch_assoc($Result)) {

                                                ?>
                                                <tr class="NML-cart-form_cart-item cart_item">
                                                    <td class="product-remove">
                                                        <input type="image" src="images/cart/remove.png" name="remove-order" alt="Submit Form" onclick="confirm('Are you sure you want to delete this?')"/>
                                                        <input type="hidden" name="key" value='<?php echo $row['cartID'] ?>'/>
                                                    </td>
                                                    <td class="product-thumbnail">
                                                        <a href="#">
                                                            <img width="100" height="100" src=<?php echo $row['photo'] ?> class="attachment_thumbnail" sizes="(max-width:100px) 100vw, 100px">
                                                        </a>
                                                    </td>
                                                    <td class="product-name">
                                                        <?php echo $row['Name'] ?>
                                                    </td>
                                                    <td class="product-price">Rs
                                                        <?php echo $row['Price'] ?>
                                                    </td>
                                                    <td class="product-quantity">
                                                        <?php echo $row['Qty'] ?>
                                                    </td>
                                                    <td class="product-subtotal">
                                                        <?php $total = $row['Qty'] * $row['Price'];
                                                                $totalcost = $totalcost + $total;
                                                                echo $total?>
                                                    </td>

                                                </tr>
                                                <?php
                                                    }
                                                
                                                    
                                                ?>
                                            </tbody>
                                        </table>
                                    </form>
                                    <div class="cart-collaterals">
                                        <div class="cart_totals">
                                            <h2>Cart totals</h2>
                                            <table cellspacing="0" class="shop_table shop_table_responsive">
                                                <tbody>
                                                    <tr class="cart-Total">
                                                        <th>Total</th>
                                                        <td data-title="Total">
                                                            <span class="Price-amount amount">
                                                                <span class="Price-currencySymbol">Rs</span>
                                                                <?php echo $totalcost ?>
                                                            </span>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class>
                                        </div>
                                        <div class="proceed-to-checkout">
                                            <a href="Checkout.php?changedatabase=true">Proceed to checkout</a>
                                        </div>
                                    </div>

                                    <?php
                                    }
                                    
                                        
                                    ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'components/footer.php'; ?>
</body>

</html>