<?php

namespace App\Mail;

use App\Models\Visitor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VisitorRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public Visitor $visitor;

    public function __construct(Visitor $visitor)
    {
        $this->visitor = $visitor;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Visitor Registered - ' . $this->visitor->first_name . ' ' . $this->visitor->last_name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.visitor-registered',
        );
    }
}