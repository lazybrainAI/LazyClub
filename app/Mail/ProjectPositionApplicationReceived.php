<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectPositionApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $project, $position, $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($project, $position, $name)
    {
        //
        $this->name=$name;
        $this->project=$project;
        $this->position=$position;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your application has been received')->view('email.application_received');
    }
}
