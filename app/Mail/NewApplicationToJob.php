<?php

namespace App\Mail;

use App\Candidate;
use App\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewApplicationToJob extends Mailable
{
    use Queueable, SerializesModels;

    private $job;
    private $candidate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Job $job, Candidate $candidate)
    {
        $this->job = $job;
        $this->candidate = $candidate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject("Nueva postulación desde WorksMin")
        ->markdown('emails.new_application_to_job')
        ->with('job', $this->job)
        ->with('candidate', $this->candidate);
    }
}
