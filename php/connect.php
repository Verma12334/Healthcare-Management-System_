<?php
	$servername = "localhost"; //Name of the server where database resides, ex: 127.0.0.1
	$port_no = 3306; // Port number for Windows 
	$username = "root";
	$password = "";
	$myDB= "healthtrackdb"; //Name of the database to access
	try {
		$conn = new PDO("mysql:host=$servername; port= $port_no, dbname=$myDB", $username, $password);
		// set the PDO error mode to exceptionÂ Â  
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "Connected successfully"; 
		} 
	catch(PDOException $e) {
		echo "Connection Failed" . $e->getMessage();
	}
?>