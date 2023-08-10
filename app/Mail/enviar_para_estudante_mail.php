<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Empresa;
use App\Models\Estagio;
use PDF;
use Uspdev\Replicado\Pessoa;

class enviar_para_estudante_mail extends Mailable
{
    use Queueable, SerializesModels;
    private $estagio;
    private $estudante_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Estagio $estagio)
    {
        $this->estagio = $estagio;

        $this->estudante_email = Pessoa::email($this->estagio->numero_usp);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $to = [$this->estudante_email,config('mail.reply_to.address')];

        $subject = $this->estagio->nome . ' - Documentos Relativos a Estágio - FFLCH-USP';
        $pdf = PDF::loadView('pdfs.termo', ['estagio'=>$this->estagio]);
        return $this->view('emails.enviar_para_estudante')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'termo.pdf')
                    ->with([
                        'estagio' => $this->estagio,
                    ]);
    }
}
