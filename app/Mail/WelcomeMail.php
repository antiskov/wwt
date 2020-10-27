<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param $passwordSend
     */
    public $passwordSend;

    public function __construct($passwordSend)
    {
        $this->passwordSend = $passwordSend;
    }

    /**
     * Build the message.
     *
     * @param $passwordSend
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.welcome');
    }
}
