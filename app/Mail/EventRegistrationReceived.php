<?php

namespace App\Mail;

use App\Models\EventRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventRegistrationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public EventRegistration $registration)
    {
    }

    public function build()
    {
        return $this->subject('New registration for ' . $this->registration->event->title . ' — ' . $this->registration->name)
            ->replyTo($this->registration->email, $this->registration->name)
            ->view('emails.event-registration-received');
    }
}
