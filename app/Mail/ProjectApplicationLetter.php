<?php
/**
 * Created by PhpStorm.
 * User: TEODORA
 * Date: 6/8/2018
 * Time: 3:58 PM
 */

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class ProjectApplicationLetter extends Mailable
{

    use Queueable, SerializesModels;

    public $project, $position, $name, $letter, $surname;

    public function __construct($project, $position, $name, $surname, $motivational_letter)
    {
        //
        $this->name=$name;
        $this->surname=$surname;
        $this->project=$project;
        $this->position=$position;
        $this->letter=$motivational_letter;

    }


    public function build()
    {

        return $this->subject('Project application')->view('email.application_letter');
    }


}