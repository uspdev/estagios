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

Features:

admin pode:

- Cadastrar e editar empresas: 21931186000172 tcolaco@r7.com
- Cadastrar Aviso
- Cadastrar novos parecerista e definir qual é o presidente


Empresa pode:

- Login por email apenas
- Cadastrar vagas para divulgação
- Cadastrar novos estagiários

pareceristas
