<html>
<head>
<meta http-equiv="refresh" content="3">
</head> 
<body>
<?php
  $servername = "us-cdbr-east-05.cleardb.net";
  $username = "b4b3b12394a0d8";
  $password = "02d5790f";
  $dbname = "heroku_5652a807fc2262c";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM esp8266 ORDER by id DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table border='1'><th>ID</th><th>TEMP</th><th>DATETIME</th>";
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['temp']."</td>";
		echo "<td>".$row['day']."</td>";
		echo "</tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
