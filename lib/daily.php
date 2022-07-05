<?php
// کرون جاب هر دقیقه یک بار فعال شود
include '../bot.php'; // سازگار با سورس های خودم
//=======================================================
$send = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `sendall` LIMIT 1"));
$daily = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `daily` LIMIT 1"));
//======================// send //=======================

//======================// forward //=======================
if($send['step'] == 'forward'){
$alluser = mysqli_num_rows(mysqli_query($connect,"select id from `user`"));
$users = mysqli_query($connect,"SELECT id FROM `user` LIMIT 100 OFFSET {$send['user']}");
while($row = mysqli_fetch_assoc($users))
bot('ForwardMessage',[
'chat_id'=>$row['id'],   
'from_chat_id'=>$send['chat'],
'message_id'=>$send['text'],
]);	
$connect->query("UPDATE `sendall` SET `user` = `user` + 100 LIMIT 1");
if($send['user'] + 100 >= $alluser){
  bot('sendmessage',[
      'chat_id'=>$admin[0],
      'text'=>"📍 پیام برای همه کابران فوروارد شد",
 ]);
$connect->query("UPDATE `sendall` SET `step` = 'none' , `text` = '' , `user` = '0' , `chat` = '' LIMIT 1");		
}
}
//#<<<<<<<Developer>>>>>>>#//
//#https://github.com/Antrax-QG
//#telegram: @navidshams 
//======================// daily user //=======================
?> 