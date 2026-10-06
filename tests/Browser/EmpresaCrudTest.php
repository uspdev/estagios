<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EmpresaCrudTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->press('Empresa - Primeiro Acesso')
                ->type('cnpj', '76.803.621/0001-75')
                ->type('email', 'test@example.com')
                ->press('Enviar')
                ->assertSee('Informações de login enviadas para o email: test@example.com');
        });
    }
}
