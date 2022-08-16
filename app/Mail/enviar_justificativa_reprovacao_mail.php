<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Vaga;
use PDF;

class enviar_justificativa_reprovacao_mail extends Mailable
{
    use Queueable, SerializesModels;
    private $vaga;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Vaga $vaga)
    {
        $this->vaga = $vaga;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $to = [$this->vaga->email,config('mail.reply_to.address')];
              
        $subject = $this->vaga->nome . ' - JUSTIFICATIVA REPROVAÇÃO VAGA - Setor de Estágios - FFLCH-USP';

        return $this->view('emails.enviar_justificativa_reprovacao')
                    ->to($to)
                    ->subject($subject)
                    ->with([
                        'vaga' => $this->vaga,
                    ]);
    }
}
