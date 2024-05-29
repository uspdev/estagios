<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Service\GeneralSettings;

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
        $unidade = app(GeneralSettings::class)->unidade;
        $rodape = app(GeneralSettings::class)->rodape;

        $subject = 'Dados para login no sistema de estágio ' . app(GeneralSettings::class)->sigla_unidade;

        $text = str_replace('#unidade#',$unidade,app(GeneralSettings::class)->login_empresa_mail);
        $text = str_replace('#url_login#',$this->url_login,$text);
        $text = str_replace('#rodape#',$rodape,$text);

        return $this->view('emails.login_empresa')
                    ->to($this->destino)
                    ->subject($subject)
                    ->with([
                        'text' => $text
                    ]);
    }
}
