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
    public $to;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url_login, $to)
    {
        $this->url_login = $url_login;
        $this->to = $to;
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
         #    ->from(config('mail.from.address'))
             ->from('abbb@usp.br')
             ->to(['abc@gmail.com'])
         #   ->subject($subject)
            ->with('url_login',$this->url_login);
    }
}
