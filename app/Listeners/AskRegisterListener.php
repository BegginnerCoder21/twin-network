<?php

namespace App\Listeners;

use App\Events\AskRegisterEvent;
use App\Mail\ask_register;
use App\Models\User;
use App\Notifications\AskRegistrationMailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class AskRegisterListener implements ShouldQueue
{
    use InteractsWithQueue;
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
    public function handle(AskRegisterEvent $event): void
    {
        $user = User::where('admin',1)->first();
        Notification::send($user,new AskRegistrationMailNotification($event->request,$event->imageName));
        //Mail::send(new ask_register($event->request,$event->imageName));
    }
}
