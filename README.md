Estágios FFLCH

Procedimentos de deploy básico para desenvolvimento:

    composer install
    cp .env.example .env
    php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=assets --force
    php artisan migrate:fresh --seed


Vizualizar etapas do estágio:

    sudo apt-get install graphviz
    php artisan workflow:dump -v workflow_estagio --class=App\\Estagio

![workflow](https://raw.githubusercontent.com/fflch/estagios/master/workflow_estagio.png)

## Tutoriais

Empresa 1:

- Login por email apenas
- Cadastrar vagas para divulgação
- Cadastrar novos estagiários
- Verdo Termo

Setor de graduação:

- Cadastrar e editar empresas - em especial qual essa muda de email
- Cadastrar Avisos 
- Cadastrar/Excluir novos parecerista e definir qual é o presidente
- Listar estágios e dar parecer técnico

Pareceristas:

- Dar pareceres de méritos
