<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Empresa;
use App\Models\Estagio;
use PDF;

class alteracao_pendente_empresa_mail extends Mailable
{
    use Queueable, SerializesModels;
    private $estagio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Estagio $estagio)
    {
        $this->estagio = $estagio; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $aditivopendente = true; 

        $to = [$this->estagio->email_de_contato,config('mail.reply_to.address')];
        
        $subject = $this->estagio->nome . ' - Setor de Estágios FFLCH-USP - Um novo aditivo foi requisitado'; 

        $pdf = PDF::loadView('pdfs.aditivo', [
            'estagio'=>$this->estagio, 
            'aditivopendente'=>$aditivopendente,
        ]);      

        return $this->view('emails.alteracao_pendente_empresa')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'aditivo.pdf')
                    ->with([
                        'estagio' => $this->estagio,
                    ]);
    }
}
