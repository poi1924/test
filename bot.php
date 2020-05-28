 <?php
  $LINEData = file_get_contents('php://input');
  $jsonData = json_decode($LINEData,true);
  $replyToken = $jsonData["events"][0]["replyToken"];
  $userID = $jsonData["events"][0]["source"]["userId"];
  $text = $jsonData["events"][0]["message"]["text"];
  $timestamp = $jsonData["events"][0]["timestamp"];
  $servername = "us-cdbr-east-05.cleardb.net";
  $username = "b4b3b12394a0d8";
  $password = "02d5790f";
  $dbname = "heroku_5652a807fc2262c";
  $mysql = new mysqli($servername, $username, $password, $dbname);
  mysqli_set_charset($mysql, "utf8");
  if ($mysql->connect_error){
  $errorcode = $mysql->connect_error;
  print("MySQL(Connection)> ".$errorcode);
  }
  function sendMessage($replyJson, $sendInfo){
          $ch = curl_init($sendInfo["URL"]);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLINFO_HEADER_OUT, true);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'Authorization: Bearer ' . $sendInfo["AccessToken"])
              );
          curl_setopt($ch, CURLOPT_POSTFIELDS, $replyJson);
          $result = curl_exec($ch);
          curl_close($ch);
    return $result;
  }

  $mysql->query("INSERT INTO `LOG`(`UserID`, `Text`, `Timestamp`) VALUES ('$userID','$text','$timestamp')");
  $getUser = $mysql->query("SELECT * FROM `Customer` WHERE `UserID`='$userID'");
  $getuserNum = $getUser->num_rows;
  $replyText["type"] = "text";
  if ($getuserNum == "0"){
    $replyText["text"] = "สวัสดีคับบบบ";
  } else {
    while($row = $getUser->fetch_assoc()){
      $Name = $row['Name'];
      $Surname = $row['Surname'];
      $CustomerID = $row['CustomerID'];
    }
    $replyText["text"] = "สวัสดีคุณ $Name $Surname (#$CustomerID)";
  }
  $lineData['URL'] = "https://api.line.me/v2/bot/message/reply";
  $lineData['AccessToken'] = "BKaaM/SHph6Blvi1Ag4uIBab3hIOPVhQF3dsmUY47ca+9RiuGBgY0Lfs4XBEEmyo88AUWyKMUF4Lp2LpwHNINyPEBnrccRZuSiw1WNWfTLttE50JJsH4VEouiUD1WoYQtDdSw1b8sWZFY+UEuMFlUQdB04t89/1O/w1cDnyilFU=";

  $replyJson["replyToken"] = $replyToken;
  $replyJson["messages"][0] = $replyText;

  $encodeJson = json_encode($replyJson);

  $results = sendMessage($encodeJson,$lineData);
  echo $results;
  http_response_code(200);
   ?>
