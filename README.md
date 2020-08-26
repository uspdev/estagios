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

## Features

Empresa:

- Login por email apenas
- Cadastrar vagas para divulgação
- Cadastrar novos estagiários


admin pode:

- Cadastrar e editar empresas
- Cadastrar Aviso
- Cadastrar novos parecerista e definir qual é o presidente


pareceristas
