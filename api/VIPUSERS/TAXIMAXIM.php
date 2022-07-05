<?php
//#<<<<<<<Developer>>>>>>>#//
//#https://github.com/Antrax-QG
//#telegram: @navidshams 
$number = $_GET ["num"];
$url = "https://registration.taximaxim.ir/fa-IR/registration/send-code/";
$data = "_csrf-registration=XkaJF6dCgAPFDiA8PImJkdjSibaDOga-y0bw5fVoRqspJ9pH_g3icoM_FGRE692lorvQ2ftyM46nI5aBxD1_zg%3D%3D&RegistrationForm%5Bplace%5D=36750&RegistrationForm%5Bphone%5D=%2B$number&RegistrationForm%5BphoneCountryCode%5D=ir&RegistrationForm%5BappCode%5D=&RegistrationForm%5Bcode%5D=&_csrf-registration=XkaJF6dCgAPFDiA8PImJkdjSibaDOga-y0bw5fVoRqspJ9pH_g3icoM_FGRE692lorvQ2ftyM46nI5aBxD1_zg%3D%3D&udid=b589a573fcd7551df11da7f9b364e552";
$headers = [
"Host: registration.taximaxim.ir",
"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0",
"Accept: application/json, text/javascript, */*; q=0.01",
"Accept-Language: en-US,en;q=0.5",
"Accept-Encoding: gzip, deflate, br",
"Referer: https://registration.taximaxim.ir/?intl=fa-IR",
"X-CSRF-Token: XkaJF6dCgAPFDiA8PImJkdjSibaDOga-y0bw5fVoRqspJ9pH_g3icoM_FGRE692lorvQ2ftyM46nI5aBxD1_zg==",
"Content-Type: application/x-www-form-urlencoded; charset=UTF-8",
"X-Requested-With: XMLHttpRequest",
"Content-Length: 439",
"Origin: https://registration.taximaxim.ir",
"Connection: keep-alive",
"Cookie: _gcl_au=1.1.1935674336.1611263383; ga4_ga_21NZZ0KWNK=GS1.1.1611609655.2.0.1611609655.60; ga4_ga=GA1.1.557062430.1611263383; _fbp=fb.1.1611263387774.1827331631; _ym_uid=1611263389585968301; _ym_d=1611263389; _ga=GA1.2.1158295201.1611263390; _ym_isad=2; _ym_visorc=w; _ym_visorc_55968049=w; _gid=GA1.2.1835076322.1611609663; registration=7g2s62cjcsacapd9c0hjt4rvhq; _csrf-registration=12bd04dc9d6c7af1acd31d26be25bb970b0ab14004adb6a103fb543d5b71e7d1a%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_csrf-registration%22%3Bi%3A1%3Bs%3A32%3A%22waSPYObqF14XxbT4ziYoxH50lefd1U9e%22%3B%7D; _gat_UA-168238981-1=1; _gat_gtag_UA_74934112_11=1; analytics_campaign={%22source%22:%22driver.taximaxim.ir%22%2C%22medium%22:%22referral%22}; analytics_session_token=7c49a7b1-ae1a-e4d1-612f-e51b96e14ff3; analytics_token=feea40ec-17c3-dec6-9018-b9e6575db907; yektanet_session_last_activity=1/26/2021; _yngt_iframe=1; _ym_visorc_54758941=w; _yngt=60e80e19-93148-8c9a1-1c764-42b43a41577dd",
"Pragma: no-cache",
"Cache-Control: no-cache"
    ];
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HEADER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true
]);
curl_exec($curl);
if(curl_error($curl)){
    echo 'Error';
}else{
    echo 'OK SEND';
}
curl_close($curl);
if (is_file("error_log")){
unlink("error_log");
}
?>