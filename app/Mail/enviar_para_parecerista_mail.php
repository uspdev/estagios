<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Uspdev\Replicado\Pessoa;
use App\Models\Empresa;
use App\Models\Estagio;
use App\Service\GeneralSettings;
use PDF;

class enviar_para_parecerista_mail extends Mailable
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
              
        $subject = $this->estagio->nome. ' - Parecer de Mérito - ' . $this->settings->sigla_unidade;

        $pdf = PDF::loadView('pdfs.parecer', ['estagio'=>$this->estagio, 'settings' => $this->settings]);      

        $text = str_replace('#estagiario_nome#', $this->estagio->nome, $this->settings->enviar_para_parecerista_mail);
        $text = str_replace('#estagiario_numero_usp#', $this->estagio->numero_usp, $text);
        $text = str_replace('#parecerista_nome#', $this->estagio->parecerista_nome, $text);
        $text = str_replace('#sigla_unidade#', $this->settings->sigla_unidade, $text);

        return $this->view('emails.enviar_para_parecerista')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'parecer.pdf')
                    ->with([
                        'text' => $text
                    ]);
    }
}
