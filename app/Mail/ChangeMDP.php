<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangeMDP extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $mdp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mdp)
    {
        $this -> mdp = $mdp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // fonction qui permet d'envoyer un mail
    public function build()
    {
        return $this->subject('Reservation Parking - RĂ©initialisation du mot de passe')->view('admin.mail');
    }
}
