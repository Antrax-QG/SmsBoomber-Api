<?php
//#<<<<<<<Developer>>>>>>>#//
//#https://github.com/Antrax-QG
//#telegram: @navidshams 
include 'config.php';
//========================== // bot // ==============================
function bot($method,$datas=[]){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,'https://api.telegram.org/bot'.API_KEY.'/'.$method );
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    return json_decode(curl_exec($ch));
    }
    
//========================== // update // ==============================
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$message = $update->message;
$message_id = $message->message_id;
$text = convert($message->text);
$chat_id = $message->chat->id;
$tc = $message->chat->type;
$first_name = $message->from->first_name;
$from_id = $message->from->id;
// databse
$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `user` WHERE `id` = '$from_id' LIMIT 1"));
$block = mysqli_query($connect,"SELECT * FROM `block` WHERE `id` = '$from_id' LIMIT 1");
}
if(isset($update->callback_query)){
$callback_query = $update->callback_query;
$callback_query_id = $callback_query->id;
$data = $callback_query->data;
$fromid = $callback_query->from->id;
$messageid = $callback_query->message->message_id;
$chatid = $callback_query->message->chat->id;
// databse
$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `user` WHERE `id` = '$fromid' LIMIT 1"));
$block = mysqli_query($connect,"SELECT * FROM `block` WHERE `id` = '$fromid' LIMIT 1");
}

//==============================// function //=======================================
function convert($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
    return $englishNumbersOnly;
}
function tarikibot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function sendphoto($chat_id, $photo, $caption){
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>$caption,
]);
}
//==============================// keybord and Text //=======================================
$ping = sys_getloadavg();
$home = json_encode([
        'keyboard'=>[
        
		[['text' =>"👑سرور ها👑"],['text' =>"🌵حساب من🌵"]],
		[['text' =>"☎️ پشتیبانی"],['text'=>"💰خرید سکه💰"]],
		[['text' =>"بخش فان 🤸🏼‍♀️"]],
		[['text' =>"📃راهنما📃"],['text'=>"❗قوانین❗"]],
		],
          'resize_keyboard'=>true,
       		]);
$fun = json_encode([
        'keyboard'=>[
        
		[['text' =>"🌞فال🌞"],['text' =>"پینگ ربات"]],
		[['text'=>'🔙 بازگشت']],
		],
          'resize_keyboard'=>true,
       		]);
$server = json_encode([
        'keyboard'=>[
        
       [['text' =>"🔥VIP🔥"],['text' =>"💥Call💥"]],
       [['text'=>'🔥VIP+🔥'],['text'=>'🔥VIP++🔥']],
		[['text' =>"●Free1●"],['text'=>"●Free2●"]],
		[['text' =>"●Free3●"],['text'=>"●Free4●"]],
		[['text'=>'●Free5●'],['text'=>'●Free6●']],
		[['text'=>'🔙 بازگشت']], 
		
		],
          'resize_keyboard'=>true,
       		]);
$back = json_encode([
        'keyboard'=>[
		[['text'=>'🔙 بازگشت']],
		],
         'resize_keyboard'=>true,
       		]);	
	mkdir('data') ;
$token = "1867067607:AAEO2wRdQ1DBSi-VaphJzM1INoBTWJ8RI2I"; 
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$username = $message->from->username;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$photo = $update->message->photo;

$message = $update->message;
$contact = $message->contact;
$contactid = $contact->user_id;
$contactnum = $contact->phone_number;
$step = file_get_contents("data/$from_id/step.txt");
//===========================// fun //===========================

if($text == "🌞فال🌞"){{
$add = "http://www.beytoote.com/images/Hafez/".rand(1,149).".gif";
bot('SendPhoto', [
'chat_id' => $chat_id,
'photo'=>$add,
'caption' =>"
✅فال شما
 ",
  'reply_to_message_id'=>$message_id,
	 ]);
}
}

//===========================// ping //===========================

if($text == "پینگ ربات"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"وضعیت ربات:

$ping[0]",
'parse_mode'=>"html"
]);
}

//#<<<<<<<Developer>>>>>>>#//
//#https://github.com/Antrax-QG
//#telegram: @navidshams 

//===========================// profie //===========================

if($text == "اطلاعات من"){
$profile = json_decode(file_get_contents("https://api.telegram.org/bot$token/getUserProfilePhotos?user_id=$from_id"));
$photo1 = $profile->result->photos[0][0]->file_id;
bot('Sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"$photo1",
'caption'=>"
👆آخرین عکس پروفایل شما👆

👤نام: $first_name
👥نام خانوادگی: $last_name
🔢آیدی عددی: $from_id
🔡یوزرنیم: $username
",
 'parse_mode'=>'MarkDown',
]);
}

//===========================// block //===========================
if (mysqli_num_rows($block) > 0) exit();
//================
//=====// start //===========================

if($text == "/start"){
file_put_contents("data/$from_id/step.txt","oknum");
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ابتدا هویت خود را تایید کنید
",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'تایید هویت','request_contact'=>true]],
],
'resize_keyboard'=>true,
])
]);
}

elseif($contact && $step ="oknum"){
if($contactid == $from_id){
$off = strpos($contactnum,"98");
if($off !== false){
file_put_contents("data/$from_id/number.txt","$contactnum");
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "شماره شما تایید شد!!",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'🔙 بازگشت']],
],
'resize_keyboard'=>true,
])
]);
file_put_contents("data/$from_id/step.txt","none");
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا فقط از شماره ایران جهت تایید هویت خود استفاده کنید",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'تایید هویت','request_contact'=>true]],
],
'resize_keyboard'=>true
])
]);  
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا با استفاده از دکمه زیر شماره خود را ثبت کنید!!",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'تایید هویت','request_contact'=>true]],
],
'resize_keyboard'=>true
])
]);
}
}

