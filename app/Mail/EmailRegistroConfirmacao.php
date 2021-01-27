<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailRegistroConfirmacao extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $link = url('/api/auth/registro/ativar/' . 
            $this->user->id . '/' .
            $this->user->token
        );

        return $this->view('emails.registroconfirmacao')->with([
            'nome' => $this->user->name,
            'nome' => $this->user->email,
            'link' => $link,
            'datahora' => now()->setTimeZone('America/Sao_Paulo')->format('d-m-Y H:i:s'),
        ]);
    }
}
