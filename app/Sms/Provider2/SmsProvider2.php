<?php

namespace App\Sms\Provider2;

use App\Sms\SmsAbstract;
use App\Sms\SmsInterface;

class SmsProvider2 extends SmsAbstract implements SmsInterface
{
    public function sendSMS($smsApiKey, $to, $message) {
        //
    }
    
    /**
     * send SMS
     * @param  string $to to number like 09399958538
     * @param  string $message message to be sent
     * @return boolean
     */
    public function send($to, $message) {

        $sender = config('sms.SMS_SERVICE_SENDER');
        $smsApiKey = config('sms.SMS_SERVICE_API_KEY');
        $this->sendSMS($smsApiKey, $to, $message);
        return true;
    }
  }