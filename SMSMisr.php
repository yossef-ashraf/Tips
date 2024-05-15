<?php

class SMSMisr 
{
public function SMSMisr($phone, $message)
    {
        $response =
        Http::post("https://smsmisr.com/api/SMS?
        environment=
        &username=
        &password=
        &language=
        &sender=
        &mobile={$phone}
        &message={$message}
        &DelayUntil="
        ,[]);

        return $response;
    }


    public function OTPMisr($phone, $message)
    {
        $response =
        Http::post("https://smsmisr.com/api/OTP?
        environment=
        &username=
        &password=
        &language=
        &sender=
        &mobile={$phone}
        &template=
        &otp={$message}
        &DelayUntil="
        ,[]);

        return $response;
    }

}

