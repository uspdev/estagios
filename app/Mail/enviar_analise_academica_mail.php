<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Estagio;
use App\Service\GeneralSettings;
use PDF;

class enviar_analise_academica_mail extends Mailable
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
        $to = [$this->estagio->email,config('mail.reply_to.address')];
              
        $subject = $this->estagio->nome . ' - RESULTADO DO PARECER DE MÉRITO - Setor de Estágios - '. $this->settings->sigla_unidade;

        $pdf = PDF::loadView('pdfs.parecer', ['estagio'=>$this->estagio, 'settings' => $this->settings]);

        return $this->view('emails.enviar_analise_academica')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'parecer.pdf')
                    ->with([
                        'estagio' => $this->estagio,
                        'settings' => $this->settings
                    ]);
    }
}
