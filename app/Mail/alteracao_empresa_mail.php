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

class alteracao_empresa_mail extends Mailable
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

        $aditivopendente = null; 

        $to = [$this->estagio->email_de_contato,config('mail.reply_to.address')];
        
        $subject = $this->estagio->nome . ' - Setor de Estágios ' . $this->settings->sigla_unidade . ' - Versão atualizada do parecer de alteração deste estágio'; 

        $pdf = PDF::loadView('pdfs.aditivo', [
            'estagio'=>$this->estagio, 
            'aditivopendente'=>$aditivopendente,
            'settings'=>$this->settings 
        ]);      

        return $this->view('emails.alteracao_empresa')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'aditivo.pdf')
                    ->with([
                        'estagio' => $this->estagio,
                        'settings'=>$this->settings
                    ]);
    }
}
