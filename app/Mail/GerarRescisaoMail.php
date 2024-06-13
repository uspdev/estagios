<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Estagio;
use App\Service\GeneralSettings;
use PDF;

class GerarRescisaoMail extends Mailable
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

        $subject = $this->estagio->nome . ' - Termo de rescisão - Setor de Estágios ' . $this->settings->sigla_unidade;
        
        $pdf = PDF::loadView('pdfs.rescisao', ['estagio'=>$this->estagio,'settings'=>$this->settings]);

        $text = str_replace('#sigla_unidade#', $this->settings->sigla_unidade, $this->settings->gerar_rescisao_mail);
        $text = str_replace('#estagiario_nome#', $this->estagio->nome, $text);
        $text = str_replace('#estagiario_numero_usp#', $this->estagio->numero_usp, $text);

        return $this->view('emails.gerar_rescisao')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'rescisao.pdf')
                    ->with([
                        'text' => $text
                    ]);
    }
}
