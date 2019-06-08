<?php

namespace App\Sms;


abstract class SmsAbstract
{
    protected $to;
    protected $message;

    function to()
    {
        return $this->to;
    }

    function message()
    {
        return $this->message;
    }
}