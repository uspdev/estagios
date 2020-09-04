<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Empresa;
use App\Estagio;
use PDF;

class enviar_para_analise_tecnica_mail extends Mailable
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
        $subject = 'Documentos Relatívos a Estágio - FFLCH-USP';

        $to = [Empresa::where('cnpj',$this->estagio->cnpj)->first()->email_de_contato,
               config('mail.reply_to.address')
              ];

        $pdf = PDF::loadView('pdfs.termo', ['estagio'=>$this->estagio]);
        $pdf2 = PDF::loadView('pdfs.renovacao', ['estagio'=>$this->estagio]);        

        return $this->view('emails.enviar_para_analise_tecnica')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'termo.pdf')
                    ->attachData($pdf2->output(), 'renovacao.pdf')
                    ->with([
                        'estagio' => $this->estagio,
                    ]);
    }
}
