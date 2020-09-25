<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class House {
	private $houses = array();
	public function getAllHouse(){
		if(isset($_GET['address'])){
			$address = $_GET['address'];
			$query = 'SELECT * FROM house WHERE address LIKE "%' .$address. '%"';
		} else {
			$query = 'SELECT * FROM house';
		}
		$dbcontroller = new DBController();
		$this->houses = $dbcontroller->executeSelectQuery($query);
		return $this->houses;
	}

	public function addHouse(){
		if(isset($_POST['address'])){
			$address = $_POST['address'];
			$list_price = 0.0;
			$swimming_pool = 0;
			$house_url = "";
			$owner_id = 0;
			
			if(isset($_POST['list_price'])){
				$list_price = $_POST['list_price'];
			}
			if(isset($_POST['swimming_pool'])){
				$swimming_pool = $_POST['swimming_pool'];
			}
			if(isset($_POST['house_url'])){
				$house_url = $_POST['house_url'];
			}
			if(isset($_POST['owner_id'])){
				$owner_id = $_POST['owner_id'];
			}	
			
			$query = "INSERT INTO house (address,list_price,swimming_pool, house_url, owner_id) values (?,?,?,?,? )";
			$data = [$address, $list_price , $swimming_pool, $house_url , $owner_id];
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query, $data );
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	public function deleteHouse(){
		if(isset($_GET['id'])){
			$house_id = $_GET['id'];
			$query = 'DELETE FROM house WHERE house_id = ?';
			$data = [$house_id];
			$dbcontroller = new DBController();
			$result = $dbcontroller->executeQuery($query, $data);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
	}
	
	public function editHouse(){
		if(isset($_POST['address']) && isset($_GET['id'])){
			$address = $_POST['address'];
			$list_price = $_POST['list_price'];
			$swimming_pool = $_POST['swimming_pool'];
			$house_url = $_POST['house_url'];
			$house_id = $_GET['id'];
			$query = "UPDATE house SET address = ?, list_price = ? , swimming_pool = ? , house_url= ? WHERE house_id = ? ";
			$data = [$address, $list_price , $swimming_pool, $house_url ,$house_id ];
			$dbcontroller = new DBController();
			$result= $dbcontroller->executeQuery($query, $data);
			if($result != 0){
				$result = array('success'=>1);
				return $result;
			}
		}
		
	}
	
}
?>