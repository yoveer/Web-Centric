<!DOCTYPE html>
<html>
    <head>
        <?php include 'components/header.php';?> 
        <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
	</head>	

	<body>
        <?php include 'components/navigation_bar.php';
              require_once "includes/dbh.inc.php";?>
                <?php
                    $UID = $_SESSION['userId'];
                    $total = 0;
                    $totalcost = 0;
                    $date = date("Y-m-d");
                ?>
       
            <!-- DISPLAY CHECKOUT -->
            <div class="container" id="content" style="border:1px solid black;">
                <div class="card">
                    <div class="card-header">
                        Date: 
                    <strong><?php echo $date?></strong> 
                    <span class="float-right"> Payment Receipt</span>

                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h6 class="mb-3">From:</h6>
                                <div>
                                    <strong>NML</strong>
                                </div>
                                <div>Parla-Parla dan ti coin la, welkom dan moriss</div>
                                <div>Email: Info@nmltd.com</div>
                                <div>Phone: +230 5999 7777</div>
                            </div>

                            <div class="col-sm-6">
                                <h6 class="mb-3">To:</h6>
                                <?php 
                                    $query = mysqli_query($conn,"SELECT * FROM User WHERE UserID = '$UID'");
                                    if($query === false) {
                                      echo "error while executing mysql: " . mysqli_error($conn);
                                     }
                                     else{
                                      $row = mysqli_fetch_row($query);
                                      $fname = $row[2];
                                      $lname = $row[3];
                                      $pnum = $row[4];
                                      $add = $row[5];
                                      $email = $row[6];
                                     }
                                ?>
                                <div>
                                    <strong><?php echo $UID ?></strong>
                                </div>
                                <div>Name: <?php echo $fname.' '.$lname ?></div>
                                <div><?php echo $add ?></div>
                                <div>Email: <?php echo $email ?></div>
                                <div>Phone: <?php echo $pnum ?></div>
                            </div>



                        </div>

                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Item</th>
                                        <th>Description</th>

                                        <th class="right">Unit Cost</th>
                                        <th class="center">Qty</th>
                                        <th class="right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $counter = 1;
                                    $sql = "SELECT * FROM Cartproduct, Product, User WHERE Cartproduct.ProductID = Product.ProductID AND Cartproduct.UserID = User.UserID AND Cartproduct.UserID = '$UID'";
                                    $Result = $conn->query($sql);
                                    while ($row = mysqli_fetch_assoc($Result)) {
                                        $name = $row['Name'];  // json_encode($row)
                                        $desc = $row['Description'];
                                        $price = $row['Price'];
                                        $qty = $row['Qty'];
                                ?>
                                    
                                        <tr>
                                            <td class="center"><?php echo $counter ?></td>
                                            <td class="left strong"><?php echo $name ?></td>
                                            <td class="left"><abbr style = "text-decoration: none;" title="<?php echo $desc ?>">
                                                                <?php echo substr($desc, 0, 20)  ?> ...
                                                            </abbr>
                                            </td>

                                            <td class="right">Rs<?php echo $price ?></td>
                                            <td class="center"><?php echo $qty ?></td>
                                            <td class="right">Rs<?php $total = $row['Qty'] * $row['Price'];
                                                                        $totalcost = $totalcost + $total;
                                                                        echo $total
                                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <!-- <tr>
                                        <td class="center">2</td>
                                        <td class="left">Custom Services</td>
                                        <td class="left">Instalation and Customization (cost per hour)</td>

                                        <td class="right">$150,00</td>
                                        <td class="center">20</td>
                                        <td class="right">$3.000,00</td>
                                    </tr>
                                    <tr>
                                        <td class="center">3</td>
                                        <td class="left">Hosting</td>
                                        <td class="left">1 year subcription</td>

                                        <td class="right">$499,00</td>
                                        <td class="center">1</td>
                                        <td class="right">$499,00</td>
                                    </tr>
                                    <tr>
                                        <td class="center">4</td>
                                        <td class="left">Platinum Support</td>
                                        <td class="left">1 year subcription 24/7</td>

                                        <td class="right">$3.999,00</td>
                                        <td class="center">1</td>
                                        <td class="right">$3.999,00</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-5">

                                </div>

                                    <div class="col-lg-4 col-sm-5 ml-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Subtotal</strong>
                                                    </td>
                                                    <td class="right">Rs<?php echo $totalcost ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td class="right">
                                                        <strong>Rs<?php echo $totalcost ?></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="editor"></div>
                    <center>
                        <button id="cmd">Print Receipt</button>
                    </center>
                    

                    <script>
                        var doc = new jsPDF();
                        var elementHTML = $('#content').html();
                        var specialElementHandlers = {
                            '#editor': function (element, renderer) {
                                return true;
                            }
                        };
                        

                        $('#cmd').click(function () {   
                            doc.fromHTML(elementHTML, 15, 15, {
                                'width': 170,
                                'elementHandlers': specialElementHandlers
                            });
                            doc.save('Payment_Receipt.pdf');
                        });
                    </script>
        
        <?php include 'components/footer.php';?>
    </body>
</html>

<!--  id="addToDatabase" -->
<!--     <script>
        $(document).ready(function(){
            $("#addToDatabase").click(function(){
                $.ajax({
                    url:'insert.php',
                    method:'POST',
                   success:function(){
                       alert("done");
                   }
                });
            });
        });
    </script>
 -->