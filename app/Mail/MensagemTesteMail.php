<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MensagemTesteMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mensagem Teste Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.mensagem-teste',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
