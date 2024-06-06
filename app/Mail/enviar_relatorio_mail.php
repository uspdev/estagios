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

        $text = str_replace('#estagiario_nome#', $this->estagio->nome, $this->settings->enviar_relatorio_mail);
        $text = str_replace('#estagiario_numero_usp#', $this->estagio->numero_usp, $text);
        $text = str_replace('#empresa_nome#', $this->estagio->empresa->nome, $text);
        $text = str_replace('#arquivo_nome#', $this->file->original_name, $text);
        $text = str_replace('#sigla_unidade#', $this->settings->sigla_unidade, $text);

        return $this->view('emails.novo_relatorio')
            ->to($to)
            ->subject($subject)
            ->with([
                'text' => $text
            ]);
    }
}
