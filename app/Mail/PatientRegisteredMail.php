<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PatientRegisteredMail extends Mailable{
    use Queueable, SerializesModels;

    public $patient;

    public function __construct($patient){
        $this->patient = $patient;
    }

    public function build(){
        return $this->subject('Patient Registration Confirmation')
                    ->view('emails.patient_registered')
                    ->with([
                        'name' => $this->patient->name,
                        'email' => $this->patient->email
                    ]);
    }
}
