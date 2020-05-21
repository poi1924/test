 <?php
  

function send_LINE($msg){
 $access_token = 'vejbuleEtaB0Q2MofsBC+KQGZEjknt8Ap1rTk3BqhEifT30ULNFMr3T6Wfs8sGgnNB/14eVsfMcuTQnXHx5uGtK
 Na1dlk0ffiw4fKtK75uJ8M6OGx5NPIuTUQb/QWWbAlk0nRGfP8JlrO/0kI7NM/AdB04t89/1O/w1cDnyilFU='; 

  $messages = [
        'type' => 'text',
        'text' => $msg
        //'text' => $text
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [

        'to' => 'U0a82412429e51892691ed64611ca05fa',
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);

      echo $result . "\r\n"; 
}

?>
