<?php

namespace App\Service;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $alteracao_empresa_mail;
    public string $analise_rescisao_mail;
    public string $enviar_para_analise_tecnica_mail;
    public string $enviar_para_estudante_mail;
    public string $gerar_rescisao_mail;
    public string $alteracao_indeferida_mail;
    public string $assinatura_mail;
    public string $enviar_para_analise_tecnica_renovacao_mail;
    public string $justificativa_analise_tecnica;
    public string $alteracao_mail;
    public string $enviar_analise_academica_mail;
    public string $enviar_para_parecerista_mail;
    public string $login_empresa_mail;
    public string $alteracao_pendente_empresa_mail;
    public string $enviar_justificativa_reprovacao;
    public string $enviar_relatorio_mail;
    public string $rescisao_empresa_mail;

    public string $rodape;
    public string $unidade;
    public string $sigla_unidade;

    public string $header;
    public string $logo;
    public string $aditivo;
    public string $parecer;
    public string $rescisao;
    public string $renovacao;
    public string $termo;

    public static function group(): string
    {
        return 'general';
    }
}
