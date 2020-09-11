<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Estagio;
use Auth;
use Uspdev\Replicado\Pessoa;

class EstagioStatusChangeMail extends Mailable
{
    use Queueable, SerializesModels;

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
        $to = [config('mail.reply_to.address'), Auth::user()->email];

        $nome = Pessoa::nomeCompleto($this->estagio->numero_usp);
        $status = $this->estagio->getStatus()[$this->estagio->status]['name'];
              
        $subject = "Estágio de - {$nome} - alterado para: {$status}";    

        return $this->view('emails.estagio_status_change')
                    ->to($to)
                    ->subject($subject)
                    ->with([
                        'estagio' => $this->estagio,
                        'nome'    => $nome,
                        'status'  => $status,
                    ]);
    }
}
