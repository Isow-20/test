<?php

class telegram {
    public $token;
    
    public function __construct($token)
	{
            
		$this->token = $token;
        }
    public function recivedText()
    {
        $text = json_decode(file_get_contents('php://input'));
        return $text;
    }
    public function sendMessage2($userid,$text,$options)
    {
        $url = 'https://api.telegram.org/bot'.$this->token.'/sendMessage';
        
        $keyboard = $this->makeMenu($options);

        $post_fields =  array(
            'chat_id' => $userid ,
            'text' => $text ,
            'parse_mode' => 'HTML' ,
            'reply_markup' => $keyboard
        );
        $this->executeCURL($url,$post_fields);
    } 
    public function makeMenu($options)
    {
        
        $keyboard = Array(
            'keyboard' => $options ,
            'resize_keyboard' => true ,
            'one_time_keyboard' => false ,
            'selective' => true
        );
        
        return json_encode($keyboard);
    }
    
    public function executeCURL($url,$post_fields)
    {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type:multipart/form-data"
                ));
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); 
        $output = curl_exec($ch);
    }

    
}