if(preg_match('/^(\/start) (.*)/', $text , $match) and $user['id'] != true and $match[2] > 0){
	if(bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>$from_id])->result->status != 'left'){
	bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"🌹 سلام $first_name عزیز به $botname خوش آمدید
",
    'reply_to_message_id'=>$message_id,
    'reply_markup'=>$home
    		]);
	
   $connect->query("INSERT INTO `user` (`id`) VALUES ('$from_id')");
   $user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `user` WHERE `id` = '$match[2]' LIMIT 1"));
   $member = $user['member'] + 1;
   $coin = $user['coin'] + 2;
   bot('sendmessage',[
	'chat_id'=>$match[2],
	'text'=>"🌟 تبریک ! کاربر [$from_id](tg://user?id=$from_id) با استفاده از لینک دعوت شما وارد ربات شده	
⬆️ دو سکه به سکه حساب شما افزوده شده

💰 موجودی حساب : $coin سکه
👥 تعداد زیر مجموعه : $member نفر",
	'parse_mode'=>'Markdown',
	  	]);
   $connect->query("UPDATE `user` SET `member` = '$member' , `coin` = '$coin' WHERE `id` = '$match[2]' LIMIT 1");
   }
   else{
     bot('sendmessage',[
        'chat_id'=>$from_id,
        'text'=>"☑️ برای استفاده از ربات « $botname » ابتدا باید وارد کانال  « $channelname » شوید
❗️ برای دریافت سورس ها ، اطلاعیه ها و گزارشات شما باید عضو کانال ربات شوید
		
📣 @$channel

👇 بعد از عضویت در کانال روی دکمه « ✅ تایید عضویت » بزنید 👇",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[['text'=>'✅ تایید عضویت','callback_data'=>'join']],
              ]
        ])
			]);	 
   $connect->query("INSERT INTO `user` (`id` , `step`) VALUES ('$from_id' , 'send $match[2]')");
   }
}
//===========================// server//===========================
elseif($text == '👑سرور ها👑'){
    bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"✌یکی از سرورهای زیر را انتخاب کنید",
'reply_to_message_id'=>$message_id,
     'reply_markup'=>$server
            ]);
  $connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
}
//===========================// بخش فان //===========================

elseif($text == 'بخش فان 🤸🏼‍♀️'){
    bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"✌welcome",
'reply_to_message_id'=>$message_id,
     'reply_markup'=>$fun
            ]);
  $connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
}

//===========================// back //===========================
elseif($text == '🔙 بازگشت'){
    bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"⬅️ به منوی اصلی بازگشتید
	",
'reply_to_message_id'=>$message_id,
     'reply_markup'=>$home
            ]);
  $connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
}
//===========================// join //===========================
elseif(bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>$from_id])->result->status == 'left'){
 bot('sendmessage',[
        'chat_id'=>$from_id,
        'text'=>"☑️ برای استفاده از ربات « $botname » ابتدا باید وارد کانال  « $channelname » شوید
❗️ برای دریافت سورس ها ، اطلاعیه ها و گزارشات شما باید عضو کانال ربات شوید
		
📣 @$channel

👇 بعد از عضویت در کانال روی دکمه « ✅ تایید عضویت » بزنید 👇",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[['text'=>'✅ تایید عضویت','callback_data'=>'join']],
              ]
        ])
			]);
