<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginEmpresaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $url_login;
    public $destino;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url_login, $destino)
    {
        $this->url_login = $url_login;
        $this->destino = $destino;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Dados para login no sistema de estágio FFLCH';

        return $this->view('emails.login_empresa')
                    ->to($this->destino)
                    ->subject($subject)
                    ->with([
                        'url_login' => $this->url_login,
                    ]);
    }
}
