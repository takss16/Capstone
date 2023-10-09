<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $template;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $template, $subject)
    {
        $this->details = $details;
        $this->template = $template;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->view($this->template)
            ->with(['details' => $this->details, 'name' => $this->details['name'], 'otp' => $this->details['body']]);
    }
    
    
}
