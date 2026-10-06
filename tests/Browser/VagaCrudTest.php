<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class VagaCrudTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_crud_vagas(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Entrar')
                ->type('loginUsuario', 111111)
                ->press('Login')
                ->waitForText('Mural de Vagas');
            
            #Create
            $browser->clickLink('Mural de Vagas')
                ->clickLink("Cadastrar")
                ->type('titulo', 'Vaga Teste')
                ->type('descricao', 'Descrição teste')
                ->type('beneficios', 'Teste')
                ->type('expediente', '30')
                ->type('salario', '1621')
                ->type('horario', 'Diurno')
                ->type('divulgar_ate', '30/07/2050')
                ->type('contato', 'Teste')
                ->type('email', 'teste@gmail.com')
                ->press('Enviar')
                ->waitForText('Dados da Vaga');

            #Edit
            $browser->clickLink('Editar')
                ->pause(1000)
                ->type('titulo', 'Vaga Teste editada')
                ->type('salario', '14000')
                ->press('Enviar')
                ->waitForText('Dados da Vaga');
                
            #Delete
            $browser->clickLink('Mural de Vagas')
                ->clickLink('Listar')
                ->click('.destroy_btn')
                ->assertDialogOpened('Tem certeza que deseja deletar?')
                ->acceptDialog()
                ->assertSee('Sem permissão para executar ação');
        });
    }
}
