<?php

namespace Niko\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Niko\User\Models\User;

class VerifyCodeMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var User
     */

    public $code;


    public function __construct($code)
    {
        //

        $this->code = $code;
    }


    public function build()
    {
        return $this->markdown('User::mails.verify-mail')->
            subject('hhhhhhhhhhhhhhh');
    }
}
