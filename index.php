<?php

require ('connection.php');
require ('telegram.php');
$telegram = new telegram(TOKEN);



// دریافت اطلاعات ارسال شده به بات و تبدیل آن به آرایه
$result =  $telegram->recivedText();

$userid     = $result->message->from->id;
$first_name = $result->message->from->first_name;
$last_name  = $result->message->from->last_name;
$username   = $result->message->from->username;
$text       = $result->message->text;

if ($text == '/start'){
	$options = array(
	array('ثبت نام و ثبت شماره'),
	array('کل امتیاز من' , 'جدول امتیاز نفرات برتر'),
	array('جوایز')
	);
	
	$msgtext = "به ربات دفتر پیشخوان خاکستری خوش آمدید".PHP_EOL."چه کاری می تونم براتون انجام بدم؟";
	$telegram -> sendMessage2($userid , $text , $options);
}