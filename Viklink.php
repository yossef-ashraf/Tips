<?php

// Env :
// usernamevinlink =
// passvinlink =


// Make uuid
$data = random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        $data = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));


        $data = [
            'UserName' => env('usernamevinlink'),
            'Password' => env('passvinlink'),
            'SMSText' => 'OTP: '.$message.' Please use OTP ',
            'SMSLang' => 'E',
            'SMSSender' =>'',
            'SMSReceiver' => $phone,
            'SMSID' => $data
        ];

        // إنشاء كائن Guzzle HTTP client
        $client = new Client();
        // إرسال طلب POST إلى الرابط المستهدف
        $response = $client->post('https://smsvas.vlserv.com/VLSMSPlatformResellerAPI/NewSendingAPI/api/SMSSender/SendSMSWithUserSMSIdAndValidity', [
            'form_params' => $data
        ]);
             return $response;
