<?php

namespace App\Listeners;

use App\Mail\ContactEmail;
use App\Events\ContactRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


/**
 * Listener class
 */
class SendContactEmailNotification implements ShouldQueue
{

    public $connection = 'redis';


    public $queue = 'listeners';


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
     * @param object $event
     */
    public function handle(ContactRegistered $event)
    {
        // Mail::to('contact@interaktiondigital.com')
        Mail::to('yan2sambou@gmail.com')
            ->send(new ContactEmail($event->contact));
    }
}
