<?php
namespace App\Http\Send;


 class Send
{

    public function send($data){

        $channel = $data['channel'];
        $message = $data['message'];
        $channel = ucfirst($channel);
        $channel = "App\Http\Send\Channel\\".$channel;
        $channel = new $channel();
        return $channel->Send($message);
    }


}