if($user['id'] != true){
$connect->query("INSERT INTO `user` (`id`) VALUES ('$from_id')");
}} 
//========================== // key // ==============================
elseif($text=='●Free1●') {
	
	bot('sendmessage',[
	'chat_id' => $from_id, 
	'text' =>"
	💣شماره هدف رو برای استفاده از {●Free1●} وارد کنید.

شماره هدف را مانند نمونه ارسال کنید :

9123456789 = ✅ درست

🔥سرعت سرور های {●Free1●} = ارسال 20 الی 50 عدد پیامک",
	'reply_markup' => $back, 
	]) ;
	$connect->query("UPDATE `user` SET `step` = 'free1' WHERE `id` = '$from_id' LIMIT 1");	
} 
elseif( $user['step']=="free1"){
	
	if(  $user['coin'] >0 && strlen($text) < 13){
		
			$cu = curl_init("$web/web.php?target=$text");
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($cu);

		bot('sendmessage', [
		'chat_id' => $from_id, 
		'text' =>"در حال اسپم شماره ...🔥
		
		❤لطفا تا پایان اسپم هیچ متنی به ربات ارسال نکنید{حتی دکمه بازگشت رو هم نزنید}
		
		⚠️ممکنه ربات تا 10 دقیقه بعد جواب نده پس صبور باشید.", 
		'reply_markup' =>$back, 
		]);
		$connect->query("UPDATE `user` SET `coin` = coin - 1 WHERE `id` = '$from_id' LIMIT 1");
		$rnf= mt_rand(5,15);
		sleep($rnf) ;
		bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"اسپم انجام شد✔️", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		file_get_contents("$web/api/web1.php?target=$text");
		}else{
			bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"
		⚠️خطا!!!
		موجودی حساب شما کافی نیست یا شماره را اشتباه وارد کرده‌اید
		شماره را باید طبق نمونه زیر ارسال کنید{10 رقم باشد}
		✔️ 9141234567", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		}}
//=================================//
elseif($text=='●Free2●') {
	
	bot('sendmessage',[
	'chat_id' => $from_id, 
	'text' =>"
	💣شماره هدف رو برای استفاده از {●Free2●} وارد کنید.

شماره هدف را مانند نمونه ارسال کنید :

9123456789 = ✅ درست

🔥سرعت سرور های {●Free2●} = ارسال 20 الی 50 عدد پیامک",
	'reply_markup' => $back, 
	]) ;
	$connect->query("UPDATE `user` SET `step` = 'free2' WHERE `id` = '$from_id' LIMIT 1");	
} 
elseif( $user['step']=="free2"){
	
	if(  $user['coin'] >0 && strlen($text) < 13){
		
			$cu = curl_init("$web/web.php?target=$text");
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($cu);

		bot('sendmessage', [
		'chat_id' => $from_id, 
		'text' =>"در حال اسپم شماره ...🔥
		
		❤لطفا تا پایان اسپم هیچ متنی به ربات ارسال نکنید{حتی دکمه بازگشت رو هم نزنید}
		
		⚠️ممکنه ربات تا 10 دقیقه بعد جواب نده پس صبور باشید.", 
		'reply_markup' =>$back, 
		]);
		$connect->query("UPDATE `user` SET `coin` = coin - 1 WHERE `id` = '$from_id' LIMIT 1");
		$rnf= mt_rand(5,15);
		sleep($rnf) ;
		bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"اسپم انجام شد✔️", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		file_get_contents("$web/api/web2.php?target=$text");
		}else{
			bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"
		⚠️خطا!!!
		موجودی حساب شما کافی نیست یا شماره را اشتباه وارد کرده‌اید
		شماره را باید طبق نمونه زیر ارسال کنید{10 رقم باشد}
		✔️ 9141234567", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		}}
//===============================//
elseif($text=='●Free3●') {
	
	bot('sendmessage',[
	'chat_id' => $from_id, 
	'text' =>"
	💣شماره هدف رو برای استفاده از {●Free3●} وارد کنید.

شماره هدف را مانند نمونه ارسال کنید :

9123456789 = ✅ درست

🔥سرعت سرور های {●Free3●} = ارسال 20 الی 50 عدد پیامک",
	'reply_markup' => $back, 
	]) ;
	$connect->query("UPDATE `user` SET `step` = 'free3' WHERE `id` = '$from_id' LIMIT 1");	
} 
elseif( $user['step']=="free3"){
	
	if(  $user['coin'] >0 && strlen($text) < 13){
		
			$cu = curl_init("$web/web.php?target=$text");
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($cu);

		bot('sendmessage', [
		'chat_id' => $from_id, 
		'text' =>"در حال اسپم شماره ...🔥
		
		❤لطفا تا پایان اسپم هیچ متنی به ربات ارسال نکنید{حتی دکمه بازگشت رو هم نزنید}
		
		⚠️ممکنه ربات تا 10 دقیقه بعد جواب نده پس صبور باشید.", 
		'reply_markup' =>$back, 
		]);
		$connect->query("UPDATE `user` SET `coin` = coin - 1 WHERE `id` = '$from_id' LIMIT 1");
		$rnf= mt_rand(5,15);
		sleep($rnf) ;
		bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"اسپم انجام شد✔️", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		file_get_contents("$web/api/web3.php?target=$text");
		}else{
			bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"
		⚠️خطا!!!
		موجودی حساب شما کافی نیست یا شماره را اشتباه وارد کرده‌اید
		شماره را باید طبق نمونه زیر ارسال کنید{10 رقم باشد}
		✔️ 9141234567", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		}}
//============================//
elseif($text=='●Free4●') {
	
	bot('sendmessage',[
	'chat_id' => $from_id, 
	'text' =>"
	💣شماره هدف رو برای استفاده از {●Free4●} وارد کنید.

شماره هدف را مانند نمونه ارسال کنید :

9123456789 = ✅ درست

🔥سرعت سرور های {●Free4●} = ارسال 20 الی 50 عدد پیامک",
	'reply_markup' => $back, 
	]) ;
	$connect->query("UPDATE `user` SET `step` = 'free4' WHERE `id` = '$from_id' LIMIT 1");	
} 
elseif( $user['step']=="free4"){
	
	if(  $user['coin'] >0 && strlen($text) < 13){
		
			$cu = curl_init("$web/web.php?target=$text");
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($cu);

		bot('sendmessage', [
		'chat_id' => $from_id, 
		'text' =>"در حال اسپم شماره ...🔥
		
		❤لطفا تا پایان اسپم هیچ متنی به ربات ارسال نکنید{حتی دکمه بازگشت رو هم نزنید}
		
		⚠️ممکنه ربات تا 10 دقیقه بعد جواب نده پس صبور باشید.", 
		'reply_markup' =>$back, 
		]);
		$connect->query("UPDATE `user` SET `coin` = coin - 1 WHERE `id` = '$from_id' LIMIT 1");
		$rnf= mt_rand(5,15);
		sleep($rnf) ;
		bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"اسپم انجام شد✔️", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		file_get_contents("$web/api/web4.php?target=$text");
		}else{
			bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"
		⚠️خطا!!!
		موجودی حساب شما کافی نیست یا شماره را اشتباه وارد کرده‌اید
		شماره را باید طبق نمونه زیر ارسال کنید{10 رقم باشد}
		✔️ 9141234567", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		}}
//==============================//
elseif($text=='●Free5●') {
	
	bot('sendmessage',[
	'chat_id' => $from_id, 
	'text' =>"
	💣شماره هدف رو برای استفاده از {●Free5●} وارد کنید.

شماره هدف را مانند نمونه ارسال کنید :

09123456789 = ✅ درست

🔥سرعت سرور های {●Free5●} = ارسال 20 الی 50 عدد پیامک",
	'reply_markup' => $back, 
	]) ;
	$connect->query("UPDATE `user` SET `step` = 'Free5' WHERE `id` = '$from_id' LIMIT 1");	
} 
elseif( $user['step']=="Free5"){
	
	if(  $user['coin'] >0 && strlen($text) < 13){
		
			$cu = curl_init("$web/api/KHANOMI.php?phone=$text&count=20");
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($cu);

		bot('sendmessage', [
		'chat_id' => $from_id, 
		'text' =>"در حال اسپم شماره ...🔥
		
		❤لطفا تا پایان اسپم هیچ متنی به ربات ارسال نکنید{حتی دکمه بازگشت رو هم نزنید}
		
		⚠️ممکنه ربات تا 10 دقیقه بعد جواب نده پس صبور باشید.", 
		'reply_markup' =>$back, 
		]);
		$connect->query("UPDATE `user` SET `coin` = coin - 1 WHERE `id` = '$from_id' LIMIT 1");
		$rnf= mt_rand(5,15);
		sleep($rnf) ;
		bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"اسپم انجام شد✔️", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		file_get_contents("$web/api/KHANOMI.php?phone=$text&count=20");
		}else{
			bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"
		⚠️خطا!!!
		موجودی حساب شما کافی نیست یا شماره را اشتباه وارد کرده‌اید
		شماره را باید طبق نمونه زیر ارسال کنید{10 رقم باشد}
		✔️ 9141234567", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		}}
//============================//
elseif($text=='●Free6●') {
	
	bot('sendmessage',[
	'chat_id' => $from_id, 
	'text' =>"
	💣شماره هدف رو برای استفاده از {●Free6●} وارد کنید.

شماره هدف را مانند نمونه ارسال کنید :

09123456789 = ✅ درست

🔥سرعت سرور های {●Free6●} = ارسال 20 الی 50 عدد پیامک",
	'reply_markup' => $back, 
	]) ;
	$connect->query("UPDATE `user` SET `step` = 'Free6' WHERE `id` = '$from_id' LIMIT 1");	
} 
elseif( $user['step']=="Free6"){
	
	if(  $user['coin'] >0 && strlen($text) < 13){
		
			$cu = curl_init("$web/PINKET.php?phone=$text&count=20");
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($cu);

		bot('sendmessage', [
		'chat_id' => $from_id, 
		'text' =>"در حال اسپم شماره ...🔥
		
		❤لطفا تا پایان اسپم هیچ متنی به ربات ارسال نکنید{حتی دکمه بازگشت رو هم نزنید}
		
		⚠️ممکنه ربات تا 10 دقیقه بعد جواب نده پس صبور باشید.", 
		'reply_markup' =>$back, 
		]);
		$connect->query("UPDATE `user` SET `coin` = coin - 1 WHERE `id` = '$from_id' LIMIT 1");
		$rnf= mt_rand(5,15);
		sleep($rnf) ;
		bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"اسپم انجام شد✔️", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		file_get_contents("$web/api/PINKET.php?phone=$text&count=20");
		}else{
			bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"
		⚠️خطا!!!
		موجودی حساب شما کافی نیست یا شماره را اشتباه وارد کرده‌اید
		شماره را باید طبق نمونه زیر ارسال کنید{10 رقم باشد}
		✔️ 9141234567", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		}}
//============================//
elseif($text=='🔥VIP🔥') {
	
	bot('sendmessage',[
	'chat_id' => $from_id, 
	'text' =>"
	💣شماره هدف رو برای استفاده از {🔥VIP🔥} وارد کنید.

شماره هدف را مانند نمونه ارسال کنید :

9123456789 = ✅ درست

🔥سرعت سرور های {🔥VIP🔥} = ارسال 100 الی 200 عدد پیامک",
	'reply_markup' => $back, 
	]) ;
	$connect->query("UPDATE `user` SET `step` = 'vip' WHERE `id` = '$from_id' LIMIT 1");	
} 
elseif( $user['step']=="vip"){
	
	if(  $user['coin'] >0 && strlen($text) < 13){
		
			$cu = curl_init("$web/web.php?target=$text");
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($cu);

		bot('sendmessage', [
		'chat_id' => $from_id, 
		'text' =>"در حال اسپم شماره ...🔥
		
		❤لطفا تا پایان اسپم هیچ متنی به ربات ارسال نکنید{حتی دکمه بازگشت رو هم نزنید}
		
		⚠️ممکنه ربات تا 10 دقیقه بعد جواب نده پس صبور باشید.", 
		'reply_markup' =>$back, 
		]);
		$connect->query("UPDATE `user` SET `coin` = coin - 5 WHERE `id` = '$from_id' LIMIT 1");
		$rnf= mt_rand(5,15);
		sleep($rnf) ;
		bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"اسپم انجام شد✔️
		🔥بخش VIP خارشو گایید😉", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		file_get_contents("$web/api/vip1.php?target=$text");
		file_get_contents("$web/api/vip2.php?target=$text");
		file_get_contents("$web/api/vip3.php?target=$text");
		}else{
			bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"
		⚠️خطا!!!
		موجودی حساب شما کافی نیست یا شماره را اشتباه وارد کرده‌اید
		💣اسم هر یک شماره در بخش 🔥VIP🔥 برابر با 5 سکه هست
		
		❗شماره را باید طبق نمونه زیر ارسال کنید{10 رقم باشد}
		✔️ 9141234567", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		}}
//===============================//

elseif($text=='🔥VIP+🔥') {
	
	bot('sendmessage',[
	'chat_id' => $from_id, 
	'text' =>"
	💣شماره هدف رو برای استفاده از {🔥vip+🔥} وارد کنید.

شماره هدف را مانند نمونه ارسال کنید :

9123456789 = ✅ درست

🔥سرعت سرور های {🔥vip+🔥} = ارسال 100 الی 200 عدد پیامک",
	'reply_markup' => $back, 
	]) ;
	$connect->query("UPDATE `user` SET `step` = 'vip' WHERE `id` = '$from_id' LIMIT 1");	
} 
elseif( $user['step']=="vip"){
	
	if(  $user['coin'] >0 && strlen($text) < 13){
		
			$cu = curl_init("$web/web.php?target=$text");
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($cu);

		bot('sendmessage', [
		'chat_id' => $from_id, 
		'text' =>"در حال اسپم شماره ...🔥
		
		❤لطفا تا پایان اسپم هیچ متنی به ربات ارسال نکنید{حتی دکمه بازگشت رو هم نزنید}
		
		⚠️ممکنه ربات تا 10 دقیقه بعد جواب نده پس صبور باشید.", 
		'reply_markup' =>$back, 
		]);
		$connect->query("UPDATE `user` SET `coin` = coin - 10 WHERE `id` = '$from_id' LIMIT 1");
		$rnf= mt_rand(5,15);
		sleep($rnf) ;
		bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"اسپم انجام شد✔️
		🔥بخش vip+ خارشو گایید😉", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		file_get_contents("$web/api/webvip.php?target=$text");
		}else{
			bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"
		⚠️خطا!!!
		موجودی حساب شما کافی نیست یا شماره را اشتباه وارد کرده‌اید
		💣اسم هر یک شماره در بخش 🔥VIP🔥 برابر با 5 سکه هست
		
		❗شماره را باید طبق نمونه زیر ارسال کنید{10 رقم باشد}
		✔️ 9141234567", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		}}
//============================//


elseif($text=='🔥VIP++🔥') {
	
	bot('sendmessage',[
	'chat_id' => $from_id, 
	'text' =>"
	💣شماره هدف رو برای استفاده از {🔥VIP++🔥} وارد کنید.

شماره هدف را مانند نمونه ارسال کنید :

9123456789 = ✅ درست

🔥سرعت سرور های {🔥VIP++🔥} = ارسال 100 الی 200 عدد پیامک",
	'reply_markup' => $back, 
	]) ;
	$connect->query("UPDATE `user` SET `step` = 'vip' WHERE `id` = '$from_id' LIMIT 1");	
} 
elseif( $user['step']=="vip"){
	
	if(  $user['coin'] >0 && strlen($text) < 13){
		
			$cu = curl_init("$web/web.php?target=$text");
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($cu);

		bot('sendmessage', [
		'chat_id' => $from_id, 
		'text' =>"در حال اسپم شماره ...🔥
		
		❤لطفا تا پایان اسپم هیچ متنی به ربات ارسال نکنید{حتی دکمه بازگشت رو هم نزنید}
		
		⚠️ممکنه ربات تا 10 دقیقه بعد جواب نده پس صبور باشید.", 
		'reply_markup' =>$back, 
		]);
		$connect->query("UPDATE `user` SET `coin` = coin - 10 WHERE `id` = '$from_id' LIMIT 1");
		$rnf= mt_rand(5,15);
		sleep($rnf) ;
		bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"اسپم انجام شد✔️
		🔥بخش vip+ خارشو گایید😉", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		file_get_contents("$web/api/sms.php?phone=$text&count=20");
		}else{
			bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"
		⚠️خطا!!!
		موجودی حساب شما کافی نیست یا شماره را اشتباه وارد کرده‌اید
		💣اسم هر یک شماره در بخش 🔥VIP🔥 برابر با 5 سکه هست
		
		❗شماره را باید طبق نمونه زیر ارسال کنید{10 رقم باشد}
		✔️ 9141234567", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		}}

//============================//
elseif($text=='💥Call💥') {
	
	bot('sendmessage',[
	'chat_id' => $from_id, 
	'text' =>"
	💣شماره هدف رو برای استفاده از {💥Call💥} وارد کنید.

شماره هدف را مانند نمونه ارسال کنید :

9123456789 = ✅ درست

🔥سرعت سرور های {💥Call💥} = ارسال 10 الی 25 عدد تماس",
	'reply_markup' => $back, 
	]) ;
	$connect->query("UPDATE `user` SET `step` = 'call' WHERE `id` = '$from_id' LIMIT 1");	
} 
elseif( $user['step']=="call"){
	
	if(  $user['coin'] >0 && strlen($text) < 13){
		
			$cu = curl_init("$web/web.php?target=$text");
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($cu);

		bot('sendmessage', [
		'chat_id' => $from_id, 
		'text' =>"در حال اسپم شماره ...🔥
		
		❤لطفا تا پایان اسپم هیچ متنی به ربات ارسال نکنید{حتی دکمه بازگشت رو هم نزنید}
		
		⚠️ممکنه ربات تا 10 دقیقه بعد جواب نده پس صبور باشید.", 
		'reply_markup' =>$back, 
		]);
		$connect->query("UPDATE `user` SET `coin` = coin - 5 WHERE `id` = '$from_id' LIMIT 1");
		$rnf= mt_rand(5,15);
		sleep($rnf) ;
		bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"اسپم انجام شد✔️
		🔥بخش 💥Call💥 خارشو گایید😉
		
		کلی بهش زنگ زدم 😂🤣", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		file_get_contents("وبسرویس کال بمبر");
		}else{
			bot('sendmessage',[
		'chat_id' => $from_id, 
		'text' =>"
		⚠️خطا!!!
		موجودی حساب شما کافی نیست یا شماره را اشتباه وارد کرده‌اید
		💣اسم هر یک شماره در بخش 💥Call💥 برابر با 5 سکه هست
		
		❗شماره را باید طبق نمونه زیر ارسال کنید{10 رقم باشد}
		✔️ 9141234567", 
		'reply_markup' =>$home, 
		]);
		$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
		}}
elseif($text == '🌵حساب من🌵'){
  bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"👤 حساب کاربری شما در $botname :

🆔 شناسه : $from_id
🗣 نام : $first_name

💰 موجودی حساب : {$user['coin']} سکه
👥 تعداد زیر مجموعه : {$user['member']} نفر
",
'reply_to_message_id'=>$message_id,
            ]);					
}

elseif($text == '🗣دعوت دیگران'){
	$bane="$logozir";
	$id = bot('sendphoto',[
	'chat_id'=>$from_id,
	'photo'=>$bane,
	'caption'=>"
	هعی نفس میدونستی ربات $botname اولین ربات تو سطح تلگرامه؟🤔

بزار برات قابلیت های خفنشو بگم😉🔥

¹>متصل به 1 وبسرویس رایگان
²>یک وبسرویس Vip
³>خرید امتیاز با زیر مجموعه گیری و ارسال اکانت
⁴>راحتی در استفاده و ساده
⁵>ایمیل بمبر و کال بمبر بزودی....

دیگه چی میخایی نفس؟بدو بیاد استارت کن
 #از_بدخاهت_چه خبر؟
 
t.me/$usernamebot?start=$from_id",
    		])->result->message_id;
    bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"
	بنر اختصاصی شما ساخته شد!

با ارسال بنر و دعوت دوستان خود به ازای هر یک نفر 2 سکه دریافت کنید❤

علاوه بر دریافت سکه یه کمکی هم به ما میکنی😉
 ✌یه انگیزه ای برای همیشه روشن نگه داشتن ربات دوست عزیز!
از اشتراک‌گزاری ربات به دوستان خود متشکریم❤️

💰 موجودی حساب : {$user['coin']} سکه
👥 تعداد زیر مجموعه : {$user['member']} نفر

🔥 @$usernamebot",
	'reply_to_message_id'=>$id,
    		]);
}
elseif($text == '☎️ پشتیبانی'){
bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"👮🏻 همکاران ما در خدمت شما هستن

📨 جهت ارتباط به صورت مستقیم 👇
 @$adpush 
⚖️ کاربر گرامی، چنانچه شما از ربات $botname استفاده نمایید به منزله قبول قوانین است
 
• سعی بخش پشتیبانی بر این است که تمامی پیام های دریافتی در کمتر از ۱۲ ساعت پاسخ داده شوند، بنابراین تا زمان دریافت پاسخ صبور باشید

• لطفا پیام، سوال، پیشنهاد و یا انتقاد خود را در قالب یک پیام واحد به طور کامل ارسال کنید 👇🏻", 
'reply_to_message_id'=>$message_id,
     'reply_markup'=>$back
            ]);
$connect->query("UPDATE `user` SET `step` = 'sup' WHERE `id` = '$from_id' LIMIT 1");	
}
//================================//
elseif($text == '❗قوانین❗'){
bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"⚠️لطفا با دقت تمامی قوانین را بخوانید تا به مشکل مواجه نشوید⚠️

1-این ربات تنها جهت سرگرمی و شوخی با دوستان و آشنایان تهیه و آماده گردیده است.

2-ادمین ربات و ربات هیچگونه مسئولیتی در قبال هرگونه استفاده بر عهده نمیگیرد.

3-در صورت مشاهده استفاده نادرست حساب کاربری شما برای همیشه مسدود خواهد شد.

4-در صورت هرگونه شکایت و یا اعتراضی تیم ما با پلیس همکاری میکند.

5-درصورت درخواست اطلاعات شما از طرف پلیس تنها زمانی که شکایتی ثبت شده باشد،طبق قانون شماره 4(اعم از آیدی تلگرام و یا ایدی عددی) تیم ما این حق را دارد که در اختیار قرار دهد.

6-ادمین ربات در هر زمانی می تواند قوانین جدید وضع، تغییر و یا حذف کند.

7-کاربران ربات این حق را دارند که تنها در صورت پذیرفتن قوانین از ربات استفاده کنند.

8-زمانی که از طرف ربات پاسخی دریافت نکردید، تعداد درخواست ها از جانب دیگر کاربران بالا بوده و این یعنی ربات توانایی پاسخ همزمان به چندین کاربر را ندارد در این صورت میبایست صبرکنید تا ربات پاسخ به درخواست قبلی شما را بدهد.

9-هرگونه اسپم زدن به ربات خلاف میباشد و منجر به بن شدن شما میشود.(بازه زمانی را ادمین مشخص میکند)

10-هرگونه بی احترامی قابل قبول نیست و منجر به مسدودیت مادام العمر میشود.(صادق برای همه کاربران)",
'reply_to_message_id'=>$message_id,
            ]);
}		
//===========================//
elseif($text == '📃راهنما📃'){
bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"
	راهنما📃 :
	
1 : در بخش اصلی ربات (خانه) از سرور ها یکی رو انتخاب میکنید بسته به vip یا free بدون سرور.

2 : هزینه ارسال در سرور های Free به ازای هر یک بار اسپم یک سکه و در سرور Vip پنج سکه هست.
در سرور 💥Call💥 نیز 5 سکه کم میشود

3 : شماره کاربر مورد نظر رو به درستی وارد میکنید و صبر میکنید که ربات تایید رو ارسال کند,شماره باید به این صورت باشه۔
✅9123456789

4 : وقتی درخواست اسپم میزنید به هیچ عنوان تا ثبت شماره و ارسال پیام تایید از ربات دکمه برگشت یا استارت دوباره ربات رو نزنید چون ربات شمارو بن میکنه.⚠️⚠️


⚠️قبل از استفاده از ربات به بخش قوانین سر بزنید⚠️",
'reply_to_message_id'=>$message_id,
            ]);
}		
//===============================//
elseif($text == '💰خرید سکه💰'){
bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"👇🏻 یکی از بخش های زیر را جهت افزایش سکه انتخاب کنید	

🆔 شناسه : $from_id
🗣 نام : $first_name
💰 موجودی حساب : {$user['coin']} سکه
👥 تعداد زیر مجموعه : {$user['member']} نفر

❗با هر اسپم بخش رایگان 1 سکه و با هر اسپم بخش ویژه 5 سکه از حساب شما کم میشود
	
🗣 با دعوت دوستان خود به ربات با لینک اختصاصی خود میتوانید به ازای هر نفر 1 سکه دریافت کنید",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
        'keyboard'=>[
       [['text'=>'📞ارسال اکانت📞']],
		[['text'=>'🗣دعوت دیگران'],['text'=>'💳پرداخت هزینه💳']],
		[['text'=>'🔙 بازگشت']],
		],
        'resize_keyboard'=>true,
       		])
            ]);					
}	
//===============================//
elseif($text == '💳پرداخت هزینه💳'){
    bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"👇🏻 لطفا تعداد سکه مورد نظر خود را به عدد وارد کنید
	
❗️ توجه کنید که حداکثر میتوانید 500 سکه حساب خود را شارژ کنید
👈🏻 تعرفه هر 1 سکه 500 تک تومان است
❗یعنی 10 عدد سکه = 5هزار تومان",
   'reply_to_message_id'=>$message_id,
   'reply_markup'=>json_encode([
        'keyboard'=>[
		[['text'=>'🔙 بازگشت']],
		],
        'resize_keyboard'=>true,
       		])
            ]);
$connect->query("UPDATE `user` SET `step` = 'pay' WHERE `id` = '$from_id' LIMIT 1");
}
//==============================//
elseif($text == '📞ارسال اکانت📞'){
    bot('sendmessage',[
	'chat_id'=>$from_id,
	'text'=>"
	سلام $first_name عزیز😉
	
	🔥توی این بخش به ازای هر یک اکانت امریکا که به پیوی ادمین ارسال میکنی <20> سکه دریافت میکنی.
	
	❗توجه کن که اکانت نباید نشست فعال داشته باشه
	
	❗اکانت سالم باشه و اگر اکانت جز امریکا داری میتونید ارسال کنید به ادمین و سکه های بیشتری دریافت کنید.
	
	❗بعد از اهدا اکانت 10 دقیقه صبر کن بعدش ادمین خودش سکه های تورو به حسابت واریز میکنه.",
   'reply_to_message_id'=>$message_id,
   'reply_markup'=>json_encode([
        'inline_keyboard'=>[
   [['text'=>'🔥پیوی ادمین🔥','url'=>'t.me/navidshams']],
              ]
        ])
   ]);
$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");
}
//===========================// data //===========================
elseif($data == 'join'){
if(bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>$fromid])->result->status != 'left'){
	bot('sendmessage',[
	'chat_id'=>$chatid,
	'text'=>"☑️ عضویت شما در کانال تایید شد

",
'reply_to_message_id'=>$messageid,
     'reply_markup'=>$home
    		]);
   }else{
       bot('answercallbackquery', [
            'callback_query_id' =>$callback_query_id,
            'text' => "❌ هنوز داخل کانال « @$channel » عضو نیستید",
            'show_alert' =>false,
        ]);
}
}	

