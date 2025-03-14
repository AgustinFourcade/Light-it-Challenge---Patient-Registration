<?php

namespace App\Sms;

use Twilio\Rest\Client;

class SmsService
{
    public function sendSms($to, $message)
    {
        $sid = env('TWILIO_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_PHONE_NUMBER');

        $client = new Client($sid, $authToken);

        $client->messages->create(
            $to,
            [
                'from' => $from,
                'body' => $message
            ]
        );
    }
}
