<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.logo', 'logo.png');
        $this->migrator->add('general.sigla_unidade', 'SIGLA-USP');
    }

    public function down()
    {
        $this->migrator->delete('general.logo');
        $this->migrator->delete('general.sigla_unidade');
    }
};
