<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Uspdev\Replicado\Pessoa;
use App\Models\Empresa;
use App\Models\Estagio;
use PDF;

class enviar_para_parecerista_mail extends Mailable
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

        $to = [$this->estagio->parecerista->email,config('mail.reply_to.address')];
              
        $subject = $this->estagio->nome. ' - Parecer de Mérito - FFLCH-USP';

        $pdf = PDF::loadView('pdfs.parecer', ['estagio'=>$this->estagio]);      

        return $this->view('emails.enviar_para_parecerista')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'parecer.pdf')
                    ->with([
                        'estagio' => $this->estagio,
                    ]);
    }
}