elseif($user['step'] == 'sup'){
	    bot('sendmessage',[       
		'chat_id'=>$from_id,
		'text'=>'✅ پیام شما با موفقیت ارسال شد منتظر پاسخ پشتیبانی باشید',
        'reply_to_message_id'=>$message_id,
        'reply_markup'=>$back
	       ]);	
        bot('ForwardMessage',[
        'chat_id'=>$admin[0],
        'from_chat_id'=>$from_id,
        'message_id'=>$message_id
           ]);
}
//=============================//
elseif($user['step'] == 'pay' && $tc == 'private'){
if($text > 0 and $text <= 500){
	        $amount = $text * 500;
			bot('sendmessage',[       
			'chat_id'=>$from_id,
			'text'=>'صبر لطفا...!❤',
			'reply_markup'=>$home
	        ]);	
			bot('sendmessage',[       
			'chat_id'=>$from_id,
			'text'=>"✅ فاکتور افزایش $text سکه با مبلغ $amount تومان با موفقیت برای شما ساخته شد
			
🔥شناسه کاربری شما : $from_id
🗣 نام شما : $first_name
💰 موجودی حساب شما : {$user['coin']} سکه

👇🏻 پرای پرداخت کافیست وارد پیوی ادمین شوید و پرداخت خودتون رو انجام بدید❤",
			'reply_to_message_id'=>$message_id,
			'reply_markup'=>json_encode([
            'inline_keyboard'=>[
	          [['text'=>"💳 پرداخت $amount تومان",'url'=>"t.me/$adpush"]],
              ]
              ])
	       ]);	
     $connect->query("UPDATE user SET step = 'none' WHERE id = '$from_id' LIMIT 1");
}else
			bot('sendmessage',[       
			'chat_id'=>$from_id,
			'text'=>'❗️ خطا ، پیام شما دارای عدد ورودی نادرست است
			
👇🏻 لطفا تعداد سکه مورد نظر خود را به عدد وارد کنید
❗️ توجه کنید که حداکثر میتوانید 500 سکه حساب خود را شارژ کنید',
			'reply_to_message_id'=>$message_id,
			'reply_markup'=>$back
	              ]);	
}
//===========================// panel admin //===========================
elseif($text == '/panel' and $tc == 'private' and in_array($from_id,$admin)){
   bot('sendmessage',[
   'chat_id'=>$from_id,
   'text'=>"📍 ادمین عزیز به پنل مدریت ربات خوش امدید",
   'reply_markup'=>json_encode([
   'keyboard'=>[
	   [['text'=>"📍 آمار ربات"],['text'=>"📍 مسدود کردن"]],
       [['text'=>"📍 ارسال به کاربران"],['text'=>"📍 فروارد به کاربران"]],
	   [['text'=>"دریافت شماره"]],
	   [['text'=>"📍 ارسال سکه"],['text'=>"/start"]],
            ],
      'resize_keyboard'=>true
      ])
    ]);
}

