<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Empresa;

class LoginEmpresaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $to;
    public $empresa;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url, $to, Empresa $empresa)
    {
        $this->url = $url;
        $this->to = $to;
        $this->empresa = $empresa;
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
            ->from(config('mail.from.address'))
            ->to('abc@gmail.com')
         #   ->subject($subject)
            ->with('url',$this->url);
    }
}
