<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
//@Source_Home
include "bot.php";
// table creator
mysqli_multi_query($connect,"CREATE TABLE `data` (
    id bigint(20) PRIMARY KEY,
	step varchar(30) NOT NULL,
	coin int(10) NOT NULL,
	endbots int(10) NOT NULL,
	bots varchar(2000) NOT NULL,
	channel varchar(20) NOT NULL,
	phone varchar(200) NOT NULL,
	code varchar(2000) NOT NULL,
	codee varchar(200) NOT NULL
  );
");
if ($connect->connect_error) {
    die("خطا ار اتصال به خاطره : " . $connect->connect_error);
} 
echo "دیتابیس متصل است !";
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
?>