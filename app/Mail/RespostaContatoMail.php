<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RespostaContatoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $body;

    public function __construct($title, $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

    //vini
    public function build()
    {
        return $this->subject($this->title)
                    ->view('emails.resposta_contato') // A view que você criará para o e-mail
                    ->with(['body' => $this->body]);
    }
}
