<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
//@Source_Home
ob_start();
define('API_KEY','[*[TOKEN]*]');//توکن
ini_set("log_errors" , "off");
//----------------------------------------------------------------------
function bot($method,$datas=[]){
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
//----------------------------------------------------------------------
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$textmessage = $message->text;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$admin = "[*[ADMIN]*]";
$b = file_get_contents("type.txt");
$user = json_decode(file_get_contents("data/$from_id.json"),true);
$step = $user["step"];
$invite = $user["invite"];
$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $bb = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
//----------------------------------------------------------------------
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function objectToArrays( $object ) {
if( !is_object( $object ) && !is_array( $object ) )
{
return $object;
}
if( is_object( $object ) )
{
$object = get_object_vars( $object );
}
return array_map( "objectToArrays", $object );
}
function deletefolder($path) { 
if ($handle=opendir($path)) { 
while (false!==($file=readdir($handle))) { 
if ($file<>"." AND $file<>"..") { 
if (is_file($path.'/'.$file))  { 
@unlink($path.'/'.$file); 
} 
if (is_dir($path.'/'.$file)) { 
deletefolder($path.'/'.$file); 
@rmdir($path.'/'.$file); 
} 
} 
} 
} 
}
$keyb = json_encode([
'keyboard'=>[
[['text'=>"🌸رمان🌸"]],
[['text'=>"🚨موجودی سکه🚨"],['text'=>"⭕️مورد علاقه ها⭕️"]],
[['text'=>"💰جمع کردن سکه💰"],['text'=>"🔺خرید سکه🔺"]],
[['text'=>"🤖پشتیبانی🤖"]],
[['text'=>"🔧دیگر ربات ها🔧"],['text'=>"🔦کانال ما🔦"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
//----------------------------------------------------------------------
//----------------------------------------------------------------------
if(strpos($textmessage=="/start") !== false  && $textmessage !=="/start"){
$id=str_replace("/start ","",$textmessage);
$amar=file_get_contents("data/members.txt");
$exp=explode("\n",$amar);
if(!in_array($from_id,$exp) && $from_id != $id){
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$user1 = json_decode(file_get_contents("data/$id.json"),true);
$invite = $user1["invite"];
$newinvite = $invite + 1;
$user1["invite"] = $newinvite;
$outjson = json_encode($user1,true);
file_put_contents("data/$id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"یک نفر از طرف تو اومد تو ربات و یک سکه گرفتی!",
'parse_mode'=>"MARKDOWN",
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سلام دوستان عزیز 🙃

به اولین ربات رمان در تلگرام خوش امدید😁

جهت استفاده از رمان های زیبا ما از دکمه رمان استفاده کنید❤️
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]); 
}
}
if (!file_exists("data/$from_id.json")) {
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["step"] = "free";
$user["invite"] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
}
$channel = file_get_contents("data/channel.txt");
$sup = file_get_contents("data/sup.txt");
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot[*[TOKEN]*]/getChatMember?chat_id=@$channel&user_id=".$chat_id));
$tch = $forchaneel->result->status;
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator' and $channel != null){
		 bot('sendMessage',[
                    'chat_id'=>$chat_id,
'text'=>"
دوست عزیز ربات قفل میباشد🔐

 برای استفاده از این ربات فوق العاده در چنل زیر عضو بشید📎
 
 @$channel
 @$channel

و سپس بعد از عضویت مجددن /start بزنید",
                   'parse_mode'=>"HTML",
]);
}else{
if($textmessage == "/start" or $textmessage == "/start"){
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سلام دوستان عزیز 🙃

به اولین ربات رمان در تلگرام خوش امدید😁

جهت استفاده از رمان های زیبا ما از دکمه رمان استفاده کنید❤️
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]); 
}

//----------------------------------------------------------------------
elseif($textmessage == "🔙"){
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
به منوی اصلی خوش آمدید

جهت استفاده از رمان های زیبا ما از دکمه رمان استفاده کنید❤️
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]); 
}
//----------------------------------------------------------------------
elseif($textmessage == "🔺خرید سکه🔺"){
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
برای خرید به ایدی زیر مراحعه کنید
@$sup
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]); 
}
//----------------------------------------------------------------------
elseif($textmessage == "🤖پشتیبانی🤖"){
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ایدیه پشتیبانی :
@$sup
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]); 
}
//----------------------------------------------------------------------
elseif($textmessage == "🔦کانال ما🔦"){
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
کانال ما :
@$channel
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]); 
}
//----------------------------------------------------------------------
elseif($textmessage == "🔧دیگر ربات ها🔧"){
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
{جهت دیدن دیگر ربات های ما به کانال زیر مراجعه کنید}
@$channel
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]); 
}
//----------------------------------------------------------------------
elseif($textmessage == "💰جمع کردن سکه💰"){
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
دوست عزیز تعداد سکه های شما به پایان رسید  لینک زیر به دوستانتون بفرستین تا با هر استارت یک سکه بگیری😍

https://t.me/$username_bot?start=$chat_id
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]); 
}
//----------------------------------------------------------------------
elseif($textmessage == "🌸رمان🌸"){
$coin = file_get_contents("data/coin.txt");
if($invite >= $coin){
$ted = file_get_contents("data/tedad.txt");
$ran = rand(1,$ted);
$readed = file_get_contents("data/readed/$chat_id.txt");
if(file_exists("roman/$ran.txt") and strpos($readed,$ran) !== true ){
$n = $invite - $coin;
$user["invite"] = "$n";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$romantxt = file_get_contents("roman/$ran.txt");
$file = fopen("data/readed/$chat_id.txt", 'a');
fwrite($file, "$ran\n");
fclose($file);
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"$romantxt",
'parse_mode'=>'HTML',
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"افرودن به موردعلاقه ها❤️",'callback_data'=>"like-$ran"]

],
]
])
]);
}else{
repeat(1);
}}else{
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"سکه شما جهت ورود به این بخش کافی نیست 🚦سکه مورد نیاز : $coin",
'parse_mode'=>'HTML',
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]);
}}
//----------------------------------------------------------------------
elseif($textmessage == "⭕️مورد علاقه ها⭕️"){
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$likes = file_get_contents("like/$chat_id.txt");
if($likes != null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$likes
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]); 
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
شما رمانی را به این لیست اضافه نکرده اید!
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]); 
}}
//----------------------------------------------------------------------
elseif($textmessage == "🚨موجودی سکه🚨"){
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
شما هم اکنون $invite سکه دارید🚦
جهت افزایش موجودی سکه خود روی 💰جمع کردن سکه💰 کلیک نمایید
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$keyb,
]); 
}
//----------------------------------------------------------------------
elseif($textmessage == "مدیریت" or $textmessage == "پنل" or $textmessage == "/panel"){
if($chat_id == $admin ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سلام مدیر گرامی به پنل خوش آمدید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
}
//----------------------------------------------------------------------
elseif($chat_id == $admin and $textmessage == "💡امار ربات💡"){
$alluser = file_get_contents("data/members.txt");
$alaki = explode("\n",$alluser);
$allusers = count($alaki)-1;
$bots45 = file_get_contents("data/bots.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد کاربران ربات شما: $allusers
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
//----------------------------------------------------------------------
elseif($chat_id == $admin and $textmessage == "✉️پیام همگانی✉️"){	
$user["step"] = "send2all";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"پیام خود رو بفرست",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
elseif($chat_id == $admin && $step == "send2all" && $textmessage != "🔙"){ 
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$all_member = fopen( "data/members.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('sendMessage',[
'chat_id'=>$user,
'text'=>$textmessage,
'parse_mode'=>"MarkDown",
]);
}
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"پیام به همه ارسال شد",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
//----------------------------------------------------------------------
elseif($chat_id == $admin and $textmessage == "⏰فروارد همگانی⏰"){
$user["step"] = "f2all";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"پیام خودت رو فور بده اینجا",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
elseif($textmessage != "🔙" && $from_id == $admin && $step == "f2all"){
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
$all_member = fopen( "data/members.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>$admin,
'message_id'=>$message_id
]);
}
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"به تمام اعضا فروارد شد!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
//----------------------------------------------------------------------
elseif($chat_id == $admin and $textmessage == "😍افزودن رمان😍"){	
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"عملیات مورد نظر را انتخاب کنید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"+ افزودن رمان +"],['text'=>"- حذف رمان -"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]); 
}
//----------------------------------------------------------------------
elseif($chat_id == $admin and $textmessage == "- حذف رمان -"){	
$user["step"] = "delr";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"کد رمان مورد نظر را ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
elseif($textmessage != "🔙" && $from_id == $admin && $step == "delr"){
if(file_exists("roman/$textmessage.txt")){
unlink("roman/$textmessage.txt");
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"رمان با موفقیت از لیست حذف شد!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}else{
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"هیچ رمانی با این کد وجود ندارد!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}}
//----------------------------------------------------------------------
elseif($chat_id == $admin and $textmessage == "+ افزودن رمان +"){
$user["step"] = "mkdir";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"متن رمان را ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
elseif($textmessage != "🔙" && $from_id == $admin && $step == "mkdir"){
$ted = file_get_contents("data/tedad.txt");
$new = $ted + 1;
file_put_contents("data/tedad.txt","$new");
file_put_contents("roman/$new.txt","$textmessage");
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"رمان به لیست افزوده شد!
کد این رمان : $new",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
//----------------------------------------------------------------------
elseif($chat_id == $admin and $textmessage == "💸تنظیم چنل💸"){
$user["step"] = "setch";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"آیدی کانال خود را بدون @ ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
elseif($textmessage != "🔙" && $from_id == $admin && $step == "setch"){
file_put_contents("data/channel.txt","$textmessage");
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"کانال تنظیم شد!
@$textmessage",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
elseif($chat_id == $admin and $textmessage == "💸تنظیم پشتیبانی💸"){
$user["step"] = "setsup";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"آیدی پشتیبانی خود را بدون @ ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
elseif($textmessage != "🔙" && $from_id == $admin && $step == "setsup"){
file_put_contents("data/sup.txt","$textmessage");
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"پشتیبانی تنظیم شد!
@$textmessage",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
//----------------------------------------------------------------------
elseif($chat_id == $admin and $textmessage == "💰تنظیم سکه رمان💰"){
$user["step"] = "setcoin";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"به ازای هر رمان چند سکه کسر بشه؟!
انگلیسی و عدد ارسال کنید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
elseif($textmessage != "🔙" && $from_id == $admin && $step == "setcoin"){
file_put_contents("data/coin.txt","$textmessage");
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"تنظیم شد!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
//----------------------------------------------------------------------
elseif($chat_id == $admin and $textmessage == "💷 عملیات سکه 💷"){	
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"عملیات مورد نظر را انتخاب کنید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"+افزایش سکه کاربر+"],['text'=>"-کاهش سکه کاربر-"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
//----------------------------------------------------------------------
elseif($chat_id == $admin and $textmessage == "-کاهش سکه کاربر-"){	
$user["step"] = "incoin";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"آیدی عددی کاربر را ارسال نمایید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
elseif($textmessage != "🔙" && $from_id == $admin && $step == "incoin"){
if(file_exists("data/$textmessage.json")){
file_put_contents("data/us.txt","$textmessage");
$user["step"] = "coins";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"چند سکه از فرد کسر شود؟! 
انگلیسی و به عدد ارسال نمایید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}else{
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"این کاربر در ربات را استارت نکرده است!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}}
elseif($textmessage != "🔙" && $from_id == $admin && $step == "coins"){
$us = file_put_contents("data/us.txt");
$use = json_decode(file_get_contents("data/$us.json"),true);
$invie = $use["invite"];
$invies = $invie - $textmessage;
$use["invite"] = "$invies";
$outjso = json_encode($use,true);
file_put_contents("data/$us.json",$outjso);
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$us,
'text'=>"از طرف مدیریت از شما $textmessage سکه کسر شد🚦",
'parse_mode'=>"MarkDown",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"عملیات با موفقیت انجام شد",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
unlink('data/us.txt');
}
//----------------------------------------------------------------------
elseif($chat_id == $admin and $textmessage == "+افزایش سکه کاربر+"){	
$user["step"] = "decoin";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"آیدی عددی کاربر را ارسال نمایید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
elseif($textmessage != "🔙" && $from_id == $admin && $step == "decoin"){
if(file_exists("data/$textmessage.json")){
file_put_contents("data/us.txt","$textmessage");
$user["step"] = "coinss";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"چند سکه به فرد اضافه شود؟! 
انگلیسی و به عدد ارسال نمایید!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}else{
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"این کاربر در ربات را استارت نکرده است!",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}}
elseif($textmessage != "🔙" && $from_id == $admin && $step == "coinss"){
$us = file_put_contents("data/us.txt");
$use = json_decode(file_get_contents("data/$us.json"),true);
$invie = $use["invite"];
$invies = $invie + $textmessage;
$use["invite"] = "$invies";
$outjso = json_encode($use,true);
file_put_contents("data/$us.json",$outjso);
$user["step"] = "free";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id.json",$outjson);
bot('sendMessage',[
'chat_id'=>$us,
'text'=>"از طرف مدیریت به شما $textmessage سکه اضافه شد🚦",
'parse_mode'=>"MarkDown",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"عملیات با موفقیت انجام شد",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"💡امار ربات💡"],['text'=>"💸تنظیم پشتیبانی💸"]],
[['text'=>"⏰فروارد همگانی⏰"],['text'=>"✉️پیام همگانی✉️"]],
[['text'=>"😍افزودن رمان😍"],['text'=>"💰تنظیم سکه رمان💰"]],
[['text'=>"💷 عملیات سکه 💷"],['text'=>"💸تنظیم چنل💸"]],
[['text'=>"🔙"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
unlink('data/us.txt');
}}
//----------------------------------------------------------------------
if (strpos($data, "like") !== false) {
$id = str_replace("like-",'',$data);
$romantxt = file_get_contents("roman/$id.txt");
$likes = file_get_contents("like/$chatid.txt");
if(strpos($likes,$romantxt) !== true){
$file = fopen("like/$chatid.txt", 'a');
fwrite($file, "🏷🏷🏷🏷🏷🏷🏷🏷🏷\n$romantxt\n🏷🏷🏷🏷🏷🏷🏷🏷🏷\n");
fclose($file);
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "به لیست موردعلاقه های شما افزوده شد✅",
'show_alert' => false
]);
}else{
bot('answercallbackquery', [
'callback_query_id' => $update->callback_query->id,
'text' => "این رمان در لیست موردعلاقه های شما موجود بود⭕️",
'show_alert' => false
]);
}}
elseif($b != "vip"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
ساخت بهترین ربات ها با پرو نایت🤠💎
@Source_Home
",
'parse_mode'=>"HTML",
]); 
}
//----------------------------------------------------------------------
unlink('error_log');
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
?>