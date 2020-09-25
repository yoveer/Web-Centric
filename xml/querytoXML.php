<?php
require_once "includes/dbh.inc.php";

$sQuery = "SELECT ProductID, Qty FROM Cartproduct WHERE UserID = '".$_SESSION['userId']."'";
$nameQuery = "SELECT CONCAT( Firstname, \" \", Lastname ) AS Fullname FROM User WHERE UserID = '".$_SESSION['userId']."'";

$result = $conn->query($sQuery);
$resultname = $conn->query($nameQuery);

$dom = new DOMDocument('1.0');

// add root node
$root = $dom->createElement('User');

$rowname = $resultname->fetch_array();
$user_name = $rowname['Fullname'];
$root->setAttribute("Name", $user_name);

$Shoes = $dom->createElement('Shoes');

while ($row = $result->fetch_array()) {
	$Shoes_node = $dom->createElement('Product');
	$shoe_id = $row['ProductID'];
	$Shoes_node->setAttribute("ProductID", $shoe_id);

	$prodQuery = "SELECT Name, Price, photo FROM Product WHERE ProductID = '" . $shoe_id . "'";
	$resultproduct = $conn->query($prodQuery);
	$row1 = $resultproduct->fetch_array();

	$shoe_name = $row1['Name'];
	$shoe_name_node = $dom->createElement('shoe_name', $shoe_name);
	$Shoes_node->appendChild($shoe_name_node);

	$shoe_price = $row1['Price'];
	$shoe_price_node = $dom->createElement('price', $shoe_price);
	$Shoes_node->appendChild($shoe_price_node);

	$qty = $row['Qty'];
	$qty = $dom->createElement('Quantity', $qty);
	$Shoes_node->appendChild($qty);

	$shoe_photo = $row1['photo'];
	$shoe_photo_node = $dom->createElement('shoe_photo', $shoe_photo);
	$Shoes_node->appendChild($shoe_photo_node);

	$Shoes->appendChild($Shoes_node);
} //end while

$root->appendChild($Shoes);
$dom->appendChild($root);

if (!$dom->schemaValidate('xml/validator.xsd')) {
	print 'Error: XML is not well formed!!';
} else {
	$dom->formatOutput = true;
	$dom->save('xml/test.xml');
}

