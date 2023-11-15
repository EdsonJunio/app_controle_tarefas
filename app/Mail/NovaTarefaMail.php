<?php

namespace App\Mail;

use App\Models\Tarefa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NovaTarefaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tarefa;
    public $data_limite_conclusao;
    public $url;

    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa->tarefa;
        $this->data_limite_conclusao = date('d/m/y', strtotime($tarefa->data_limite_conclusao));
        $this->url = 'http://localhost:8000/tarefa/' . $tarefa->id;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Nova Tarefa Mail',
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'emails.nova-tarefa',
        );
    }

    public function attachments()
    {
        return [];
    }

    public function build()
    {
        return $this->markdown('emails.nova-tarefa')->subject('Nova tarefa criada');
    }
}
