Estágios FFLCH

Procedimentos de deploy básico para desenvolvimento:

    composer install
    cp .env.example .env
    php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=assets --force
    php artisan migrate:fresh --seed


Etapas do estágio:

novo_estagio: elaboracao - analise - parecer - aprovado - finalizado
renovacao: elaboracao - analise - parecer - aprovado - finalizado
aditivo_alteracoes: elaboracao - analise

- Elaboração (Empresa) - Somente aqui pode ser deletado
- Análise (Comissão de Graduação)-> campo para comentários
- Parecer (Docente) -> campos do parecer
  - Negado (volta para comissão de graduação)
  - Aprovado
- Em Elaboração Aditivo de Alterações
- Aditivo de Alterações (Empresa)
- Análise (Comissão de Graduação)-> campo para comentários
- Em Elaboração Renovação
- Análise renovação
- parecer renovação
