<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Empresa;
use App\Models\Estagio;
use PDF;

class alteracao_mail extends Mailable
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

        $to = [Pessoa::email($this->estagio->numparecerista),
               config('mail.reply_to.address')
              ];

        $subject = $this->estagio->nome . ' - Setor de Estágios - Foi realizada uma alteração neste estágio';         

        $pdf = PDF::loadView('pdfs.aditivo', ['estagio'=>$this->estagio]);      

        return $this->view('emails.alteracao')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'aditivo.pdf')
                    ->with([
                        'estagio' => $this->estagio,
                    ]);
    }
}
