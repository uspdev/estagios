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

class alteracao_indeferida_mail extends Mailable
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

        $to = [$this->estagio->email_de_contato,config('mail.reply_to.address')];
        
        $subject = $this->estagio->nome . ' - Setor de Estágios FFLCH-USP - O aditivo requisitado foi negado'; 
   

        return $this->view('emails.alteracao_indeferida')
                    ->to($to)
                    ->subject($subject)
                    ->with([
                        'estagio' => $this->estagio,
                    ]);
    }
}