elseif($text == "دریافت شماره" and  $chat_id == $admin ){ 
file_put_contents("data/$from_id/step.txt","recive");
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"برای دریافت شماره ایدی عددی کاربر را ارسال کنید!!",
]);
}
elseif($step == "recive"){
$number = file_get_contents("data/$text/number.txt");
file_put_contents("data/$from_id/step.txt","none");
bot('sendContact',[
'chat_id'=>$admin,
'phone_number'=>$number,
'first_name'=>"
شماره کاربر
$text
",
'reply_to_message_id'=>$message_id,
]); 
}
elseif($text == 'برگشت 🔙' and $tc == 'private' and in_array($from_id,$admin)){
    bot('sendmessage',[
   'chat_id'=>$from_id,
   'text'=>"📍 به منوی مدیریت بازگشتید",
   'reply_markup'=>json_encode([
   'keyboard'=>[
	   [['text'=>"📍 آمار ربات"],['text'=>"📍 مسدود کردن"]],
       [['text'=>"📍 ارسال به کاربران"],['text'=>"📍 فروارد به کاربران"]],
	   [['text'=>"دریافت شماره"]],
	   [['text'=>"📍 ارسال سکه"],['text'=>"/start"]],
            ],
      'resize_keyboard'=>true
      ])
    ]);
$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");		
}
elseif($text == '📍 آمار ربات' and $tc == 'private' and in_array($from_id,$admin)){
$alluser = mysqli_num_rows(mysqli_query($connect,"select `id` from `user`"));
		bot('sendmessage',[
		'chat_id'=>$from_id,
		'text'=>"🤖 آمار ربات شما
		
📍 تعداد کاربران : $alluser
",
		]);
		}
