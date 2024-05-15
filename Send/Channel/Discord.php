<?php
namespace App\Http\Send\Channel;

use GuzzleHttp\Client;

 class Discord
{

    private  $discordChannelId = [];

    public function Send($message) : bool{

        try {
            // Send a message to Discord
            $discordToken = env('DiscordToken');
            $discordChannelId = env('DiscordChannelId');

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

        } catch (\Throwable $th) {
            //throw $th;
            return false ;
        }
    }


}
