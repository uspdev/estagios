<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Empresa;
use App\Models\Estagio;
use App\Service\GeneralSettings;
use PDF;

class analise_rescisao_mail extends Mailable
{
    use Queueable, SerializesModels;
    private $estagio;
    private $settings;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Estagio $estagio)
    {
        $this->estagio = $estagio;
        $this->settings = app(GeneralSettings::class);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $to = [$this->estagio->parecerista->email,config('mail.reply_to.address')];

        $subject = $this->estagio->nome . ' - Setor de Estágios ' . $this->settings->sigla_unidade . ' - O relatório final de estágio foi enviado para o sistema';

        $text = str_replace('#estagiario_nome#', $this->estagio->nome, $this->settings->analise_rescisao_mail);
        $text = str_replace('#estagiario_numero_usp#', $this->estagio->numero_usp, $text);
        $text = str_replace('#empresa_nome#', $this->estagio->empresa->nome, $text);
        $text = str_replace('#sigla_unidade#', $this->settings->sigla_unidade, $text);
        $text = str_replace('#url_site#', route('login'), $text);

        return $this->view('emails.analise_rescisao')
                    ->to($to)
                    ->subject($subject)
                    ->with([
                        'text' => $text
                    ]);
    }
}
