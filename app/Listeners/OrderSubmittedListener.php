<?php

namespace App\Listeners;

use App\Events\OrderSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Sms;

class OrderSubmittedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderSubmitted  $event
     * @return void
     */
    public function handle(OrderSubmitted $event)
    {
        Log::info('send the SMS');
        Sms::send();
    }
}
