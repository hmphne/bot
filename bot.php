<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
error_reporting(0);
define('API_KEY','توکن');
//@Source_Home
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
function objectToArrays($object){
if( !is_object($object)&&!is_array($object)){
return $object;
}
if(is_object( $object )){
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
 function rand_string( $length = 18 ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
return substr(str_shuffle($chars),0,$length);
}
$hash = rand_string(12);
function del($chat_id,$message_id)
{
	bot('deletemessage',['chat_id'=>$chat_id,'message_id'=>$message_id]);
	}
function apiRequest($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }
  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }
  foreach ($parameters as $key => &$val) {
    // encoding to JSON array parameters, for example reply_markup
    if (!is_numeric($val) && !is_string($val)) {
      $val = json_encode($val);
    }
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
}
//@Source_Home

$xgs = "@چنل ربات های ساخته شده";
    $update = json_decode(file_get_contents('php://input'));
    $connect = new mysqli("localhost","username","pass","db");
if(isset($update->message)){
    //Message
    $chat_id = $update->message->chat->id;
    $from_id = $update->message->from->id;
    $message_id = $update->message->message_id;
    $textmessage = $update->message->text;
    $first_name = $update->message->from->first_name;
    $username = $update->message->from->username;
    $ccontact = $update->message->contact;
    $cnumber = $update->message->contact->phone_number;
    $cnumber = $update->message->contact->first_name;
    @$users = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    @$members = $users['id'];
    @$step = $users['step'];
    @$coin = $users['coin'];
    @$endbots = $users['endbots'];
    @$bots = $users['bots'];
    @$channel = $users['channel'];
    @$phone = $users['phone'];
    @$code = $users['code'];
    @$codee = $users['codee'];
    $tch = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@Source_Home&user_id=$from_id"))->result->status;
    $tch2 = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@Source_Home&user_id=$from_id"))->result->status;
}else if(isset($update->callback_query)){
    $chat_id = $update->callback_query->message->chat->id;
    $from_id = $update->callback_query->from->id;
    $data = $update->callback_query->data;
    $message_id = $update->callback_query->message->message_id;
    @$users = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    @$members = $users['id'];
    @$step = $users['step'];
    @$coin = $users['coin'];
    @$endbots = $users['endbots'];
    @$bots = $users['bots'];
    @$channel = $users['channel'];
    @$phone = $users['phone'];
    @$code = $users['code'];
    @$codee = $users['codee'];
    $tch = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@Source_Home&user_id=$from_id"))->result->status;
    $tch2 = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@Source_Home&user_id=$from_id"))->result->status;
}
        $menu = json_encode([
        'keyboard'=>[
        [['text'=>"ساخت ربات Api📑"]],
        [['text'=>"حذف ربات🗑"],['text'=>"ساخت ربات آنلاین🔦"]],
        [['text'=>"حساب کاربری💠"],['text'=>"ویژه کردن ربات💣"],['text'=>"راهنما 🆘"]],
        [['text'=>"پشتیبانی☎️"],['text'=>"زیرمجموعه گیری🗣"]],
        [['text'=>"افزایش فرصت ساخت ربات🎗"]],
        ],
        'resize_keyboard'=>true,'one_time_keyboard'=>true,
        ]);
        $account = json_encode([
        'inline_keyboard'=>[
        [['text'=>"شناسه عددی","callback_data"=>"pro"],['text'=>$from_id,"callback_data"=>"pro"]],
        [['text'=>"تعداد ربات ها","callback_data"=>"pro"],['text'=>$bots,"callback_data"=>"pro"]],
        [['text'=>"تعداد سکه ها","callback_data"=>"pro"],['text'=>$coin,"callback_data"=>"pro"]],
        [['text'=>"فرصت های ساخت ربات","callback_data"=>"pro"],['text'=>$endbots,"callback_data"=>"pro"]],
        ],
        'resize_keyboard'=>true,'one_time_keyboard'=>true,
        ]);
        $help = json_encode([
        'inline_keyboard'=>[
        [['text'=>"راهنمای ساخت ربات⚙","callback_data"=>"create"]],
        [['text'=>'بازگشت🔙',"callback_data"=>"bac"]],
        ],
        'resize_keyboard'=>true,'one_time_keyboard'=>true,
        ]);
        $shop = json_encode([
        'inline_keyboard'=>[
        [['text'=>"خرید فرصت ساخت ربات🛒","callback_data"=>"forsat"],['text'=>'خرید سکه🛒',"callback_data"=>"seke"]],
        [['text'=>'بازگشت🔙',"callback_data"=>"bac"]],
        ],
        'resize_keyboard'=>true,'one_time_keyboard'=>true,
        ]);
$back = json_encode([
    'keyboard'=>[
    [['text'=>'بازگشت🔙']],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
]);
$ba = json_encode([
    'inline_keyboard'=>[
    [['text'=>'بازگشت🔙',"callback_data"=>"back"]],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
]);
$create = json_encode([
    'keyboard'=>[    
    [['text'=>'دریافت شماره(واقعی)📲'],['text'=>'ویوپنل👁‍🗨']],  
    [['text'=>'دریافت شماره(فیک)💣'],['text'=>'عکس کارتونی(فیک)🌌'],['text'=>'رمانستان🎗']],  
    [['text'=>'ویس سیتی🗣'],['text'=>'پیام رسان📩']],  
    [['text'=>'بازگشت🔙']],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
]);
$cli = json_encode([
    'keyboard'=>[    
    [['text'=>'کلیکر📯']],
    [['text'=>'بازگشت🔙']],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
]);
$panel = json_encode([
    'keyboard'=>[
    [['text'=>'آمار ربات📊'],['text'=>'حذف ربات📌']],
    [['text'=>'افزایش امتیاز➕'],['text'=>'تعداد ربات ها🧨'],['text'=>'کسر امتیاز➖']],
    [['text'=>'فروارد همگانی📬'],['text'=>'پیام همگانی📨']],
    [['text'=>'بازگشت🔙']],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
]);
///////////////₩¥//////////////////
if($power == "off" && !in_array($chat_id,[1013521973,936407289])){
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"
رباتساز پرو نایت به دستور ادمین خاموش شده است😕
لطفا ساعتی دیگر دوباره به ربات دستور /start را ارسال کنید🎗
@Source_Home
@Source_Home
",'parse_mode'=>"HTML"]);
exit();
}
if(strpos($textmessage, "/start") !== false && $textmessage !="/start"){
    $id = str_replace(['/start',' '],null,$textmessage);
bot('senddocument',['chat_id'=>$from_id,'document'=>"http://mohammad.zmizban.xyz/bang-bang/v.gif",'caption'=>"سلام $first_name🙃
به رباتساز پرو نایت بهترین و متفاوت ترین ربات ساز تلگرام خوش اومدی🤘🤪
با استفاده از رباتساز رو نایت میتوانید به راحتی برای خود ربات ایجاد کنید⚡️
رایگان و پرسرعت🤠
بدون یک خط کد نویسی میتوانید صاحب ربات خود شوید😻
لطفا یک گزینه را انتخاب کنید👇
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$menu]);
if(is_numeric($id) && $members!= true && $from_id != $id){
    $connect->query("INSERT INTO `data` (`id`,`step`,`coin`,`bots`,`channel`,`endbots`,`phone`,`code`,`codee`) VALUES ('$from_id','no','0','0','n','2','0','0','0');");
    @$user1 = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$id'"));
    $coins = $user1["coin"];
    $newcoin = $coins + 1;
    $connect->query("UPDATE `data` SET `coin` = '$newcoin' WHERE `id` = '$id';");
    bot('sendmessage',['chat_id'=>$id,'text'=>"تبریک🎗
یک کاربر از طریق لینک شما وارد ربات شد و به حساب کاربری شما 1 سکه اضافه گردید😋
",'parse_mode'=>"HTML"]);
 }
}
///////////////₩¥//////////////////
if ($members != true)
{
    $connect->query("INSERT INTO `data` (`id`,`step`,`coin`,`bots`,`channel`,`endbots`,`phone`,`code`,`codee`) VALUES ('$from_id','no','0','0','n','2','0','0','0');");
}
///////////////₩¥//////////////////
if($textmessage == "/start")
{
    $connect->query("UPDATE `data` SET `step` = 'no' WHERE `id` = '$from_id';");
    bot('senddocument',['chat_id'=>$from_id,'document'=>"http://mohammad.zmizban.xyz/bang-bang/v.gif",'caption'=>"سلام $first_name🙃
به رباتساز پرو نایت بهترین و متفاوت ترین ربات ساز تلگرام خوش اومدی🤘🤪
با استفاده از رباتساز رو نایت میتوانید به راحتی برای خود ربات ایجاد کنید⚡️
رایگان و پرسرعت🤠
بدون یک خط کد نویسی میتوانید صاحب ربات خود شوید😻
لطفا یک گزینه را انتخاب کنید👇",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$menu]);
}
///////////////₩¥//////////////////
else if($textmessage == "بازگشت🔙")
{
    $connect->query("UPDATE `data` SET `step` = 'no' WHERE `id` = '$from_id';");
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"به منوی اصلی خوش آمدید💣
یک گزینه را انتخاب نمایید⬇️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$menu]);
}
///////////////₩¥//////////////////
else if(!in_array($tch,['member','creator','administrator']) || !in_array($tch2,['member','creator','administrator']))
{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"کاربر گرامی $first_name🗣
برای استفاده از ربات ابتدا باید در چنل های ما عضو شوید‼️
از کیبورد زیر استفاده کنید ⬇️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[
        [['text'=>'عضویت در چنل اول📲','url'=>'https://t.me/Source_Home']],
  [['text'=>'عضویت در چنل دوم🏵','url'=>'https://t.me/Source_Home']],
  [['text'=>'تایید عضویت✅','callback_data'=>'imjoin']],
    ],])
]);
return false;
}
///////////////₩¥//////////////////
else if($data == 'imjoin')
{
	if(!in_array($tch,['member','creator','administrator']) || !in_array($tch2,['member','creator','administrator']))
	{
		bot('answerCallbackQuery',['callback_query_id'=>$update['callback_query']['id'],
            'text'=>"لطفا ابتدا در چنل های ما عضو شوید‼️",'show_alert'=>true]);
	}
	else
	{
	del($chat_id,$message_id);
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"سلام $first_name🙃
به رباتساز پرو نایت بهترین و متفاوت ترین ربات ساز تلگرام خوش اومدی🤘🤪
با استفاده از رباتساز رو نایت میتوانید به راحتی برای خود ربات ایجاد کنید⚡️
رایگان و پرسرعت🤠
بدون یک خط کد نویسی میتوانید صاحب ربات خود شوید😻
لطفا یک گزینه را انتخاب کنید👇",'parse_mode'=>"HTML",'reply_markup'=>$menu]);
	}
}
///////////////₩¥//////////////////
if($textmessage == "ساخت ربات Api📑")
{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"لطفا ربات مورد نظر خود را جهت ساخت انتخاب نمایید:🛠",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$create]);
}
if($textmessage == "زیرمجموعه گیری🗣")
{
 bot('senddocument',['chat_id'=>$from_id,'document'=>"https://mad.irancpanel.info/Pro/doc_2019-10-14_21-03-33.mp4",'caption'=>"تاحالا دلت خواسته ربات داشته باشی⁉️
پرسرعت و با جذب بالا🏎
بدون افی🚥
خواستی اما هاست و سرور برای ساخت نداشتی😔
خب این که غصه نداره 🙄
ربات ساز پرو نایت اومده و تمام این مشکلاتو حل کرده😳
کافیه از طریق لینک زیر وارد ربات شی و رباتت رو بسازی🤠👇
https://t.me/Source_Home?start=$chat_id",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}
if($textmessage == "پشتیبانی☎️")
{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"📞 جهت ارتباط با بخش پشتیبانی پیام خود را به نشانی زیر ارسال نمایید:
@Source_Home

👈🏻 جهت رسیدگی سریعتر حتی الامکان متن پیام خود را در قالب یک پیام ارسال نمایید و از ارسال پیام های پی در پی بپرهیزید.


👈🏻  سعی بخش پشتیبانی بر این است که تمامی پیام های دریافتی در کمتر از ۱۲ ساعت پاسخ داده شوند.

👈🏻 پس از ارسال پیام تا زمان دریافت پاسخ صبور باشید.",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id]);
}
if($textmessage == "راهنما 🆘")
{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"لطفا گزینه مورد نظر خود را انتخاب کنید:⬇️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$help]);
}
///////////////₩¥//////////////////
if($data == "back")
{
bot('editmessagetext',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"لطفا گزینه مورد نظر خود را انتخاب کنید:⬇️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$help]);
}
if($data == "bac")
{
bot('editmessagetext',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"این منو بسته شد.",'parse_mode'=>"HTML",]);
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"به منوی اصلی خوش آمدید💣
یک گزینه را انتخاب نمایید⬇️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$menu]);
}
if($data == "delete")
{
bot('editmessagetext',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"به بخش راهنمای [ حذف ربات ] خوش آمدید💠

راهنمای حذف ربات به صورت ساده و روان به شرح زیر میباشد⬇️

1 - ابتدا از منوی اصلی بر روی دکمه [ لیست رباتام🧰 ] کلیک میکنید و ربات خود را انتخاب میکنید

2 - سپس از منوی ظاهر شده بر روی دکمه [ حذف ربات🗑 ] کلیک میکنید و تایید میکنید

3 - ربات شما حذف شد.
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$ba]);
}
if($data == "create")
{
bot('editmessagetext',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"به بخش راهنمای [ ساخت ربات ]  خوش امدید💥

راهنمای ساخت به صورت ساده و روان به شرح زیر میباشد:⬇️

1 - ابتدا به ربات @botfather بروید و/newbot را ارسال کنید.

2 - سپس نام ربات خود را وارد کنید .

 3 - پس از فرستاد نام ربات پیامی مانند [ Good. Now let's choose a username for your bot. It must end in bot. Like this, for example: TetrisBot or tetris_bot. ]
در اینجا شما باید آیدی ربات خود را وارد کنید .
توجه حتما در آخر ایدی وارد شده باید کلمه [ bot ] وجود داشته باشد

4 - چنانچه آیدی استفاده نشده بود برای شما توکن ربات را ارسال میکند 

توکن مانند : [ 896322125:AAGJXujnXAhPwoL71fTINyTvAEC8XeZM5Ac ] است.

5 - وارد ربات پرو نایت شوید  و روی دکمه [ ساخت ربات ] کلیک کنید .

6 - سپس ربات مورد نظر خود را انتخاب میکنید.

7 - توکن دریافتی از ربات [ @botfather ] را برای ربات ساز پرو نایت ارسال میکنید .

8 - اگر رباتساز پرو نایت از شما آیدی چنل درخواست کرد آیدی چنل خود را بدون [ @ ] ارسال میکنید.

9 - ربات شما ساخته شد.
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$ba]);
}
///////////////₩¥//////////////////
if($textmessage == "ویژه کردن ربات💣")
{
if($coin >= 10){
bot('sendmessage',['chat_id'=>$from_id,'text'=>"لطفا توکن ربات خود را ارسال نمایید🧲",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
$connect->query("UPDATE `data` SET `step` = 'vip' WHERE `id` = '$from_id';");
}else{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"سکه های شما جهت ویژه کردن ربات کافی نمیباشد‼️
سکه های مورد نیاز برای ویژه کردن ربات : 10 📯
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
}
if($step == "vip" and $textmessage != "بازگشت🔙"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
if(file_exists("bots/$un/index.php")){
	@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    $coin = $user["coin"];
    $new = $coin - 10;
    $connect->query("UPDATE `data` SET `coin` = '$new' WHERE `id` = '$from_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"تبریک🎗
ربات شما با موفقیت ویژه شد و تمام تبلیغات ربات شما برداشته شد💣🤘",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
file_put_contents("bots/$un/type.txt","vip");
$connect->query("UPDATE `data` SET `step` = 'no' WHERE `id` = '$from_id';");
}else{
  bot('sendmessage',['chat_id'=>$from_id,'text'=>"این ربات در سرور پرو نایت وجود ندارد‼️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
}
if($textmessage == "حذف ربات🗑")
{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"لطفا توکن ربات خود را ارسال نمایید🧲",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
$connect->query("UPDATE `data` SET `step` = 'del' WHERE `id` = '$from_id';");
}
if($step == "del" and $textmessage != "بازگشت🔙"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
if(file_exists("bots/$un/index.php")){
	@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    $bots = $user["bots"];
    $new = $bots - 1;
    $connect->query("UPDATE `data` SET `bots` = '$new' WHERE `id` = '$from_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"ربات شما با موفقیت از سرور رباتساز پرو نایت پاک گردید🎈",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
deletefolder("bots/$un");
$connect->query("UPDATE `data` SET `step` = 'no' WHERE `id` = '$from_id';");
}else{
  bot('sendmessage',['chat_id'=>$from_id,'text'=>"این ربات در سرور پرو نایت وجود ندارد‼️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
}
///////////////₩¥//////////////////
if($textmessage == "حساب کاربری💠")
{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"اطلاعات حساب شما به شرح زیر میباشد:⬇️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$account]);
}
if($textmessage == "ساخت ربات آنلاین🔦")
{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"به بخش ساخت ربات آنلاین خوش آمدید🎈
لطفا یک ربات را انتخاب نمایید⬇️
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$cli]);
}
///////////////₩¥//////////////////
if($textmessage == "افزایش فرصت ساخت ربات🎗")
{
if($coin >= 3)
{
   @$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$chat_id'"));
    $end = $user["endbots"];
    $bo = $end + 1;
    $x = $user["coin"];
    $kj = $x - 3;
    $connect->query("UPDATE `data` SET `endbots` = '$bo' WHERE `id` = '$chat_id';");
    $connect->query("UPDATE `data` SET `coin` = '$kj' WHERE `id` = '$chat_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"تبریک یک فرصت به فرصت های ساخت ربات شما افزوده گردید🧨",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}else{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"توجه برای افزایش فرصت های ساخت ربات خود به 3 سکه احتیاج دارید‼️

سکه های فعلی شما : $coin",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
}
///////////////₩¥//////////////////
else if($textmessage == "ویس سیتی🗣")
{
if($bots >= $endbots){
        bot('sendmessage',['chat_id'=>$from_id,'text'=>"فرصت های ساخت ربات شما به اتمام رسیده است🛶
فقط $endbots ربات میتوانید ایجاد کنید😕
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}else{
    $connect->query("UPDATE `data` SET `step` = 'channel' WHERE `id` = '$from_id';");
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"
لطفا آیدی چنل خود را جهت ثبت در ربات ارسال کنید🆔

توجه بدون @ !!!!
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
}
else if($step == "channel" and $textmessage != "بازگشت🔙")
{

$connect->query("UPDATE `data` SET `step` = 'token' WHERE `id` = '$from_id';");
$connect->query("UPDATE `data` SET `channel` = '$textmessage' WHERE `id` = '$from_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"جهت ایجاد ربات توکن دریافتی از ربات @BotFather را ارسال کنید🎗",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
	else if($step == "token" and $textmessage != "بازگشت🔙"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
if($ok == true){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"♻️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
]);
file_get_contents("http://mad.irancpanel.info/Pro/api.php?password=001xdkzp2551961kdxxkwo8528xxaiq195518&&type=voice&&token=$textmessage&&admin=$chat_id&&idbot=$un&&channel=$channel");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"ربات شما با موفقیت بر روی سرور پرو نایت قرار گرفت⚙
جهت ورود به ربات خود از دکمه شیشه ای زیر استفاده نمیایید⬇️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'ورود به ربات✔️',"url"=>"t.me/$un"]],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
])
]);
bot('sendmessage',['chat_id'=>$xgs,'text'=>"یک ربات  ویس سیتی ساخته شد🙃
ایدی ربات : @$un
سازنده : $username
",'parse_mode'=>"HTML"]);
	@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    $bots = $user["bots"];
    $newbot = $bots + 1;
    $connect->query("UPDATE `data` SET `bots` = '$newbot' WHERE `id` = '$from_id';");
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
}else{
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"توکن ارسال شده جهت ایجاد ربات اشتباه میباشد‼️
لطفا یک توکن صحیح جهت ساخت ربات ارسال نمایید💯",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>$menu,
	 ]);  
}
}
else if($textmessage == "دریافت شماره(واقعی)📲")
{
if($bots >= $endbots){
        bot('sendmessage',['chat_id'=>$from_id,'text'=>"فرصت های ساخت ربات شما به اتمام رسیده است🛶
فقط $endbots ربات میتوانید ایجاد کنید😕
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}else{
    $connect->query("UPDATE `data` SET `step` = 'nchannel' WHERE `id` = '$from_id';");
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"
لطفا آیدی چنل خود را جهت ثبت در ربات ارسال کنید🆔

توجه بدون @ !!!!
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
}
else if($step == "nchannel" and $textmessage != "بازگشت🔙")
{

$connect->query("UPDATE `data` SET `step` = 'ntoken' WHERE `id` = '$from_id';");
$connect->query("UPDATE `data` SET `channel` = '$textmessage' WHERE `id` = '$from_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"جهت ایجاد ربات توکن دریافتی از ربات @BotFather را ارسال کنید🎗",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
	else if($step == "ntoken" and $textmessage != "بازگشت🔙"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
if($ok == true){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"♻️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
]);
file_get_contents("http://mad.irancpanel.info/Pro/api.php?password=001xdkzp2551961kdxxkwo8528xxaiq195518&&type=number&&token=$textmessage&&idbot=$un&&admin=$chat_id&&channel=$channel");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"ربات شما با موفقیت بر روی سرور پرو نایت قرار گرفت⚙
جهت ورود به ربات خود از دکمه شیشه ای زیر استفاده نمیایید⬇️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'ورود به ربات✔️',"url"=>"t.me/$un"]],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
])
]);
bot('sendmessage',['chat_id'=>$xgs,'text'=>"یک ربات دریافت شماره واقعی ساخته شد🙃
ایدی ربات : @$un
سازنده : $username
",'parse_mode'=>"HTML"]);
	@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    $bots = $user["bots"];
    $newbot = $bots + 1;
    $connect->query("UPDATE `data` SET `bots` = '$newbot' WHERE `id` = '$from_id';");
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
}else{
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"توکن ارسال شده جهت ایجاد ربات اشتباه میباشد‼️
لطفا یک توکن صحیح جهت ساخت ربات ارسال نمایید💯",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>$menu,
	 ]);  
}
}
else if($textmessage == "دریافت شماره(فیک)💣")
{
if($bots >= $endbots){
        bot('sendmessage',['chat_id'=>$from_id,'text'=>"فرصت های ساخت ربات شما به اتمام رسیده است🛶
فقط $endbots ربات میتوانید ایجاد کنید😕
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}else{
    $connect->query("UPDATE `data` SET `step` = 'channel-n' WHERE `id` = '$from_id';");
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"
لطفا آیدی چنل خود را جهت ثبت در ربات ارسال کنید🆔

توجه بدون @ !!!!
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
}
else if($step == "channel-n" and $textmessage != "بازگشت🔙")
{

$connect->query("UPDATE `data` SET `step` = 'number' WHERE `id` = '$from_id';");
$connect->query("UPDATE `data` SET `channel` = '$textmessage' WHERE `id` = '$from_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"جهت ایجاد ربات توکن دریافتی از ربات @BotFather را ارسال کنید🎗",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
	else if($step == "number" and $textmessage != "بازگشت🔙"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
if($ok == true){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"♻️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
]);
file_get_contents("http://mad.irancpanel.info/Pro/api.php?password=001xdkzp2551961kdxxkwo8528xxaiq195518&&type=numberfake&&token=$textmessage&&admin=$chat_id&&idbot=$un&&channel=$channel");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"ربات شما با موفقیت بر روی سرور پرو نایت قرار گرفت⚙
جهت ورود به ربات خود از دکمه شیشه ای زیر استفاده نمیایید⬇️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'ورود به ربات✔️',"url"=>"t.me/$un"]],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
])
]);
bot('sendmessage',['chat_id'=>$xgs,'text'=>"یک  ربات دریافت شماره ساخته شد🙃
ایدی ربات : @$un
سازنده : $username",'parse_mode'=>"HTML"]);
	@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    $bots = $user["bots"];
    $newbot = $bots + 1;
    $connect->query("UPDATE `data` SET `bots` = '$newbot' WHERE `id` = '$from_id';");
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
}else{
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"توکن ارسال شده جهت ایجاد ربات اشتباه میباشد‼️
لطفا یک توکن صحیح جهت ساخت ربات ارسال نمایید💯",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>$menu,
	 ]);  
}
}
else if($textmessage == "عکس کارتونی(فیک)🌌")
{
if($bots >= $endbots){
        bot('sendmessage',['chat_id'=>$from_id,'text'=>"فرصت های ساخت ربات شما به اتمام رسیده است🛶
فقط $endbots ربات میتوانید ایجاد کنید😕
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}else{
    $connect->query("UPDATE `data` SET `step` = 'channel-k' WHERE `id` = '$from_id';");
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"
لطفا آیدی چنل خود را جهت ثبت در ربات ارسال کنید🆔

توجه بدون @ !!!!
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
}
else if($step == "channel-k" and $textmessage != "بازگشت🔙")
{

$connect->query("UPDATE `data` SET `step` = 'kartoni' WHERE `id` = '$from_id';");
$connect->query("UPDATE `data` SET `channel` = '$textmessage' WHERE `id` = '$from_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"جهت ایجاد ربات توکن دریافتی از ربات @BotFather را ارسال کنید🎗",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
	else if($step == "kartoni" and $textmessage != "بازگشت🔙"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
if($ok == true){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"♻️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
]);
file_get_contents("http://mad.irancpanel.info/Pro/api.php?password=001xdkzp2551961kdxxkwo8528xxaiq195518&&type=kartoni&&token=$textmessage&&admin=$chat_id&&idbot=$un&&channel=$channel&&ad=$username");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"ربات شما با موفقیت بر روی سرور پرو نایت قرار گرفت⚙
جهت ورود به ربات خود از دکمه شیشه ای زیر استفاده نمیایید⬇️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'ورود به ربات✔️',"url"=>"t.me/$un"]],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
])
]);
bot('sendmessage',['chat_id'=>$xgs,'text'=>"یک  ربات عکس کارتونی ساخته شد🙃
ایدی ربات : @$un
سازنده : $username",'parse_mode'=>"HTML"]);
	@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    $bots = $user["bots"];
    $newbot = $bots + 1;
    $connect->query("UPDATE `data` SET `bots` = '$newbot' WHERE `id` = '$from_id';");
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
}else{
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"توکن ارسال شده جهت ایجاد ربات اشتباه میباشد‼️
لطفا یک توکن صحیح جهت ساخت ربات ارسال نمایید💯",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>$menu,
	 ]);  
}
}
else if($textmessage == "ویوپنل👁‍🗨")
{
if($bots >= $endbots){
        bot('sendmessage',['chat_id'=>$from_id,'text'=>"فرصت های ساخت ربات شما به اتمام رسیده است🛶
فقط $endbots ربات میتوانید ایجاد کنید😕
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}else{
	if($coin >= 20)
	{
    $connect->query("UPDATE `data` SET `step` = 'channel-p' WHERE `id` = '$from_id';");
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"
لطفا آیدی چنل خود را جهت ثبت در ربات ارسال کنید🆔

توجه بدون @ !!!!
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}else{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"
تعداد سکه های شما جهت ساخت ویوپنل کافی نمیباشد‼️
تعداد سکه مورد نیاز جهت ساخت : 20
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
}
}
else if($step == "channel-p" and $textmessage != "بازگشت🔙")
{

$connect->query("UPDATE `data` SET `step` = 'viewpanel' WHERE `id` = '$from_id';");
$connect->query("UPDATE `data` SET `channel` = '$textmessage' WHERE `id` = '$from_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"جهت ایجاد ربات توکن دریافتی از ربات @BotFather را ارسال کنید🎗",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}
	else if($step == "viewpanel" and $textmessage != "بازگشت🔙"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
if($ok == true){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"♻️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
]);
file_get_contents("http://mad.irancpanel.info/Pro/api.php?password=001xdkzp2551961kdxxkwo8528xxaiq195518&&type=viewpanel&&token=$textmessage&&admin=$chat_id&&idbot=$un&&channel=$channel&&ad=$username");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"ربات شما با موفقیت بر روی سرور پرو نایت قرار گرفت⚙
جهت ورود به ربات خود از دکمه شیشه ای زیر استفاده نمیایید⬇️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'ورود به ربات✔️',"url"=>"t.me/$un"]],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
])
]);
bot('sendmessage',['chat_id'=>$xgs,'text'=>"یک  ربات ویوپنل ساخته شد🙃
ایدی ربات : @$un
سازنده : $username",'parse_mode'=>"HTML"]);
	@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    $bots = $user["bots"];
    $newbot = $bots + 1;
    $coin = $user["coin"];
    $newcoin = $coin - 20;
    $connect->query("UPDATE `data` SET `bots` = '$newbot' WHERE `id` = '$from_id';");
    $connect->query("UPDATE `data` SET `coin` = '$newcoin' WHERE `id` = '$from_id';");
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
}else{
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"توکن ارسال شده جهت ایجاد ربات اشتباه میباشد‼️
لطفا یک توکن صحیح جهت ساخت ربات ارسال نمایید💯",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>$menu,
	 ]);  
}
}
else if($textmessage == "پیام رسان📩")
{
if($bots >= $endbots){
        bot('sendmessage',['chat_id'=>$from_id,'text'=>"فرصت های ساخت ربات شما به اتمام رسیده است🛶
فقط $endbots ربات میتوانید ایجاد کنید😕
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}else{
$connect->query("UPDATE `data` SET `step` = 'pv' WHERE `id` = '$from_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"جهت ایجاد ربات توکن دریافتی از ربات @BotFather را ارسال کنید🎗",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
	}
}
	else if($step == "pv" and $textmessage != "بازگشت🔙"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
if($ok == true){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"♻️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
]);
file_get_contents("http://mad.irancpanel.info/Pro/api.php?password=001xdkzp2551961kdxxkwo8528xxaiq195518&&type=pv&&token=$textmessage&&admin=$chat_id&&idbot=$un");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"ربات شما با موفقیت بر روی سرور پرو نایت قرار گرفت⚙
جهت ورود به ربات خود از دکمه شیشه ای زیر استفاده نمیایید⬇️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'ورود به ربات✔️',"url"=>"t.me/$un"]],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
])
]);
bot('sendmessage',['chat_id'=>$xgs,'text'=>"یک ربات پیام  رسان ساخته شد🙃
ایدی ربات : @$un
سازنده : $username",'parse_mode'=>"HTML"]);
	@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    $bots = $user["bots"];
    $newbot = $bots + 1;
    $connect->query("UPDATE `data` SET `bots` = '$newbot' WHERE `id` = '$from_id';");
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
}else{
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"توکن ارسال شده جهت ایجاد ربات اشتباه میباشد‼️
لطفا یک توکن صحیح جهت ساخت ربات ارسال نمایید💯",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>$menu,
	 ]);  
}
}
else if($textmessage == "رمانستان🎗")
{
if($bots >= $endbots){
        bot('sendmessage',['chat_id'=>$from_id,'text'=>"فرصت های ساخت ربات شما به اتمام رسیده است🛶
فقط $endbots ربات میتوانید ایجاد کنید😕
",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
}else{
$connect->query("UPDATE `data` SET `step` = 'roman' WHERE `id` = '$from_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"جهت ایجاد ربات توکن دریافتی از ربات @BotFather را ارسال کنید🎗",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,'reply_markup'=>$back]);
	}
}
	else if($step == "roman" and $textmessage != "بازگشت🔙"){
		$userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$textmessage .'/getme'));
	$resultb = objectToArrays($userbot);
	$un = $resultb["result"]["username"];
	$ok = $resultb["ok"];
if($ok == true){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"♻️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
]);
file_get_contents("http://mad.irancpanel.info/Pro/api.php?password=001xdkzp2551961kdxxkwo8528xxaiq195518&&type=roman&&token=$textmessage&&admin=$chat_id&&idbot=$un");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"ربات شما با موفقیت بر روی سرور پرو نایت قرار گرفت⚙
جهت ورود به ربات خود از دکمه شیشه ای زیر استفاده نمیایید⬇️",
 'parse_mode'=>"MarkDown",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'ورود به ربات✔️',"url"=>"t.me/$un"]],
    ],
    "resize_keyboard"=>true,'one_time_keyboard'=>true,
])
]);
bot('sendmessage',['chat_id'=>$xgs,'text'=>"یک ربات رمان ساخته شد🙃
ایدی ربات : @$un
سازنده : $username",'parse_mode'=>"HTML"]);
	@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    $bots = $user["bots"];
    $newbot = $bots + 1;
    $connect->query("UPDATE `data` SET `bots` = '$newbot' WHERE `id` = '$from_id';");
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
}else{
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"توکن ارسال شده جهت ایجاد ربات اشتباه میباشد‼️
لطفا یک توکن صحیح جهت ساخت ربات ارسال نمایید💯",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>$menu,
	 ]);  
}
}
if($textmessage == "کلیکر📯")
{
if($coin >= 10)
{
	@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$from_id'"));
    $bots = $user["bots"];
    $newbot = $bots + 1;
    $connect->query("UPDATE `data` SET `bots` = '$newbot' WHERE `id` = '$from_id';");
    $coin = $user["coin"];
    $newcoin = $coin - 10;
    $connect->query("UPDATE `data` SET `coin` = '$newcoin' WHERE `id` = '$from_id';");
	 $connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
$link = file_get_contents("http://mohammadamin0912.000webhostapp.com/api.php?type=clicker&&admin=$chat_id&&hash=$hash");
file_get_contents("https://mad.irancpanel.info/Pro/cron.php?link=$link&time=1");
	bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"ربات شما باموفقیت ایجاد شد✔️
از طریق لینک زیر مراحل لاگین را انجام دهید و به اکانت خود رفته و دستور /help را ارسال کنید⬇️😅

$link

کد پوشه ربات در جهت بروز مشکل : $hash 🗂

",
 'parse_mode'=>"html",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>$back,
]);
bot('sendmessage',['chat_id'=>$xgs,'text'=>"یک کلیکر ساخته شد🙃
سازنده : $username
",'parse_mode'=>"HTML"]);
}else{
bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=>"خطا‼️
تعداد سکه های شما جهت ساخت کلیکر کافی نمیباشد☹️
تعداد سکه مورد نیاز جهت ساخت : 10
",
 'parse_mode'=>"html",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>$back,
]);
}
}
///////////////₩¥//////////////////
if(in_array($chat_id,[1013521973,936407289])){
if($textmessage == "پنل"){
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"ادمین عزیز $first_name ✔️
به پنل مدیریت ربات پرو نایت خوش آمدید🎗
از کیبورد زیر جهت مدیریت ربات استفاده نمایید⬇️",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
  "reply_markup"=>$panel,
	 ]);  
}
if($textmessage == "آمار ربات📊"){
	$bb = mysqli_query($connect, "select id from data");
  $t = mysqli_num_rows($bb);
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"تعداد کاربران ربات شما برابر است با : $t",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
}
if($textmessage == "تعداد ربات ها🧨"){
	$x = count(scandir("bots"))-1;
	bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"تعداد ربات های ساخته شده توسط ربات پرو نایت : $x ربات💎",
 'parse_mode'=>"HTML",
  'reply_to_message_id'=>$message_id,
	 ]);  
}
else if($textmessage == "فروارد همگانی📬")
{
    $connect->query("UPDATE `data` SET `step` = 'fwd' WHERE `id` = '$from_id';");
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"لطفا پیام خود را فروارد کنید🧯",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}
if ($step == 'fwd' and $textmessage != "بازگشت🔙")
{
	$bb = mysqli_query($connect, "select id from data");
  $t = mysqli_num_rows($bb);
		$query =    mysqli_query($connect,"SELECT * FROM data");
        while( $m = mysqli_fetch_array($query)){
            $users[] = $m['id'];
        }
        foreach ($users as $member){
            bot('forwardmessage',['chat_id' => $member, 'from_chat_id' => $chat_id, 'message_id' => $message_id]);
        }
		bot('sendmessage', ['chat_id' => $from_id, 'text' => "پیام شما به $t کاربر فروارد شد✔", ]);
		$connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id' LIMIT 1");
		}
		else if($textmessage == "پیام همگانی📨")
{
    $connect->query("UPDATE `data` SET `step` = 'sendall' WHERE `id` = '$from_id';");
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"لطفا پیام خود را ارسال کنید🧩",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}
if ($step == 'sendall' and $textmessage != "بازگشت🔙")
{
		$query =    mysqli_query($connect,"SELECT * FROM data");
        while( $row = mysqli_fetch_array($query)){
            $users[] = $row['id'];
        }
        foreach ($users as $member){
		    bot('sendmessage', ['chat_id' => $member, 'text' => $textmessage]);
        }
		bot('sendmessage', ['chat_id' => $from_id, 'text' => "پیام شما با موفقیت به $t کاربر ارسال شد💎", ]);
		$connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id' LIMIT 1");
		}
