<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sz-medien";


	
$conn = new mysqli($servername, $username, $password, $dbname);
$link = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>