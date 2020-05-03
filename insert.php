<?php
session_start();
$UID = $_SESSION['userId'];
require_once "includes/dbh.inc.php";
$sql = "UPDATE Cartproduct SET Confirmation='1' WHERE Confirmation='0' AND UserID='$UID'";
$result = mysqli_query($conn, $sql);
if ($result){
    echo "good";
}else {
    echo "not good";
}
?>