<?php 

$gender = $_POST["gender"];

if ($gender!='gender') {

$mysqli = new mysqli("localhost","root","root","playground");

//USE PARAMETERIZATION TO AVOID SQL INJECTIONS
$stmt = $mysqli->prepare("SELECT * FROM test WHERE gender = ?");
$stmt->bind_param('s',$gender);
$stmt->execute();
$stmt->bind_result($id,$nameData,$genderData);

$someArray = [];

	while ($stmt->fetch()) {
		array_push($someArray, [
	      'name'   => $nameData,
	      'gender' => $genderData
	    ]);
	}
    
    $stmt->close(); 
    $mysqli->close(); 

    $someJSON = json_encode($someArray);
	echo $someJSON;

}


?>