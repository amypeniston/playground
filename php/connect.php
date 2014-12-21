<?php

	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db = "playground";


	$conn = mysqli_connect($host,$user,$pass,$db);

	if (mysqli_connect_errno()) {
		echo mysqli_connect_error();
		exit();
	}
	else {
		//echo "Connected to database";
	}


?>