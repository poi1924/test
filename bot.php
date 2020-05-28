<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php
$servername = "us-cdbr-east-05.cleardb.net";
$username = "b4b3b12394a0d8"";
$password = "02d5790f";
$objConnect = mysql_connect($host,$username,$password);

if($objConnect)
{
	echo "MySQL Connected";
}
else
{
	echo "MySQL Connect Failed : Error : ".mysql_error();
}

mysql_close($objConnect);
?>
</body>
</html>