elseif ($text == '📍 ارسال به کاربران' and $tc == 'private' and in_array($from_id,$admin)) {
         bot('sendmessage',[
         'chat_id'=>$from_id,
         'text'=>"📍 لطفا متن یا رسانه خود را ارسال کنید [میتواند شامل عکس باشد]  همچنین میتوانید رسانه را همراه با کشپن [متن چسپیده به رسانه ارسال کنید]",
	     'reply_markup'=>json_encode([
         'keyboard'=>[
	         [['text'=>"برگشت 🔙"]]
                ],
           'resize_keyboard'=>true
              ])
          ]);
$connect->query("UPDATE `user` SET `step` = 'sendtoall' WHERE `id` = '$from_id' LIMIT 1");
}
elseif ($text == '📍 فروارد به کاربران' and $tc == 'private' and in_array($from_id,$admin)){
         bot('sendmessage',[
         'chat_id'=>$from_id,
         'text'=>"📍 لطفا پیام خود را فوروارد کنید [پیام فوروارد شده میتوانید از شخص یا کانال باشد]",
	     'reply_markup'=>json_encode([
         'keyboard'=>[
	         [['text'=>"برگشت 🔙"]]
                ],
           'resize_keyboard'=>true
              ])
          ]);
$connect->query("UPDATE `user` SET `step` = 'fortoall' WHERE `id` = '$from_id' LIMIT 1");		
}
elseif ($text == '📍 مسدود کردن' and $tc == 'private' and in_array($from_id,$admin)){
         bot('sendmessage',[
         'chat_id'=>$from_id,
         'text'=>"📍 لطفا شناسه کاربری فرد را ارسال کنید",
	   'reply_markup'=>json_encode([
       'keyboard'=>[
	        [['text'=>"برگشت 🔙"]]
                 ],
          'resize_keyboard'=>true
            ])
          ]);
$connect->query("UPDATE `user` SET `step` = 'block' WHERE `id` = '$from_id' LIMIT 1");		
}

