<?php

namespace Niko\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Niko\User\Mail\VerifyCodeMail;
use Niko\User\services\VerifyCodeService;

class VerifyMailNotification extends Notification
{
    use Queueable;


    public function __construct()
    {
        //
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        $code= VerifyCodeService::generate();
        VerifyCodeService::store($notifiable->id, $code);
        return (new VerifyCodeMail($code))->to($notifiable->email);

//


    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
