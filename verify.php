<?php
$access_token = 'elwqZ8CUv5itHjMJkhMHN5Gl7TTSj6M6DSGSjg8m9vTELl2+Rb0ORo0qS3oFWSLZ88AUWyKMUF4Lp2LpwHNINyPEBnrccRZuSiw1WNWfTLum2DjG+PuwxNaEnI4CHONjrPfLXdD+7CEnb0JI89OxuQdB04t89/1O/w1cDnyilFU=';

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