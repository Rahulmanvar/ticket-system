<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\TicketEvent;
use App\Notifications\TicketNotification;

class TicketEventLisener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TicketEvent $event, $type = NULL): void
    {
        if($event->type == 'status'){
            $event->ticket->assigned->notify(new TicketNotification($event->ticket));
        }
    }
}
