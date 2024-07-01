<?php
namespace App\Http\Traits;

use GuzzleHttp\Client;

trait Discord{

// https://discord.com/channels/1138796531160469544
// https://discord.com/developers/applications/1138798787251413113/oauth2/url-generator

// ENV :
// discordToken=
// discordChannelId=

public function discordSend($message){
        // Send a message to Discord
        $discordToken = env('discordToken');
        $discordChannelId = env('discordChannelId');

        $client = new Client();
        $response = $client->post("https://discord.com/api/v10/channels/{$discordChannelId}/messages", [
            'headers' => [
                'Authorization' => "Bot {$discordToken}",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'content' => "The Laravel application: ".env('APP_NAME') ."\n".$message,
            ],
        ]);

        if ($response->getStatusCode() === 200) {
            return true ;
        } else {
            return false ;
        }

}


}

