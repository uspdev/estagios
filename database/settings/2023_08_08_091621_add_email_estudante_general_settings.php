<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.enviar_para_estudante_mail', file_get_contents(__DIR__ . "/defaults/enviar_para_estudante_mail.txt"));
    }
};
