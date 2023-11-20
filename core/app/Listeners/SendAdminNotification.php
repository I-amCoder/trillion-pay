<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Notifications\NewUserNotification;
use App\Notifications\RegistrationNotification;
use Illuminate\Support\Facades\Notification;

class SendAdminNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admin = Admin::where('username','admin')->get();

        Notification::send($admin, new NewUserNotification($event->user));
    }
}
