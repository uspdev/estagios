<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.logo', 'logo.png');
        $this->migrator->add('general.sigla_unidade', 'SIGLA-USP');
        $this->migrator->add('general.endereco_unidade', 'Endereço da sua unidade');
    }

    public function down()
    {
        $this->migrator->delete('general.logo');
        $this->migrator->delete('general.sigla_unidade');
        $this->migrator->delete('general.endereco_unidade');
    }
};
