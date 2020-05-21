<?php
$access_token = 'vejbuleEtaB0Q2MofsBC+KQGZEjknt8Ap1rTk3BqhEifT30ULNFMr3T6Wfs8sGgnNB/14eVsfMcuTQnXHx5uGtKNa1dlk0ffiw4fKtK75uJ8M6OGx5NPIuTUQb/QWWbAlk0nRGfP8JlrO/0kI7NM/AdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
