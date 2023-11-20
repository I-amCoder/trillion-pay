<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class NewUserNotification extends Notification
{
    
    public function __construct($user)
    {
        $this->user = $user;
    }

   
    public function via($notifiable)
    {
        return ['database'];
    }

   
    public function toArray($notifiable)
    {
        return [
            'name' => $this->user->fullname .' has just registered',
        ];
    }
}
