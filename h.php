<?php
    // รับค่า POST Request จาก LINE
	$LINEData = file_get_contents('php://input');
    //ทำการเรียก func json_decode ตัวข้อมูลที่ได้มาเนื่องจากมีรูปเเบบเป็น JSON ** อย่าลืมใส่ true ด้วยเพื่อให้ข้อมูลออกมาในรูปเเบบของ Array Object
	$jsonData = json_decode($LINEData,true);
