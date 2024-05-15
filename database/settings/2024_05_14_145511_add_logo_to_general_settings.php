<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.logo', 'logo.png');
    }

    public function down()
    {
        $this->migrator->delete('general.logo');
    }
};
