<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Vaga;
use App\Service\GeneralSettings;

class enviar_justificativa_reprovacao extends Mailable
{
    use Queueable, SerializesModels;
    private $vaga;
    private $settings;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Vaga $vaga)
    {
        $this->vaga = $vaga;
        $this->settings = app(GeneralSettings::class);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $to = [$this->vaga->email,config('mail.reply_to.address')];

        $subject = $this->vaga->titulo . ' - JUSTIFICATIVA REPROVAÇÃO VAGA DE ESTÁGIO - Setor de Estágios ' . $this->settings->sigla_unidade;

        $text = str_replace('#vaga_justificativa#', $this->vaga->justificativa, $this->settings->enviar_justificativa_reprovacao);
        $text = str_replace('#sigla_unidade#', $this->settings->sigla_unidade, $text);

        return $this->view('emails.enviar_justificativa_reprovacao')
                    ->to($to)
                    ->subject($subject)
                    ->with([
                        'text' => $text
                    ]);
    }
}
