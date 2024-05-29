<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Uspdev\Replicado\Pessoa;
use App\Models\Empresa;
use App\Models\Estagio;
use App\Models\File;
use App\Service\GeneralSettings;

class enviar_relatorio_mail extends Mailable
{
    use Queueable, SerializesModels;
    private $estagio;
    private $file;
    private $settings;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Estagio $estagio, File $file)
    {
        $this->estagio = $estagio;
        $this->file = $file;
        $this->settings = app(GeneralSettings::class);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $to = [config('mail.reply_to.address')];
        if($this->estagio->parecerista) {
            array_push($to,$this->estagio->parecerista->email);
        }
              
        $subject = $this->estagio->nome. ' - Foi enviado um novo relatório no estágio - ' . $this->settings->sigla_unidade;

        return $this->view('emails.novo_relatorio')
            ->to($to)
            ->subject($subject)
            ->with([
                'estagio' => $this->estagio,
                'file' => $this->file,
                'settings' => $this->settings
            ]);
    }
}
