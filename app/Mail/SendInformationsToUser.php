<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInformationsToUser extends Mailable
{
    use Queueable, SerializesModels;

    public $password, $username;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $username, $email)
    {
        $this->password = $password;
        $this->username = $username;
        $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome to the Club|Lazy Brain!')->view('email.email');
    }
}