elseif ($text == '📍 ارسال سکه' and $tc == 'private' and in_array($from_id,$admin)){
         bot('sendmessage',[
         'chat_id'=>$chat_id,
         'text'=>"📍 لطفا در خط اول ایدی فرد و در خط دوم میزان موجودی را وارد کنید
📍 اگر میخواهید موجودی فر را کم کنید از علامت - منفی استفاده کنید
669826262
20",
	   'reply_markup'=>json_encode([
       'keyboard'=>[
	        [['text'=>"برگشت 🔙"]]
                 ],
          'resize_keyboard'=>true
            ])
          ]);
$connect->query("UPDATE `user` SET `step` = 'sendadmin' WHERE `id` = '$from_id' LIMIT 1");		
}
//===========================// admin step //===========================

elseif($user['step'] == 'block' && $tc == 'private') {
			bot('sendmessage',[       
			'chat_id'=>$from_id,
			'text'=>"✅ فرد با موفقیت مسدود شد",
	         ]);	
$connect->query("INSERT INTO `block` (`id`) VALUES ('$text')");
$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");
}
elseif($user['step'] == 'sendadmin') {
$all = explode("\n", $text);	
			bot('sendmessage',[       
			'chat_id'=>$chat_id,
			'text'=>"انتقال موجودی با موفقیت انجام شد ✅",
	         ]);
$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `user` WHERE `id` = '$all[0]' LIMIT 1"));			 
$coin = $user['coin'] + $all[1] ;
			bot('sendmessage',[       
			'chat_id'=>$all[0],
			'text'=>"✅ $all[1] سکه  از طرف مدیریت ربات برای شما انتقال داده شد .
💰 موجودی جدید شما : $coin سکه",
	]);	
$connect->query("UPDATE `user` SET `coin` = '$coin' WHERE `id` = '$all[0]' LIMIT 1");
$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");
}
elseif ($user['step'] == 'sendtoall') {
$photo = $message->photo[count($message->photo)-1]->file_id;
$caption = $update->message->caption;
         bot('sendmessage',[
        	'chat_id'=>$from_id,
        	'text'=>"✔️ پیام شما با موفقیت برای ارسال همگانی تنظیم شد",
 ]);
$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");
$connect->query("UPDATE `sendall` SET step = 'send' , `text` = '$text$caption' , `chat` = '$photo' LIMIT 1");			
}
elseif ($user['step'] == 'fortoall') {
         bot('sendmessage',[
        	'chat_id'=>$from_id,
        	'text'=>"✔️ پیام شما با موفقیت به عنوان فوروارد همگانی تنظیم شد",
 ]);
$connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '$from_id' LIMIT 1");	
$connect->query("UPDATE `sendall` SET `step` = 'forward' , `text` = '$message_id' , `chat` = '$from_id' LIMIT 1");		
}
//===========================// answer //===========================
elseif($message->text && $message->reply_to_message && $from_id == $admin[0]){
	bot('sendmessage',[
        'chat_id'=>$from_id,
        'text'=>'☑️ پاسخ شما برای فرد ارسال شد'
		]);
	bot('sendmessage',[
        'chat_id'=>$message->reply_to_message->forward_from->id,
        'text'=>"👮🏻 پاسخ پشتیبان برای شما : $text",
		]);
}
//===========================// main //===========================

//===========================// coin join //===========================	
if(preg_match('/^send (.*)/', $user['step'] , $match)){
   if(bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>$user['id']])->result->status != 'left'){
   $data = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `user` WHERE `id` = '$match[1]' LIMIT 1"));
   $member = $data['member'] + 1;
   $coin = $data['coin'] + 1;
   bot('sendmessage',[
	'chat_id'=>$match[1],
	'text'=>"🌟 تبریک ! کاربر [{$user['id']}](tg://user?id={$user['id']}) با استفاده از لینک دعوت شما وارد ربات شده	
⬆️ یک سکه به سکه حساب شما افزوده شده

💰 موجودی حساب : $coin سکه
👥 تعداد زیر مجموعه : $member نفر",
	'parse_mode'=>'Markdown',
	  	]);
   $connect->query("UPDATE `user` SET `member` = '$member' , `coin` = '$coin' WHERE `id` = '$match[1]' LIMIT 1");
   $connect->query("UPDATE `user` SET `step` = 'none' WHERE `id` = '{$user['id']}' LIMIT 1");
   }
}

//#<<<<<<<Developer>>>>>>>#//
//#https://github.com/Antrax-QG
//#telegram: @navidshams 

?>