<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Uspdev\Replicado\Pessoa;
use App\Empresa;
use App\Estagio;
use PDF;

class enviar_para_analise_tecnica_renovacao_mail extends Mailable
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

        $to = [Empresa::where('cnpj',$this->estagio->cnpj)->first()->email_de_contato,
               config('mail.reply_to.address')
              ];

        $subject = Pessoa::dump($this->estagio->numero_usp)['nompes'] . ' - Documentos Relatívos a Estágio - FFLCH-USP';      

        $pdf = PDF::loadView('pdfs.renovacao', ['estagio'=>$this->estagio]);        

        return $this->view('emails.enviar_para_analise_tecnica_renovacao')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'renovacao.pdf')
                    ->with([
                        'estagio' => $this->estagio,
                    ]);
    }
}
