<?php

namespace App\Mail;

use App\Company;
use App\Offert;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostulation extends Mailable
{
    use Queueable, SerializesModels;

    private $company;
    private $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Offert $offert, $request)
    {
        $this->offert = $offert;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->subject("Nueva postulación desde Agenda Minera")
                ->markdown('emails.new_postulation') 
                ->with('offert', $this->offert)
                ->with('mail', $this->request['email'])
                ->with('phone', $this->request['phone'])
                ->with('cv', $this->request['cv']);
    }
}
