<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Estagio;
use PDF;

class GerarRescisaoMail extends Mailable
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

        $subject = $this->estagio->nome . ' - Termo de rescisão - Setor de Estágios FFLCH-USP';
        
        $pdf = PDF::loadView('pdfs.rescisao', ['estagio'=>$this->estagio]);

        return $this->view('emails.gerar_rescisao')
                    ->to($to)
                    ->subject($subject)
                    ->attachData($pdf->output(), 'rescisao.pdf')
                    ->with([
                        'estagio' => $this->estagio,
                    ]);
    }
}
