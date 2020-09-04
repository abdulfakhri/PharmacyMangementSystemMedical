<?php

$databaseHost = 'localhost';
$databaseName = 'ironxpxj_health';
$databaseUsername = 'ironxpxj_admin';
$databasePassword = '!@#123qweasdzxc';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

$connect = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$db = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

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
	
?>