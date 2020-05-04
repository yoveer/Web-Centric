<?php
session_start();
$UID = $_SESSION['userId'];
require_once "includes/dbh.inc.php";
$sql = "UPDATE Cartproduct, Product, User SET Confirmation='2' WHERE Cartproduct.ProductID = Product.ProductID AND Cartproduct.UserID = User.UserID AND Cartproduct.UserID = '$UID' AND Confirmation='1'";
$result = mysqli_query($conn, $sql);
?>