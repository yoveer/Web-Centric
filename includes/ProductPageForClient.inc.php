<!-- sending to cart-product table -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $PID = $_POST['pid'];
    $QTY = $_POST['quantity'];
    $UID = $_SESSION['userId'];
    $dt = date("Y-m-d");
    $week_limit = 1;
    $added_timestamp = strtotime('+' . $week_limit . ' week', time());
    $dt_limit = date('Y-m-d', $added_timestamp);

    //$sql = "SELECT * FROM Cartproduct, Product WHERE Cartproduct.ProductID=Product.ProductID AND Cartproduct.ProductID = '$PID'";

    // if Qty > quantity then set Qty to quantity


    $sql = "SELECT * FROM Cartproduct WHERE ProductID = '$PID' AND UserID = '$UID'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) !== 1) {
        $query = "INSERT INTO Cartproduct(ProductID, UserID, Date, ExpiryDate, Qty, Confirmation)
                        VALUES ('$PID','$UID','$dt','$dt_limit','$QTY', '0')";
        $result = mysqli_query($conn, $query);
    } else {

        $query = "UPDATE Cartproduct SET Qty = Qty + '$QTY' WHERE ProductID = '$PID'";
        $result = mysqli_query($conn, $query);
    }



    $result = $conn->query($sql);

    if ($result) {
        echo "<div class='alert alert-success' role='success'>";
        echo "<center>Added to cart successfully</center>";
        echo "</div>";
        include "xml/querytoXML.php";
        $query = "UPDATE Product SET Counter = Counter + '1' WHERE ProductID = '$PID'";
        $result = mysqli_query($conn, $query);
        // header("Location: cart.php"); if you want to go to cart
    } else {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "</div>";
    }
}

include "xml/querytoXML.php";
?>
<!-- PRODUCTS-->

<div class="container-fluid pt-3">
    <div class="row">
        <br>
        <div class="col-lg-9">
            <div class="row">
                <?php
                $sql = "SELECT * FROM Product WHERE flag='0' OR flag='1'";

                $Result = $conn->query($sql);
                // $count = 0;
                while ($row = mysqli_fetch_assoc($Result)) {
                    $name = $row['Name'];
                    $photo = $row['photo'];
                    $desc = $row['Description'];
                    $price = $row['Price'];
                    $ID = $row['ProductID'];
                ?>

                    <div class="col-12 col-md-4 col-lg-3 shoeCard" class="container-fluid">
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                            <div class="card" style="height:550xpx;">
                                <img class="card-img-top" src=<?php echo $photo ?> alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $name ?></h4>
                                    <p class="card-text"></p>
                                    <abbr style="text-decoration: none;" title="<?php echo $desc ?>">
                                        <?php echo substr($desc, 0, 30)  ?> ...
                                    </abbr>
                                    <div class="row">
                                        <div class="col">
                                            <p class="btn btn-danger btn-block">Rs <?php echo $price ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="button" name="view" class="btn btn-info btn-block view_data" value="view" id="<?php echo $ID ?>">
                                            <br />
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['userId'])) { ?>
                                        <div class="row">
                                            <div class="col">
                                                <input type="number" class="product-quantity form-control inputqty" name="quantity" value="1" min=1 max=6 />
                                            </div>
                                            <div class="col">
                                                <!-- <button type="submit" name="cart-submit" class="btn btn-success btn-block" onclick="confirm('Are you sure you want to add this to cart?')">Add to <i class="material-icons" style="vertical-align: middle;">shopping_cart</i></button> -->
                                                <button type="submit" name="cart-submit" class="btn btn-success btn-block">Add to <i class="material-icons" style="vertical-align: middle;">shopping_cart</i></button>
                                                <input type="hidden" name="pid" value="<?php echo $ID ?>" />
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>

                <?php
                    // $count = $count + 1;
                    // if($count%4 == 0)
                    //     echo "<br><br><br>";
                } //end while
                ?>
            </div>
        </div>
        <div class="col-md-auto col-lg-3 container Cart">
            <?php
            echo "<button class = \" btn btn-warning btn-lg text-center btn-block active btnCart\" type=\"button\" onclick=\"loadXMLDoc()\">Refresh Cart</button>";
            echo "<br><br>";
            echo "<div class=\"CartWrapper position-sticky sticky-top\">";
            echo "<div id=\"demo1\"></div>";
            echo "<table class=\"table table-bordered table-hover\" id=\"demo\"></table>";
            echo "</div>";
            ?>
        </div>

    </div>
</div>

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Product Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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
    $(document).ready(function() {
        console.log(1234);
        loadXMLDoc();
        $('.view_data').click(function() {          //jquery
            var product_id = $(this).attr("id");

            $.ajax({                                //ajax
                url: "showdetails.php",
                method: "post",
                data: {
                    product_id: product_id
                },
                success: function(data) {
                    $('#product_detail').html(data);
                    $('dataModal').modal("show");
                }
            });
            $('#dataModal').modal("show");
        });
    });

    function loadXMLDoc() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                myFunction(this);
            }
            // myfunction(this);
        };
        xmlhttp.open("GET", "/Web-Centric/xml/test.xml", true);
        xmlhttp.send();
    }

    function myFunction(xml) {
        var i;
        var xmlDoc = xml.responseXML;
        var y = xmlDoc.getElementsByTagName("User")[0].getAttribute("Name");
        y = "<h2>User: " + y + "</h2>";
        document.getElementById("demo1").innerHTML = y;
        var x = xmlDoc.getElementsByTagName("Product");
        var table = "<thead class=\"thead-dark\"><tr><th>Shoe Name</th><th>Price</th><th>Quantity</th><th>Photo</th></tr></thead";
        for (i = 0; i < x.length; i++) {
            table += "<tr><td>" +
                x[i].getElementsByTagName("shoe_name")[0].childNodes[0].nodeValue +
                "</td><td>" +
                x[i].getElementsByTagName("price")[0].childNodes[0].nodeValue +
                "</td><td>" +
                x[i].getElementsByTagName("Quantity")[0].childNodes[0].nodeValue +
                "</td><td>" + "<img width = \"80px\" height = \"80px\" class=\"\" src=/Web-Centric/" +
                x[i].getElementsByTagName("shoe_photo")[0].childNodes[0].nodeValue +
                " alt=\"Cart image\">" + "</td></tr>";
        }
        document.getElementById("demo").innerHTML = table;
    }
</script>