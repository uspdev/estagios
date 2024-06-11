<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;
use Uspdev\Replicado\Estrutura;

return new class extends SettingsMigration
{
    public function up(): void
    {
        try {
            $unidade = Estrutura::obterUnidade(env('REPLICADO_CODUNDCLG'));
        } catch (\Throwable $th) {
            throw new Exception("Por favor, verifique a configuração de conexão com o replicado. Erro: '{$th->getMessage()}'.");
        }

        $this->migrator->add('general.logo', 'logo.jpg');
        $this->migrator->add('general.sigla_unidade', trim($unidade['sglund']) . "-USP");
        $this->migrator->add('general.endereco_unidade', "{$unidade['epflgr']}, ". trim($unidade['numlgr']) .  " - {$unidade['nombro']}, {$unidade['cidloc']} - {$unidade['sglest']}, CEP: {$unidade['codendptl']}");
        $this->migrator->add('general.email', 'Endereço de e-mail da seção de estágios da sua unidade');
    }

    public function down()
    {
        $this->migrator->delete('general.logo');
        $this->migrator->delete('general.sigla_unidade');
        $this->migrator->delete('general.endereco_unidade');
        $this->migrator->delete('general.email');
    }
};
