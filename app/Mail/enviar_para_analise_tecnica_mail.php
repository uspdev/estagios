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

class enviar_para_analise_tecnica_mail extends Mailable
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
        $to = [$this->estagio->email_de_contato,config('mail.reply_to.address')];

        $subject = $this->estagio->nome . ' - Documentos Relativos a Estágio - ' . $this->settings->sigla_unidade;
        $pdf = PDF::loadView('pdfs.termo', ['estagio'=>$this->estagio, 'settings' => $this->settings]);

        $text = str_replace('#empresa_nome#', $this->estagio->empresa->nome, $this->settings->enviar_para_analise_tecnica_mail);
        $text = str_replace('#estagiario_nome#', $this->estagio->nome, $text);
        $text = str_replace('#estagiario_numero_usp#', $this->estagio->numero_usp, $text);
        $text = str_replace('#email_unidade#', $this->settings->email, $text);
        $text = str_replace('#sigla_unidade#', $this->settings->sigla_unidade, $text);

        return $this->view('emails.enviar_para_analise_tecnica')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'termo.pdf')
                    ->with([
                        'text' => $text
                    ]);
    }
}
