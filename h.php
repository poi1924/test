<?php
$access_token = 'BKaaM/SHph6Blvi1Ag4uIBab3hIOPVhQF3dsmUY47ca+9RiuGBgY0Lfs4XBEEmyo88AUWyKMUF4Lp2LpwHNINyPEBnrccRZuSiw1WNWfTLttE50JJsH4VEouiUD1WoYQtDdSw1b8sWZFY+UEuMFlUQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
