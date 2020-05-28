<?php
$temp = $_GET['temp'];

$servername = "us-cdbr-east-05.cleardb.net";
$username = "b4b3b12394a0d8"";
$password = "02d5790f";
$dbname = "heroku_5652a807fc2262c";

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$val = $_GET['temp'];
$sql = "INSERT INTO esp8266(temp) VALUES ($val);";

if ($conn->query($sql) === TRUE) {
    echo "save OK";
} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
