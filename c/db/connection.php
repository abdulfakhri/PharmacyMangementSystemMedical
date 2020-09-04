<?php

$databaseHost = 'localhost';
$databaseName = 'ironxpxj_health';
$databaseUsername = 'ironxpxj_admin';
$databasePassword = '!@#123qweasdzxc';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

if($mysqli->connect_error){
    die("Connection failed:" . $mysqli->connect_error);
}

$connect = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if($connect->connect_error){
    die("Connection failed:" . $connect->connect_error);
}
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if($con->connect_error){
    die("Connection failed:" . $con->connect_error);
}
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}
$db = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if($db->connect_error){
    die("Connection failed:" . $db->connect_error);
}
/*
$connect = new PDO("mysql:host=localhost; dbname=ironxpxj_health", "ironxpxj_admin", "!@#123qweasdzxc");

//$mysqli = new PDO("mysql:host=localhost; dbname=ironxpxj_health", "ironxpxj_admin", "!@#123qweasdzxc");

$con = new PDO("mysql:host=localhost; dbname=ironxpxj_health", "ironxpxj_admin", "!@#123qweasdzxc");

$conn = new PDO("mysql:host=localhost; dbname=ironxpxj_health", "ironxpxj_admin", "!@#123qweasdzxc");

$db = new PDO("mysql:host=localhost; dbname=ironxpxj_health", "ironxpxj_admin", "!@#123qweasdzxc");

// Database configuration

$dbHost = "localhost";
$dbUsername = "ironxpxj_admin";
$dbPassword = "!@#123qweasdzxc";
$dbName = "ironxpxj_health";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
	*/
	
	class Database {
	private $host = "localhost";
	private $user = "ironxpxj_admin";
	private $password = "!@#123qweasdzxc";
	private $database = "ironxpxj_health";
	
	function runQuery($sql) {
		$conn = new mysqli($this->host,$this->user,$this->password,$this->database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $resultset[] = $row;
      }
    }
    $conn->close();
		if(!empty($resultset))
			return $resultset;
	}
}
?>