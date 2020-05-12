<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
//@Source_Home
error_reporting(0);
date_default_timezone_set("Asia/Tehran");
define('API_KEY',"[*[TOKEN]*]");

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

function StriNg($length)
{
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
return substr(str_shuffle($chars),0,$length);
}
function DeleTeMessaGe($chat_id,$message_id)
{
bot('deletemessage',['chat_id'=>$chat_id,'message_id'=>$message_id]);
}

$Admin = '[*[ADMIN]*]';
$Sup = '[*[USER]*]';
$Channel = '[*[CHANNEL]*]';
$Bazdid = 'افزایش بازدید👁‍🗨';
$Help = 'راهنما🆘';
$Account = 'حساب کاربری👤';
$Support = 'پشتیبانی📞';
$Daily = 'امتیاز روزانه⏰';
$S = 'زیرمجموعه گیری🗣';
$Back = 'بازگشت🔙';

$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$message_id = $update->message->message_id;
$textmessage = $update->message->text;
$FirstName = $update->message->from->first_name;
$LastName = $update->message->from->last_name;
$UserName = $update->message->from->username;
$Coin = json_decode(file_get_contents('data/'.$from_id.'.json'))->Coin;
$Tabligat = json_decode(file_get_contents('data/'.$from_id.'.json'))->Tabligat;
$Step = json_decode(file_get_contents('data/'.$from_id.'.json'))->Step;
$Time = json_decode(file_get_contents('data/'.$from_id.'.json'))->Time;
$Ch = json_decode(file_get_contents('data.json'))->Ch;
$tch = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@".$Channel."&user_id=$from_id"))->result->status;
}

$First = bot('GetMe')->result->first_name;
$User = bot('GetMe')->result->username;

$Day = date('j');
$Month = date('F');
$W = date('W');
$n = date('n');
$z = date('z');
$Y = date('Y');
$A = date('A');

$menu_start = json_encode(['keyboard'=>[
[['text'=>$Bazdid]],
[['text'=>$Help],['text'=>$Account]],
[['text'=>$Daily]],
[['text'=>$Support],['text'=>$S]],
],
'resize_keyboard'=>true,
'one_time_keyboard'=>true,
]);
$panel = json_encode(['keyboard'=>[
[['text'=>"امار"]],
[['text'=>"فروارد"],['text'=>"پیام همگانی"]],
[['text'=>"تنظیم چنل تبلیغات"]],
[['text'=>$Back]],
],
'resize_keyboard'=>true,
'one_time_keyboard'=>true,
]);
$menu_back = json_encode(['keyboard'=>[
[['text'=>$Back]],
],
'resize_keyboard'=>true,
'one_time_keyboard'=>true,
]);
if (!file_exists("data.json")) {
$X["Ch"] = "AXL";
file_put_contents("data.json",json_encode($X,true));
}

