<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
//@Source_Home
$Co = '';
define('API_KEY',"1034457943:AAGu9dUy0KCdRKUjRdCtVu_1q6h9AFPzDqg");
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
function DeleTeMessaGe($ChatId,$MessageId)
{
bot('deletemessage',['chat_id'=>$ChatId,'message_id'=>$MessageId]);
}
$Admin = '866208602';
$Channel = 'Source_Home';
$Bazdid = 'افزایش بازدید👁‍🗨';
$Help = 'راهنما🆘';
$Account = 'حساب کاربری👤';
$Support = 'پشتیبانی📞';
$Daily = 'امتیاز روزانه⏰';
$S = 'زیرمجموعه گیری🗣';
$Back = 'بازگشت🔙';
$UpData = json_decode(file_get_contents('php://input'));
if(isset($UpDate->message)){
$ChatId = $UpDate->message->chat->id;
$FromId = $UpDate->message->from->id;
$MessageId = $UpDate->message->message_id;
$TextMessage = $UpDate->message->text;
$FirstName = $UpDate->message->from->first_name;
$LastName = $UpDate->message->from->last_name;
$UserName = $UpDate->message->from->username;
$Coin = json_decode(file_get_contents('data'.$FromId.'.json'))->Coin;
$Tabligat = json_decode(file_get_contents('data'.$FromId.'.json'))->Tabligat;
$Step = json_decode(file_get_contents('data'.$FromId.'.json'))->Step;
$Tch = json_decode(file_get_contents("https://api.telegram.org/bot".XD."/getChatMember?chat_id=@".$channel."&user_id=$FromId"))->result->status;
}
$First = bot('GetMe')->result->first_name;
$User = bot('GetMe')->result->username;
$Day = date('j');
$Month = date('F');
$Time = date('H:i:s');
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
$menu_back = json_encode(['keyboard'=>[
[['text'=>$Back]],
],
'resize_keyboard'=>true,
'one_time_keyboard'=>true,
]);
if(strpos($TextMessage == "/start") !== false  && $TextMessage !=="/start"){
$Id = str_replace("/start ","",$TextMessage);
$Count = file_get_contents("Id.txt");
$Explode = explode("\n",$Count);
if(!in_array($FromId,$Explode) && $FromId != $Id){
$File = fopen("Id.txt", "a") or die("Unable to open file!");
fwrite($File, "$FromId\n");
fclose($File);
$U["Step"] = "Null";
$U["Coin"] = 0;
$U["Tabligat"] = 0;
file_put_contents("data/$FromId.json",json_encode($U,true));
$Coin = json_decode(file_get_contents('data'.$Id.'.json'))->Coin;
settype($Coin,"integer");
$U["Coin"] += 1;
file_put_contents('data'.$Id.'.json',json_encode($U,true));
bot('sendMessage',[
'chat_id'=>$Id,
'text'=>"تبریک😇
کاربر <a href='tg://user?id=$FromId'>$FirstName</a> از طریق لینک شما وارد ربات شد✔️
و به همین دلیل به حساب شما یک امتیاز اضافه شد🎗😱",
'parse_mode'=>'html',
]);
bot('sendMessage',[
'chat_id'=>$ChatId,
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
'reply_to_message_id'=>$MessageId,
'reply_markup'=>$menu_start
]); 
}
}
if($TextMessage == '/start')
{
if (!file_exists("data/$FromId.json")) {
$File = fopen("Id.txt", "a") or die("Unable to open file!");
fwrite($File, "$FromId\n");
fclose($File);
$U["Step"] = "Null";
$U["Coin"] = 0;
$U["Tabligat"] = 0;
file_put_contents("data/".$FromId.".json",json_encode($U,true));
}
bot('sendMessage',[
'chat_id'=>$ChatId,
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
'reply_to_message_id'=>$MessageId,
'reply_markup'=>$menu_start
]); 
}
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/