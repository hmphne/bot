<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
//@Source_Home
error_reporting(0);
$install = "ربات شما با موفقیت بر روی سرور پر قدرت رباتساز پرو نایت قرار گرفت💯 \n\nجهت ورود به پنل مدیریت ربات خود از دستور ( /panel ) استفاده نمایید⚠️ \n \n@Source_Home";
if ( $_GET["type"] == null)
{
echo "wrong!";
exit();
}
if($_GET["password"] == "001xdkzp2551961kdxxkwo8528xxaiq195518"){
if($_GET["type"] == "pv"){
if(!is_dir("bots/".$_GET["idbot"])){
mkdir("bots/".$_GET["idbot"]);
mkdir("bots/".$_GET["idbot"]."/data");
$class = file_get_contents("source/pv/index.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
file_put_contents("bots/".$_GET["idbot"]."/type.txt","n");
file_get_contents('https://api.telegram.org/bot'.$_GET["token"].'/sendmessage?text='.$install.'&chat_id='.$_GET["admin"]);
}else{
	$class = file_get_contents("source/pv/index.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
}
}
if($_GET["type"] == "roman"){
if(!is_dir("bots/".$_GET["idbot"])){
	mkdir("bots/".$_GET["idbot"]);
	mkdir("bots/".$_GET["idbot"]."/data");
	mkdir("bots/".$_GET["idbot"]."/roman");
	mkdir("bots/".$_GET["idbot"]."/like");
	mkdir("bots/".$_GET["idbot"]."/data/readed");
$class = file_get_contents("source/roman/uuff.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
file_put_contents("bots/".$_GET["idbot"]."/type.txt","n");
file_get_contents('https://api.telegram.org/bot'.$_GET["token"].'/sendmessage?text='.$install.'&chat_id='.$_GET["admin"]);
}else{
	$class = file_get_contents("source/roman/uuff.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
}
}
if($_GET["type"] == "vip"){
file_put_contents("bots/".$_GET["idbot"]."/type.txt","vip");
file_get_contents('https://api.telegram.org/bot'.$_GET["token"].'/sendmessage?text='.$vip.'&chat_id='.$_GET["admin"]);
}
if($_GET["type"] == "voice"){
	if(!is_dir("bots/".$_GET["idbot"])){
mkdir("bots/".$_GET["idbot"]);
mkdir("bots/".$_GET["idbot"]."/data");
$class = file_get_contents("source/voice/index.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
$class = str_replace("[*[CHANNEL]*]",$_GET["channel"],$class);
$class = str_replace("[*[IDBOT]*]",$_GET["idbot"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
file_put_contents("bots/".$_GET["idbot"]."/type.txt","n");
file_get_contents('https://api.telegram.org/bot'.$_GET["token"].'/sendmessage?text='.$install.'&chat_id='.$_GET["admin"]);
}else{
	$class = file_get_contents("source/voice/index.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
$class = str_replace("[*[CHANNEL]*]",$_GET["channel"],$class);
$class = str_replace("[*[IDBOT]*]",$_GET["idbot"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
}
}
if($_GET["type"] == "numberfake"){
	if(!is_dir("bots/".$_GET["idbot"])){
mkdir("bots/".$_GET["idbot"]);
mkdir("bots/".$_GET["idbot"]."/data");
$class = file_get_contents("source/number/index.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
$class = str_replace("[*[CHANNEL]*]",$_GET["channel"],$class);
$class = str_replace("[*[IDBOT]*]",$_GET["idbot"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
file_put_contents("bots/".$_GET["idbot"]."/type.txt","n");
file_get_contents('https://api.telegram.org/bot'.$_GET["token"].'/sendmessage?text='.$install.'&chat_id='.$_GET["admin"]);
}else{
	$class = file_get_contents("source/number/index.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
$class = str_replace("[*[CHANNEL]*]",$_GET["channel"],$class);
$class = str_replace("[*[IDBOT]*]",$_GET["idbot"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
}
}
if($_GET["type"] == "number"){
	if(!is_dir("bots/".$_GET["idbot"])){
mkdir("bots/".$_GET["idbot"]);
$class = file_get_contents("source/Number2/bot.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
$class = str_replace("[*[CHANNEL]*]",$_GET["channel"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
file_put_contents("bots/".$_GET["idbot"]."/type.txt","n");
file_get_contents('https://api.telegram.org/bot'.$_GET["token"].'/sendmessage?text='.$install.'&chat_id='.$_GET["admin"]);
}else{
	$class = file_get_contents("source/Number2/bot.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
$class = str_replace("[*[CHANNEL]*]",$_GET["channel"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
}
}
if($_GET["type"] == "kartoni"){
	if(!is_dir("bots/".$_GET["idbot"])){
mkdir("bots/".$_GET["idbot"]);
mkdir("bots/".$_GET["idbot"]."/data");
$class = file_get_contents("source/kartoni/bot.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
$class = str_replace("[*[CHANNEL]*]",$_GET["channel"],$class);
$class = str_replace("[*[IDBOT]*]",$_GET["idbot"],$class);
$class = str_replace("[*[USER]*]",$_GET["ad"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
file_put_contents("bots/".$_GET["idbot"]."/type.txt","n");
file_get_contents('https://api.telegram.org/bot'.$_GET["token"].'/sendmessage?text='.$install.'&chat_id='.$_GET["admin"]);
}else{
	$class = file_get_contents("source/kartoni/bot.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
$class = str_replace("[*[CHANNEL]*]",$_GET["channel"],$class);
$class = str_replace("[*[IDBOT]*]",$_GET["idbot"],$class);
$class = str_replace("[*[USER]*]",$_GET["ad"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
}
}
if($_GET["type"] == "viewpanel"){
	if(!is_dir("bots/".$_GET["idbot"])){
mkdir("bots/".$_GET["idbot"]);
mkdir("bots/".$_GET["idbot"]."/data");
$class = file_get_contents("source/ViewPanel/Index.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
$class = str_replace("[*[CHANNEL]*]",$_GET["channel"],$class);
$class = str_replace("[*[USER]*]",$_GET["ad"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
file_get_contents('https://api.telegram.org/bot'.$_GET["token"].'/sendmessage?text='.$install.'&chat_id='.$_GET["admin"]);
}else{
$class = file_get_contents("source/ViewPanel/Index.php");
$class = str_replace("[*[TOKEN]*]",$_GET["token"],$class);
$class = str_replace("[*[ADMIN]*]",$_GET["admin"],$class);
$class = str_replace("[*[CHANNEL]*]",$_GET["channel"],$class);
$class = str_replace("[*[USER]*]",$_GET["ad"],$class);
file_put_contents("bots/".$_GET["idbot"]."/index.php",$class);
file_get_contents("https://api.telegram.org/bot".$_GET["token"]."/setwebhook?url=https://mad.irancpanel.info/Pro/bots/".$_GET["idbot"]."/index.php");
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