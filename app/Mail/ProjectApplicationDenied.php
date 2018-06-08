<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectApplicationDenied extends Mailable
{
    use Queueable, SerializesModels;


    public $name, $project, $position;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $project, $position)
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
        return $this->subject('Application denied')->view('email.application_denied');
    }
}
