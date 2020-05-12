<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
//@Source_Home
define('API_KEY',"[*[TOKEN]*]");//توکن
function mad($method,$datas=[]){
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
//=================================================//
function sendmessage($chat_id,$text,$parse_mode,$keyboard){
	mad('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$parse_mode,
	'reply_markup'=>$keyboard
	]);
}
function em($chatid,$message_id,$parsmde,$text,$keyboard){
    mad('editmessagetext',[ 
    'chat_id'=>$chatid, 
    'message_id'=>$message_id,
    'text'=>$text,
    'parse_mode'=>$parsmde,
    'reply_markup'=>$keyboard
	]);
	}
	function ForwardMessage($kojashe,$azkoja,$kodomMSG)
{
    mad('ForwardMessage',[
        'chat_id'=>$kojashe,
        'from_chat_id'=>$azkoja,
        'message_id'=>$kodomMSG
        ]);
}
function SendPhoto($chat_id, $photo, $caption, $messageid, $keyboard){
	mad('SendPhoto',[
    'chat_id'=>$chat_id,
    'photo'=>$photo,
    'caption'=>$caption,
    'reply_to_message_id'=>$messageid,
    'reply_markup'=>$keyboard
     ]);
     }
     function save($filename,$TXTdata){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
//===============
$dev = "[*[ADMIN]*]";//ایدی عددی
$token ="[*[TOKEN]*]";//توکن
$channel = "@[*[CHANNEL]*]";//ایدی چنل یا @
$BotId = "[*[IDBOT]*]"; // بدون@ایدی بات
//========================
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$message_id = $update->message->message_id;
$data = isset($message->text)?$message->text:$update->callback_query->data;
$chat_id = isset($update->callback_query->message->chat->id)?$update->callback_query->message->chat->id:$update->message->chat->id;
$text = $update->message->text;
$b = file_get_contents("type.txt");
$mi = isset($update->callback_query->message->message_id)?$update->callback_query->message->message_id:null;
$first_n = $update->message->from->first_name;
$last_n = $update->message->from->last_name;
$first = $update->callback_query->from->first_name;
$last = $update->callback_query->from->last_name;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$channel&user_id=".$chat_id));
$channel_check = $truechannel->result->status;
//================
$user = json_decode(file_get_contents("data/user.json"),true);
$step = json_decode(file_get_contents("data/$chat_id.json"),true);
$invited = $step["userinfo"]["$chat_id"]["invite"];
//=====================================================//
$start = json_encode(['inline_keyboard'=>[
[['text'=>"دریافت شماره دیگران","callback_data"=>"der"]],
],'resize_keyboard'=>true]);
$bk = json_encode(['inline_keyboard'=>[
[['text'=>"back","callback_data"=>"lag"]],
],'resize_keyboard'=>true]);
$laghvdar = json_encode(['inline_keyboard'=>[
[['text'=>"دریافت شماره","callback_data"=>"der"]],
[['text'=>"لغو","callback_data"=>"lag"]],
],'resize_keyboard'=>true]);
$link = json_encode(['inline_keyboard'=>[
[['text'=>"دریافت لینک دعوت","callback_data"=>"linke"]],
],'resize_keyboard'=>true]);
$chan = json_encode(['inline_keyboard'=>[
[['text'=>"چند نفر دعوت کردم؟","callback_data"=>"ader"]],
[['text'=>"برگشت به منوی اصلی","callback_data"=>"lag"]],
],'resize_keyboard'=>true]);
$panel = json_encode(['inline_keyboard'=>[
[['text'=>"امار بات📊","callback_data"=>"menn"]],
[['text'=>"پیام همگانی📡","callback_data"=>"hjk"],['text'=>"فوروارد همگانی🔻","callback_data"=>"FTA"]],
[['text'=>"بازگشت🔙","callback_data"=>"lag"]],
],'resize_keyboard'=>true]);
//===========//
if(!in_array($chat_id,$user["listusers"]) == true) {
$user["listusers"][]="$chat_id";
$user = json_encode($user,128|256);
file_put_contents("data/user.json",$user);
}
if ($text =="/start"){
if(!file_exists("data/$chat_id.json")){
$step["userinfo"]["$chat_id"]["state"]= "none";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"عضویت شما تایید شد 🥳

سلام  $first_n$last_n عزیز🤓
به ربات شماره یاب خوش اومدین🌹
با این ربات میتونی شماره هرکی رو که میخوای
به صورت انی و بدون هزینه در بیاری☎️

📲برای دریافت شماره دیگران دکمه پایین رو لمس کنید👇","HTML",$start);
}else{
sendmessage($chat_id,"سلام  $first_n$last_n عزیز🤓
به ربات شماره یاب خوش اومدین🌹
با این ربات میتونی شماره هرکی رو که میخوای
به صورت انی و بدون هزینه در بیاری☎️

📲برای دریافت شماره دیگران دکمه پایین رو لمس کنید👇","HTML",$start);
}}
elseif(strpos($text , '/start ') !== false  ) {
$sdfg = str_replace("/start ","",$text);
if(in_array($chat_id, $user["listusers"])) {
sendmessage($chat_id,"😐خودت که نمی تونی عضو ربات بشی ! 📌چون قبلاً عضو بودی","HTML",null);
}else 
{	
$inuser = json_decode(file_get_contents("data/$sdfg.json"),true);
$member = $inuser["userinfo"]["$sdfg"]["invite"];
$memberplus = $member + 1;
sendmessage($sdfg,"🎉 کاربر $first_n$last_n با استفاده از لینک دعوتت وارد  شد
🎈 تعداد افرادی که دعوت کرده اید : $memberplus","HTML",$start);
sendmessage($chat_id,"عضویت شما تایید شد 🥳

سلام  $first_n$last_n عزیز🤓
به ربات شماره یاب خوش اومدین🌹
با این ربات میتونی شماره هرکی رو که میخوای
به صورت انی و بدون هزینه در بیاری☎️

📲برای دریافت شماره دیگران دکمه پایین رو لمس کنید👇","HTML",$start);
$inuser["userinfo"]["$sdfg"]["invite"]="$memberplus";
$inuser = json_encode($inuser,true);
file_put_contents("data/$sdfg.json",$inuser);
$step["userinfo"]["$chat_id"]["file"]="none";
$step["userinfo"]["$chat_id"]["invite"]="0";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);	
}}
if($channel_check != 'member' && $channel_check != 'creator' && $channel_check != 'administrator'){
    sendMessage($chat_id,"💎 برای استفاده از ربات لازم است ابتدا عضو کانال  :
        
    🔸 $channel
    شوید سپس بر روی /start کلیک کنید ! ","HTML",null);
    return false;
    }
    if($text){
if($b =="n"){
sendmessage($chat_id,"ساخت بهترین ربات ها با پرو نایت🤠💎
@Source_Home","HTML",null);    
}
}
$forward_user = $update->message->forward_from->username;
$forward_first = $update->message->forward_from->first_name;
$forward_id = $update->message->forward_from->id;
	if($forward_user != null){
    SendPhoto($chat_id,"http://t.me/$forward_user","شماره مورد نظر یافت شد✅
نام : $forward_first
ایدی تلگرام : @$forward_user
ایدی عددی : $forward_id
پیوی کاربر : $forward_user
جهت دریافت شماره کاربر مورد نظر از دکمه زیر استفاده کنید👇👇👇","",$laghvdar);
}
if($data =="der"){
if($step["userinfo"]["$chat_id"]["invite"]<="0"){
    sendmessage($chat_id,"🔻 به علت هزینه های سنگین نگه داری شماره ها روی سرور برای استفاده از  ربات میتوانید 5 نفر را دعوت و به صورت نامحدود از ربات استفاده کنید.

➕ برای دعوت لینک شخصی خود و دعوت دوستان روی دکمه دریافت لینک شخصی من کلیک کنید.","HTML",$link);
}else{
sendmessage($chat_id," این فقط یه شوخی بود تا یه خورده اذیت بشی خخخ","HTML",$bk);
}}
if($data =="linke"){
    Sendmessage($chat_id,"✅ اولین ربات شماره یاب در تلگرام
ازین به بعد شماره همه رو میتونی پیدا کنی راحت
کافیه تو ربات زیر جوین شی بعد شماره هرکیو خواستی پیدا کنی ☺️

✅ رایگان و کاملا واقعی 😎👌
امتحانش کن فقط 👇🏻👇🏻\nhttps://t.me/$BotId?start=$chat_id","",null);
sendmessage($chat_id,"بنر بالا رو پخش کن","HTML",$chan);
}
if($data =="lag"){
$step["userinfo"]["$chat_id"]["state"]="none";
        $step = json_encode($step,true);
        file_put_contents("data/$chat_id.json",$step);
    sendmessage($chat_id,"به منوی اصلی خوش امدید","HTML",$start);
}
if($data =="ader"){
    sendmessage($chat_id,"به افراد دعوت شده : $invited","HTML",$bk);
}
$bka = json_encode(['inline_keyboard'=>[
[['text'=>"back","callback_data"=>"laga"]],
],'resize_keyboard'=>true]);
if($data =="laga"){
$step["userinfo"]["$chat_id"]["state"]="none";
        $step = json_encode($step,true);
        file_put_contents("data/$chat_id.json",$step);
    sendmessage($chat_id,"به پنل خوش امدید","HTML",$panel);
}
if($text =="/panel" && $chat_id == $dev){
    sendmessage($chat_id,"hi admin","HTML",$panel);
}
$member23 = count($user["listusers"]);
if($data =="menn" && $chat_id == $dev){
    em($chat_id,$mi,"HTML","ممبرای شما : $member23 ",$bka);
}
if($data =="FTA" && $chat_id == $dev){
$step["userinfo"]["$chat_id"]["state"]= "FTA";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
em($chat_id,$mi,"HTML","send your message",$bka);
}
if($step["userinfo"]["$chat_id"]["state"] == "FTA" && $data !="laga"){
foreach($user["listusers"] as $userpm){
ForwardMessage($userpm,$dev,$message_id);
}
$step["userinfo"]["$chat_id"]["state"]= "none";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"its don","HTML",$bka);
}
if($data =="hjk" && $chat_id == $dev){
$step["userinfo"]["$chat_id"]["state"]= "STA";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
em($chat_id,$mi,"HTML","send your message",$bka);
}
if($step["userinfo"]["$chat_id"]["state"] == "STA" && $data !="laga"){
foreach($user["listusers"] as $userpm){
sendmessage($userpm,$text,"HTML",null);
}
$step["userinfo"]["$chat_id"]["state"]= "none";
$step = json_encode($step,true);
file_put_contents("data/$chat_id.json",$step);
sendmessage($chat_id,"its don","HTML",$bka);
}
unlink('error_log');
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
?>