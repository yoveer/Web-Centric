<?php

//Adapted from https://phppot.com/php/php-restful-web-service/
require_once("HouseRestHandler.php");
$method = $_SERVER['REQUEST_METHOD'];
$view = "";

if(isset($_GET["resource"]))
	$resource = $_GET["resource"];
if(isset($_GET["page_key"]))
	$page_key = $_GET["page_key"];
/*
controls the RESTful services
URL mapping
*/


switch($resource){
	case "house":	
		switch($page_key){

			case "list":
				// to handle REST Url /house/list/
				
				//echo "list invoked from house";
				$houseRestHandler = new HouseRestHandler();
				$result = $houseRestHandler->getAllHouses();
			break;
	
			case "create":
				// to handle REST Url /house/create/
				//echo "create invoked from house";
				$houseRestHandler = new HouseRestHandler();
				$houseRestHandler->add();
			break;
		
			case "delete":
				// to handle REST Url /house/delete/<row_id>
				//echo "delete invoked from house";
				$houseRestHandler = new HouseRestHandler();
				$result = $houseRestHandler->deleteHouseById();
			break;
		
			case "update":
				//echo "update invoked from house";
				// to handle REST Url /house/update/<row_id>
				$houseRestHandler = new HouseRestHandler();
				$houseRestHandler->editHouseById();
			break;
		}
	break;	
	case "owner":	
	//Missing codes for owner handlers
	break;
}	
?>
