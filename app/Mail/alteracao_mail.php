<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Uspdev\Replicado\Pessoa;
use App\Models\Empresa;
use App\Models\Estagio;
use App\Service\GeneralSettings;
use PDF;

class alteracao_mail extends Mailable
{
    use Queueable, SerializesModels;
    private $estagio;
    private $settings;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Estagio $estagio)
    {
        $this->estagio = $estagio;
        $this->settings = app(GeneralSettings::class);
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

        $subject = $this->estagio->nome . ' - Setor de Estágios ' . $this->settings->sigla_unidade . ' - Existe uma alteração pendente neste estágio que necessita de avaliação';           

        return $this->view('emails.alteracao')
                    ->to($to)
                    ->subject($subject)
                    ->with([
                        'estagio' => $this->estagio,
                        'settings' => $this->settings
                    ]);
    }
}
