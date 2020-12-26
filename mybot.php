<?php

$token = "1453713083:AAFhjDLKUaoTV33Xr0F99ve8mHwu3QTgNe8";

$json = file_get_contents('php://input');
$telegram = urldecode ($json);
$results = json_decode($telegram); 


$message = $results->message;
$text = $message->text;
$chat = $message->chat;
$user_id = $chat->id;

if($text == "/start" ){
$message = 'test worked!';
$message = urldecode($message);
sendmessage ($user_id,$message,$token);
}
//Send Text Message 
function sendmessage ($user_id,$message,$token) {
	$url = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$user_id.'&text='.$message;
	$update = file_get_contents($url);
}



?>
