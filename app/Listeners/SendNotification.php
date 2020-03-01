<?php

namespace App\Listeners;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\SomeEvent;

class SendNotification
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
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(SomeEvent $event)
    {
        // send welcome mail
        $data = 
        [
            'first_name' => $event->user->first_name, 
            'last_name' => $event->user->last_name,
            'email'     => $event-user->email,
            'body'      =>'welcome to our website'
        ];

        \Mail::send('emails.welcome', $data, function($message) use ($data){
            $message->to($data['email'])
                    ->subject('Hello');
            $message->from('helmyahmed248@gmail.com');

        });
    }
}
