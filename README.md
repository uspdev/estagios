Estágios FFLCH

Procedimentos de deploy básico para desenvolvimento:

    composer install
    cp .env.example .env
    php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=assets --force
    php artisan migrate:fresh --seed
