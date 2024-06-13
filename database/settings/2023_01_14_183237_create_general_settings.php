<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;
use Uspdev\Replicado\Estrutura;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        try {
            $unidade = Estrutura::obterUnidade(env('REPLICADO_CODUNDCLG'));
        } catch (\Throwable $th) {
            throw new Exception("Por favor, verifique a configuração de conexão com o replicado. Erro: '{$th->getMessage()}'.");
        }

        $this->migrator->add('general.alteracao_empresa_mail', file_get_contents(__DIR__ . "/defaults/alteracao_empresa_mail.txt"));
        $this->migrator->add('general.analise_rescisao_mail', file_get_contents(__DIR__ . "/defaults/analise_rescisao_mail.txt"));
        $this->migrator->add('general.enviar_para_analise_tecnica_mail', file_get_contents(__DIR__ . "/defaults/enviar_para_analise_tecnica_mail.txt"));
        $this->migrator->add('general.gerar_rescisao_mail', file_get_contents(__DIR__ . "/defaults/gerar_rescisao_mail.txt"));
        $this->migrator->add('general.alteracao_indeferida_mail', file_get_contents(__DIR__ . "/defaults/alteracao_indeferida_mail.txt"));
        $this->migrator->add('general.assinatura_mail', file_get_contents(__DIR__ . "/defaults/assinatura_mail.txt"));
        $this->migrator->add('general.enviar_para_analise_tecnica_renovacao_mail', file_get_contents(__DIR__ . "/defaults/enviar_para_analise_tecnica_renovacao_mail.txt"));
        $this->migrator->add('general.justificativa_analise_tecnica', file_get_contents(__DIR__ . "/defaults/justificativa_analise_tecnica.txt"));
        $this->migrator->add('general.alteracao_mail', file_get_contents(__DIR__ . "/defaults/alteracao_mail.txt"));
        $this->migrator->add('general.enviar_analise_academica_mail', file_get_contents(__DIR__ . "/defaults/enviar_analise_academica_mail.txt"));
        $this->migrator->add('general.enviar_para_parecerista_mail', file_get_contents(__DIR__ . "/defaults/enviar_para_parecerista_mail.txt"));
        $this->migrator->add('general.login_empresa_mail', file_get_contents(__DIR__ . "/defaults/login_empresa_mail.txt"));
        $this->migrator->add('general.alteracao_pendente_empresa_mail', file_get_contents(__DIR__ . "/defaults/alteracao_pendente_empresa_mail.txt"));
        $this->migrator->add('general.enviar_justificativa_reprovacao', file_get_contents(__DIR__ . "/defaults/enviar_justificativa_reprovacao.txt"));
        $this->migrator->add('general.enviar_relatorio_mail', file_get_contents(__DIR__ . "/defaults/enviar_relatorio_mail.txt"));
        $this->migrator->add('general.rescisao_empresa_mail', file_get_contents(__DIR__ . "/defaults/rescisao_empresa_mail.txt"));
        $this->migrator->add('general.unidade', $unidade['nomund'] . ' da Universidade de São Paulo');
        $this->migrator->add('general.rodape', file_get_contents(__DIR__ . "/defaults/rodape.txt"));
        $this->migrator->add('general.header', file_get_contents(__DIR__ . "/defaults/header.txt"));
        $this->migrator->add('general.aditivo', file_get_contents(__DIR__ . "/defaults/aditivo.txt"));
        $this->migrator->add('general.parecer', file_get_contents(__DIR__ . "/defaults/parecer.txt"));
        $this->migrator->add('general.renovacao', file_get_contents(__DIR__ . "/defaults/renovacao.txt"));
        $this->migrator->add('general.rescisao', file_get_contents(__DIR__ . "/defaults/rescisao.txt"));
        $this->migrator->add('general.termo', file_get_contents(__DIR__ . "/defaults/termo.txt"));

    }
}
