<?php

$servername = "localhost";
$dBUsername = "jeremie";
$dBPassword = "1234";
$dBName = "NML";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}

 ?>