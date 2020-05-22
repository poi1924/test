<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'elwqZ8CUv5itHjMJkhMHN5Gl7TTSj6M6DSGSjg8m9vTELl2+Rb0ORo0qS3oFWSLZ88AUWyKMU
F4Lp2LpwHNINyPEBnrccRZuSiw1WNWfTLum2DjG+PuwxNaEnI4CHONjrPfLXdD+7CEnb0JI89OxuQdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '880be8ead3610b366e41698479a4d895';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array
echo "OK1";

function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);
echo "OK2";
    return $result;
}
if ( sizeof($request_array['events']) > 0 ) {
echo "OK3";
    foreach ($request_array['events'] as $event) {

        $reply_message = '';
        $reply_token = $event['replyToken'];

        $text = $event['message']['text'];
        $data = [
            'replyToken' => $reply_token,
            // 'messages' => [['type' => 'text', 'text' => json_encode($request_array) ]]  Debug Detail message
            'messages' => [['type' => 'text', 'text' => $text ]]
        ];
        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

        echo "Result: ".$send_result."\r\n";
        echo "OK4";
    }
}

echo "OK";
?>
