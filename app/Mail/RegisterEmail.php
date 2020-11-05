<?php

namespace App\Mail;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param $codeEmail
     */
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('MAIL_FROM_ADDRESS'))->view('emails.email_register',['codeEmail'=>route('activation_link', [$this->user->email_verification_code])]);
    }
}