if(strpos($textmessage == "/start") !== false  && $textmessage !=="/start"){
$Id = str_replace("/start ","",$textmessage);
$Count = file_get_contents("Id.txt");
$Explode = explode("\n",$Count);
if(!in_array($from_id,$Explode) && $from_id != $Id){
$File = fopen("Id.txt", "a") or die("Unable to open file!");
fwrite($File, "$from_id\n");
fclose($File);
$U["Step"] = "Null";
$U["Coin"] = 0;
$U["Tabligat"] = 0;
file_put_contents("data/$from_id.json",json_encode($U,true));
$Coin = json_decode(file_get_contents('data/'.$Id.'.json'))->Coin;
settype($Coin,"integer");
$U["Coin"] += 1;
file_put_contents('data/'.$Id.'.json',json_encode($U,true));
bot('sendMessage',[
'chat_id'=>$Id,
'text'=>"تبریک😇
کاربر <a href='tg://user?id=$from_id'>$FirstName</a> از طریق لینک شما وارد ربات شد✔️
و به همین دلیل به حساب شما یک امتیاز اضافه شد🎗😱",
'parse_mode'=>'html',
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سلام✋
به ربات $First خوش آمدید🤓
شما با استفاده از ربات $First به راحتی و خیلی راحت به پست های خود سین بزنید🥳
میگید چطوری؟؟؟
خب کاری نداره😳
فقط کافیه سکه جمع کنی و بری به بخش افزایش سین و پست خودت رو فروارد کنی تا به پستت سین اضافه شه😜
چرا منتظری یکی از گزینه ها رو انتخاب کن⬇️
@".$Channel."\n"."@".$User,
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id,
'reply_markup'=>$menu_start
]); 
}
}
if($textmessage == '/start')
{
if (!file_exists("data/$from_id.json")) {
$File = fopen("Id.txt", "a") or die("Unable to open file!");
fwrite($File, "$from_id\n");
fclose($File);
$U["Step"] = "Null";
$U["Coin"] = 0;
$U["Tabligat"] = 0;
file_put_contents("data/".$from_id.".json",json_encode($U,true));
}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سلام✋
به ربات $First خوش آمدید🤓
شما با استفاده از ربات $First به راحتی و خیلی راحت به پست های خود سین بزنید🥳
میگید چطوری؟؟؟
خب کاری نداره😳
فقط کافیه سکه جمع کنی و بری به بخش افزایش سین و پست خودت رو فروارد کنی تا به پستت سین اضافه شه😜
چرا منتظری یکی از گزینه ها رو انتخاب کن⬇️
@".$Channel."\n"."@".$User,
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id,
'reply_markup'=>$menu_start
]); 
}
else if(!in_array($tch,['member','creator','administrator']))
{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"کاربر گرامی $first_name🗣
برای استفاده از ربات ابتدا باید در چنل های ما عضو شوید‼️
از کیبورد زیر استفاده کنید ⬇️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[
        [['text'=>'عضویت در چنل اول📲','url'=>'https://t.me/[*[CHANNEL]*]']],
  [['text'=>'تایید عضویت✅','callback_data'=>'imjoin']],
    ],])
]);
return false;
}
///////////////₩¥//////////////////
else if($data == 'imjoin')
{
	if(!in_array($tch,['member','creator','administrator']) )
	{
		bot('answerCallbackQuery',['callback_query_id'=>$update['callback_query']['id'],
            'text'=>"لطفا ابتدا در چنل های ما عضو شوید‼️",'show_alert'=>true]);
	}
	else
	{
	bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سلام✋
به ربات $First خوش آمدید🤓
شما با استفاده از ربات $First به راحتی و خیلی راحت به پست های خود سین بزنید🥳
میگید چطوری؟؟؟
خب کاری نداره😳
فقط کافیه سکه جمع کنی و بری به بخش افزایش سین و پست خودت رو فروارد کنی تا به پستت سین اضافه شه😜
چرا منتظری یکی از گزینه ها رو انتخاب کن⬇️
@".$Channel."\n"."@".$User,
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id,
'reply_markup'=>$menu_start
]); 
	}
}
if($textmessage == $Back)
{
$U = json_decode(file_get_contents('data/'.$from_id.'.json'),true);
$U["Step"] = "Null";
file_put_contents("data/".$from_id.".json",json_encode($U,true));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
سلام✋
به ربات $First خوش آمدید🤓
شما با استفاده از ربات $First به راحتی و خیلی راحت به پست های خود سین بزنید🥳
میگید چطوری؟؟؟
خب کاری نداره😳
فقط کافیه سکه جمع کنی و بری به بخش افزایش سین و پست خودت رو فروارد کنی تا به پستت سین اضافه شه😜
چرا منتظری یکی از گزینه ها رو انتخاب کن⬇️
@".$Channel."\n"."@".$User,
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id,
'reply_markup'=>$menu_start
]); 
}
if($textmessage == $Account)
{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"وضعیت حساب کاربری شما به شرح زیر میباشد⬇️✔️
تعداد سکه های شما : $Coin 💰
تعداد سفارشات ثبت شده توسط شما : $Tabligat 🗓",
'parse_mode'=>'html',
'reply_to_message_id'=>$message_id,
'reply_markup'=>$menu_start
]); 
}
if($textmessage == $Help)
{
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => 'به بخش راهنمای ربات خوش آمدید🌹 
راهنمای ربات به شرح واضح و روان ⬇️ 
بخش افزایش بازدید👁‍🗨 : در بخش افزایش بازدید شما تنها کاری که باید انجام بدهید جمع آوری سکه جهت ثبت تبلیغ میباشد 
بخش حساب کاربری👤 :
 در بخش حساب کاربری شما میتوانید اطلاعاتی مانند ( تعداد  ها , تعداد تبلیغات ثبت شده شما و .... را بدست آوردید
بخش راهنما 📝 :
دریافت مجدد همین پیام' ,
'reply_markup' => $menu_back ,
'reply_to_message_id' => $message_id 
]);
}
elseif($textmessage == $Daily)
{
$c = rand(1,4);
$date = Date("Y/m/d");
if($Time == $date)
{
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => 'کاربر گرامی شما قبلا امتیاز روزانه خود را دریافت کرده اید🎗
جهت دریافت دوباره امتیاز روزانه 24 ساعت دیگر امتحان کنید💣
' ,
'reply_markup' => $menu_back ,
'reply_to_message_id' => $message_id 
]);
}else{
$U = json_decode(file_get_contents('data/'.$from_id.'.json'),true);
$U['Time'] = $date;
$U['Coin'] += $c;
file_put_contents("data/$from_id.json",json_encode($U,true));
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => "تبریک😋
شما امروز برنده $c سکه شدید😚
جهت دریافت سکه های بیشتر 24 ساعت دیگر امتحان کنید💣
",
'reply_markup' => $menu_back ,
'reply_to_message_id' => $message_id 
]);
}
}
if($textmessage == $Support)
{
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => '📞 جهت ارتباط با بخش پشتیبانی پیام خود را به نشانی زیر ارسال نمایید:
@'.$Sup.'

👈🏻 جهت رسیدگی سریعتر حتی الامکان متن پیام خود را در قالب یک پیام ارسال نمایید و از ارسال پیام های پی در پی بپرهیزید.


👈🏻  سعی بخش پشتیبانی بر این است که تمامی پیام های دریافتی در کمتر از ۱۲ ساعت پاسخ داده شوند.

👈🏻 پس از ارسال پیام تا زمان دریافت پاسخ صبور باشید.
' ,
'reply_markup' => $menu_back ,
'reply_to_message_id' => $message_id 
]);
}
if($textmessage == $Bazdid)
{
if($Ch == "AXL"){
bot("SendMessage" ,[
'chat_id' => $chat_id ,
'text' => "چنل تبلیغات تنظیم نشده است",
'message_id' => $message_id ,
'reply_to_message_id' => $message_id,
'reply_markup' => $menu_back
]);
exit();
}
if($Coin >= 4)
{
$U = json_decode(file_get_contents('data/'.$from_id.'.json'),true);
$U["Step"] = "seen";
file_put_contents("data/$from_id.json",json_encode($U,true));
bot("SendMessage" ,[
'chat_id' => $chat_id ,
'text' => "لطفا پست خود را جهت افزایش بازدید آن فروارد کنید📥
",
'message_id' => $message_id ,
'reply_to_message_id' => $message_id,
'reply_markup' => $menu_back
]);
}else{
bot("SendMessage" ,[
'chat_id' => $chat_id ,
'text' => "کاربر گرامی👤
تعداد سکه های لازم برای ورود به این بخش 4 است🔑
تعداد سکه های شما : $Coin",
'message_id' => $message_id ,
'reply_to_message_id' => $message_id,
'reply_markup' => $menu_back
]);
}
}
if($Step == "seen" && $textmessage != $Back)
{
if($update->message->forward_from_chat->type == 'channel')
{
bot('ForwardMessage', [
'chat_id' => $Ch,
'from_chat_id' => $chat_id,
'message_id' => $message_id
]);
$get = bot('getChatMembersCount',[
'chat_id'=>$Ch,
]);
$count = $get->result;
$members = $count -2;
bot("SendMessage" ,[
'chat_id' => $chat_id ,
'text' => "سفارش شما باموفقیت ثبت گردید✅
تا دقایقی دیگر به پست ارسال شما تعداد $members بازدید اضافه میشود💠",
'message_id' => $message_id ,
'reply_to_message_id' => $message_id,
'reply_markup' => $menu_back
]);
$U = json_decode(file_get_contents('data/'.$from_id.'.json'),true);
$U["Step"] = "n";
$U["Coin"] -= 4;
$U["Tabligat"] += 1;
file_put_contents("data/$from_id.json",json_encode($U));
}else{
bot("SendMessage" ,[
'chat_id' => $chat_id ,
'text' => "لطفا پیام خود را از یک چنل فروارد کنید➕",
'message_id' => $message_id ,
'reply_to_message_id' => $message_id,
'reply_markup' => $menu_back
]);
}
}
if($textmessage == $S)
{
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' =>"⚡️ با $First به راحتی بازدید بگیرید!

👁‍🗨 افزایش بازدید پستهای تلگرامی
💯 سریع، رایگان و بدون آفلاینی

📌 همین حالا رایگان امتحان کن👇👇👇

https://t.me/$User?start=$from_id",
'reply_to_message_id' => $message_id 
]);
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => 'بنر بالا بنر شماست✔️⬆️
با پخش بنر بالا در گروه ها و چنل های خود با ورود هر نفر از طریق لینک شما 1 سکه دریافت میکنید',
'reply_markup' => $menu_back ,
'reply_to_message_id' => $message_id 
]);
}
if($from_id == $Admin){
if($textmessage == "/panel")
{
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => '⬇️',
'reply_markup' => $panel ,
'reply_to_message_id' => $message_id 
]);
}
if($textmessage == "امار")
{
$Count = file_get_contents("Id.txt");
	$id = explode("\n",$Count);
    $Member = count($id)-1;
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => "تعداد کاربران ربات شما برابر است با : $Member",
'reply_markup' => $panel ,
'reply_to_message_id' => $message_id 
]);
}
if($textmessage == "پیام همگانی")
{
$U = json_decode(file_get_contents('data/'.$from_id.'.json'),true);
$U["Step"] = "sendall";
file_put_contents("data/$from_id.json",json_encode($U,true));
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => "پیام خود را ارسال کنید.",
'reply_markup' => $panel ,
'reply_to_message_id' => $message_id 
]);
}
if($Step == "sendall")
{
$U = json_decode(file_get_contents('data/'.$from_id.'.json'),true);
$U["Step"] = "Null";
file_put_contents("data/$from_id.json",json_encode($U,true));
$all_member = fopen( "Id.txt", 'r');
	while( !feof( $all_member)) {
 	$user = fgets( $all_member);
  bot('sendMessage',[
 'chat_id'=>$user,
 'text'=>$textmessage,
 'parse_mode'=>"MarkDown",
  ]);
}
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => "پیام شما باموفقیت به تمام کاربران ارسال شد",
'reply_markup' => $panel ,
'reply_to_message_id' => $message_id 
]);
}
if($textmessage == "فروارد")
{
$U = json_decode(file_get_contents('data/'.$from_id.'.json'),true);
$U["Step"] = "fwd";
file_put_contents("data/$from_id.json",json_encode($U,true));
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => "پیام خود را فروارد کنید.",
'reply_markup' => $panel ,
'reply_to_message_id' => $message_id 
]);
}
if($Step == "fwd")
{
$U = json_decode(file_get_contents('data/'.$from_id.'.json'),true);
$U["Step"] = "Null";
file_put_contents("data/$from_id.json",json_encode($U,true));
$all_member = fopen( "Id.txt", 'r');
	while( !feof( $all_member)) {
 	$user = fgets( $all_member);
  bot('ForwardMessage',[
 'chat_id'=>$user,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message_id,
  ]);
}
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => "پیام شما باموفقیت به تمام کاربران فروارد شد",
'reply_markup' => $panel ,
'reply_to_message_id' => $message_id 
]);
}
if($textmessage == "تنظیم چنل تبلیغات")
{
$U = json_decode(file_get_contents('data/'.$from_id.'.json'),true);
$U["Step"] = "ch";
file_put_contents("data/$from_id.json",json_encode($U,true));
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => "لطفا ایدی یا ایدی عددی چنل تبلیغات را ارسال کنید.",
'reply_markup' => $panel ,
'reply_to_message_id' => $message_id 
]);
}
if($Step == "ch")
{
$U = json_decode(file_get_contents('data/'.$from_id.'.json'),true);
$U["Step"] = "Null";
file_put_contents("data/$from_id.json",json_encode($U,true));
$Z = json_decode(file_get_contents('data.json'),true);
$Z["Ch"] = "$textmessage";
file_put_contents("data.json",json_encode($Z,true));
bot("SendMessage",[
"chat_id" => $chat_id ,
'text' => "چنل تبلیغات با موفقیت تنظیم شد.",
'reply_markup' => $panel ,
'reply_to_message_id' => $message_id 
]);
}
}
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/