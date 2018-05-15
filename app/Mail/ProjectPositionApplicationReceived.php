<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectPositionApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $project, $position, $name, $surname)
    {
        //
        $this->project_name=$project;
        $this->project_position=$position;
        $this->receiver_name=$name;
        $this->receiver_surname=$surname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Application received')->view('mail.application_received');
    }
}
