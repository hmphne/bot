<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
//@Source_Home
error_reporting(0);

define('API_KEY','[*[TOKEN]*]');
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
$payam = $update->message;
$chat_id = $payam->chat->id;
$message_id = $payam->message_id;
$from_id = $payam->from->id;
$text = $payam->text;
$admin = '[*[ADMIN]*]';
$user = json_decode(file_get_contents("data/$from_id.json"),true);
$com = $user["com"];
$first_name = $payam->from->first_name;
$last_name = $payam->from->last_name;
$username = $payam->from->username;
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$reply = $payam->reply_to_message->forward_from->id;
$b = file_get_contents('type.txt');
$user2 = json_decode(file_get_contents("data/$chatid.json"),true);
$messageid = $update->callback_query->message->message_id;
//----------------------------------------------------------------------
$or = json_encode([
'keyboard'=>[
[['text'=>"پشتیبانی"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
$back = json_encode([
'keyboard'=>[
[['text'=>"برگشت"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
$backad = json_encode([
'keyboard'=>[
[['text'=>"/panel"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
$panel = json_encode([
'keyboard'=>[
[['text'=>"آمار ربات"]],
[['text'=>"ارسال پیام"],['text'=>"فروارد پیام"]],
[['text'=>"راهنما"],['text'=>"برگشت"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
]);
//----------------------------------------------------------------------
if (strpos($data, "pas-") !== false) {
$id = str_replace("pas-",'',$data);
file_put_contents("data/id.txt","$id");
$user2["com"] = "ans";
file_put_contents("data/$chatid.json",json_encode($user2,true));
bot("editmessagetext", [
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"پیام خود را ارسال کنید!
ارسال به :
[$id](tg://user?id=$id)
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"کنسل","callback_data"=>"can-$id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
if (strpos($data, "can") !== false) {
$id = str_replace("can-",'',$data);
unlink("data/id.txt");
$user2["com"] = "none";
file_put_contents("data/$chatid.json",json_encode($user2,true));
bot("editmessagetext", [
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"کنسل شد!
",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"ارسال مجدد","callback_data"=>"pas-$id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
if($b != "vip"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ساخت بهترین ربات ها با پرو نایت🤠💎
@Source_Home",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
]);
}
switch($text){
case '/start':
if (!file_exists("data/$from_id.json")) {
$myfile2 = fopen("data/ozvs.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
}
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سلام به پیام رسان هوشمند ما خوش آمدید!
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]);
break;
case 'برگشت';
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"سلام به پیام رسان هوشمند ما خوش آمدید!
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]);
break;
case 'پشتیبانی';
$user["com"] = "sup";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خود را ارسال کنید مستقیم به دست ادمین میرسد!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$back,
]);
break;
case 'video':
bot('sendVideo',[
'chat_id'=>$chat_id,
'video'=>'https://t.me/Filmpege/81',
'caption'=>"پیام خود را ارسال کنید مستقیم به دست ادمین میرسد!",
'reply_to_message_id'=>$message_id
]);
break;
case '/panel':
if($chat_id == $admin){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به پنل مدیریت خوش آمدید
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]);
}
break;
case '/ban':
$ban = file_get_contents("data/ban.txt");
if($reply != null and $chat_id == $admin){
$myfile2 = fopen("data/ban.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$reply\n");
fclose($myfile2);
bot('sendMessage',[
'chat_id'=>$reply,
'text'=>"شما بن شدید و توانایی ارسال پیام ندارید!",
'parse_mode'=>"HTML",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"حله از ربات بن شد!",
'parse_mode'=>"HTML",
]);}
break;
case '/unban':
$ban = file_get_contents("data/ban.txt");
if($reply != null and $chat_id == $admin){
$ban = file_get_contents("data/ban.txt");
$new = str_replace($reply,'',$ban);
file_put_contents("data/ban.txt","$new");
bot('sendMessage',[
'chat_id'=>$reply,
'text'=>"شما ازاد شدید و توانایی چت دارید!",
'parse_mode'=>"HTML",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"حله از بن درش اوردم!",
'parse_mode'=>"HTML",
]);}
break;
case 'آمار ربات':
if($chat_id == $admin){
$alluser = file_get_contents("data/ozvs.txt");
$alaki = explode("\n",$alluser);
$all = count($alaki)-1;
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد کاربران ربات شما : $all",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]);
}
break;
case 'ارسال پیام':
if($chat_id == $admin){
$user["com"] = "send";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را ارسال کنید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case 'فروارد پیام':
if($chat_id == $admin){
$user["com"] = "for";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خود را به اینجا فروارد کنید!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
case 'راهنما':
if($chat_id == $admin){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"جهت بن کردن فرد از دستور
/ban
و جهت ازاد کرد فرد از دستوز
/unban

استفاده کنید! با تشکر",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$backad,
]);
}
break;
}
switch($com){
case 'mb':
if($text == 'برگشت'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"این کاربر به شما پیام داده
[$chat_id](tg://user?id=$chat_id)

متن پیام :
$text",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"پاسخ","callback_data"=>"pas-$chat_id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سفارش شما به ادمین ارسال گردید بزودی نتیجه آن اعلام میگردد!
",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]); 
break;
case 'sup':
if($text == 'برگشت'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
$stickerid = $update->message->sticker;
$voiceid = $update->message->voice;
$photoid = $update->message->photo;
$musicid = $update->message->audio;
$videoid = $update->message->video;
$fileid = $update->message->document;
if(isset($text)){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"این کاربر به شما پیام داده
[$chat_id](tg://user?id=$chat_id)

متن پیام
$text",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"پاسخ","callback_data"=>"pas-$chat_id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما به ادمین ارسال شد!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$or,
]); 
}else{
$msg_id = bot('ForwardMessage', [
'chat_id' => $admin,
'from_chat_id' =>$chat_id,
'message_id' => $message_id
])->result->message_id;
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"این کاربر به شما پیام داده
[$chat_id](tg://user?id=$chat_id)
",
'parse_mode'=>"markdown",
'reply_to_message_id'=>$msg_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"پاسخ","callback_data"=>"pas-$chat_id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
}
break;
case 'ans':
if($text == '/start'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
$id = file_get_contents("data/id.txt");
bot('sendmessage',[
'chat_id'=>$id,
'text'=>"$text",
'parse_mode'=>"markdown",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"ارسال شد!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"ارسال مجدد","callback_data"=>"pas-$id"]],
],
"resize_keyboard"=>true,'one_time_keyboard' => true,
])
]);
unlink("data/id.txt");
break;
case 'send':
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
$all_member = fopen("data/ozvs.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('sendMessage',[
'chat_id'=>$user,
'text'=>$text,
'parse_mode'=>"MarkDown",
]);
}
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما به همه ی اعضا ارسال شد!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
break;
case 'for':
if($text == '/panel'){
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
exit;
}
$all_member = fopen( "data/ozvs.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}
$user["com"] = "none";
file_put_contents("data/$from_id.json",json_encode($user,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما به همه ی اعضا فروارد شد!",
'parse_mode'=>"HTML",
'reply_to_message_id'=>$message_id,
'reply_markup'=>$panel,
]); 
}
switch($reply){
default;
if($text != "/unban" and $text != "/ban" and $reply != null and $chat_id == $admin){
bot('sendMessage',[
'chat_id'=>$reply,
'text'=>"سلام دوست عزیز پیام زیر از طرف پشتیبانی میباشد!
$text",
'parse_mode'=>"HTML",
]);
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"پیام ارسال شد!",
'parse_mode'=>"HTML",
]);
}
}
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
?>