else if($textmessage == "افزایش امتیاز➕")
{
    $connect->query("UPDATE `data` SET `step` = 'add' WHERE `id` = '$from_id';");
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"لطفا ایدی عددی کاربر را وارد کنید💬",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}
if(is_numeric($textmessage) && $step == "add" and $textmessage != "بازگشت🔙")
{
$connect->query("UPDATE `data` SET `step` = 'c' WHERE `id` = '$from_id';");
$connect->query("UPDATE `data` SET `code` = '$textmessage' WHERE `id` = '$from_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"لطفا تعداد سکه هایی را که میخواهید به حساب کاربر ارسال شود را ارسال کنید💠",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}
if(is_numeric($textmessage) && $step == "c" and $textmessage != "بازگشت🔙")
{
$connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
$La = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM data WHERE id = '$code' LIMIT 1"));
if ($La["id"] == true)
{
@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$code'"));
$coin = $user["coin"];
$x = $coin + $textmessage;
$connect->query("UPDATE `data` SET `coin` = '$x' WHERE `id` = '$code';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"با موفقیت به حساب $code تعداد $textmessage سکه اضافه شد〽️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
bot('sendmessage',['chat_id'=>$code,'text'=>"از طرف مدیریت به حساب شما تعداد $textmessage سکه اضافه شد📥",'parse_mode'=>"HTML",]);
$connect->query("UPDATE `data` SET `code` = '0' WHERE `id` = '$from_id';");
}else{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"کاربر یافت نشد❌",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}
}
else if($textmessage == "کسر امتیاز➖")
{
    $connect->query("UPDATE `data` SET `step` = 'po' WHERE `id` = '$from_id';");
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"لطفا ایدی عددی کاربر را وارد کنید💬",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}

if(is_numeric($textmessage) && $step == "po" and $textmessage != "بازگشت🔙")
{
$connect->query("UPDATE `data` SET `step` = 'z' WHERE `id` = '$from_id';");
$connect->query("UPDATE `data` SET `code` = '$textmessage' WHERE `id` = '$from_id';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"لطفا تعداد سکه هایی را که میخواهید از حساب کاربر کسر شود را ارسال کنید💠",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}
if(is_numeric($textmessage) && $step == "z" and $textmessage != "بازگشت🔙")
{
$connect->query("UPDATE `data` SET `step` = 'n' WHERE `id` = '$from_id';");
$La = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM data WHERE id = '$code' LIMIT 1"));
if ($La["id"] == true)
{
@$user = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `data` WHERE `id` = '$code'"));
$coin = $user["coin"];
$x = $coin - $textmessage;
$connect->query("UPDATE `data` SET `coin` = '$x' WHERE `id` = '$code';");
bot('sendmessage',['chat_id'=>$from_id,'text'=>"با موفقیت از حساب $code تعداد $textmessage سکه کسر شد〽️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
bot('sendmessage',['chat_id'=>$code,'text'=>"از طرف مدیریت از حساب شما تعداد $textmessage سکه کسر شد📤",'parse_mode'=>"HTML",]);
$connect->query("UPDATE `data` SET `code` = '0' WHERE `id` = '$from_id';");
}else{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"کاربر یافت نشد❌",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}
}

else if($textmessage == "حذف ربات📌")
{
    $connect->query("UPDATE `data` SET `step` = 'deletebot' WHERE `id` = '$from_id';");
    bot('sendmessage',['chat_id'=>$from_id,'text'=>"لطفا ایدی ربات را بدون @ جهت حذف آن ارسال کنید📖",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}
if($step == "deletebot" and $textmessage != "بازگشت🔙"){
if(file_exists("bots/$textmessage/index.php")){
bot('sendmessage',['chat_id'=>$from_id,'text'=>"ربات با موفقیت حذف شد✔️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}else{
bot('sendmessage',['chat_id'=>$from_id,'text'=>"این ربات وجود ندارد✖️",'parse_mode'=>"HTML",'reply_to_message_id'=>$message_id,]);
}
}
}
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
//@Source_Home