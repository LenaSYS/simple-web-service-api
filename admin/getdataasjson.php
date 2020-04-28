<?php
include '../booking/dbconnect.php';													
$filter = "UNK";
$appdata = array();
if(isset($_GET['type'])){
		$filter = $_GET['type'];
} else if (isset($_GET['login'])){
		$filter = $_GET['login'];
}

//---------------------------------------------------------------------------------------------------------------
// Search Query!
//---------------------------------------------------------------------------------------------------------------
$stmt = $pdo->prepare("SELECT * FROM resource WHERE type=:FILTER;");
$stmt->bindParam(':FILTER',$filter);
$stmt->execute();	

foreach($stmt as $key => $row){

		$auxdata=json_decode($row['auxdata']);
		if ($auxdata === null && json_last_error() !== JSON_ERROR_NONE) {
				$auxdata=$row['auxdata'];
		}

		$array = array(
				'ID' => $row['ID'],
				'name' => $row['name'],
				'type' => $row['type'],
				'company' => $row['company'],
				'location' => $row['location'],
				'category' => $row['category'],
				'size' => (int)$row['size'],
				'cost' => (int)$row['cost'],
				'auxdata' => $auxdata
		);
		array_push ($appdata, $array);
}				
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, PUT');
header('Content-Type: application/json');
echo json_encode($appdata,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);