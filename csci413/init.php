<?php
function db_connect() {
	$id = 5;
	$username = 'root';
	$password = 'root';
	try {
	    $conn = new PDO('mysql:host=localhost;dbname=violdb', $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT); 
	    return $conn;   
	} catch(PDOException $e) {
	  	echo 'ERROR: ' . $e->getMessage();
	} catch(Exception $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
}
?>