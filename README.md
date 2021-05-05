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

Sistema de Estágio FFLCH - Empresa
https://youtu.be/0TY25JRCJ1E 

- Login por email apenas
- Cadastrar vagas para divulgação
- Cadastrar novos estagiários
- Ver Termo

Setor de graduação:
Sistema de Estágio FFLCH - Setor de Graduação
https://youtu.be/vDPAj9MbjM0

- Cadastrar e editar empresas - em especial quando essa muda de email
- Cadastrar Avisos 
- Cadastrar/Excluir novos parecerista e definir qual é o presidente
- Listar estágios e dar parecer técnico

Pareceristas:

Sistema de Estágio FFLCH - Parecerista 
https://youtu.be/UHg433C2JkE 

- Dar pareceres de méritos


# Regras

## Aditivos de Alterações

// OK
- A empresa solicitou um aditivo: o status do estágio muda para 'Análise Técnica'.

  aprovado_graduacao=NULL
  aprovado_parecerista=NULL
  comentario_graduacao=empty
  comentario_parecerista=empty

//

- O setor de graduação pode:

// OK
Se aprovado diretamente pelo setor de graduação:

  aprovado_graduacao=1
  aprovado_parecerista=1
  comentario_graduacao=opcional
  comentario_parecerista=empty
//

// OK
Se reprovado diretamente pelo setor de graduação:

  aprovado_graduacao=0
  aprovado_parecerista=NULL
  comentario_graduacao=obrigatório
  comentario_parecerista=empty
//

// OK
Se encaminhado pelo setor de graduação para o parecerista (mostra na lista dos pareceristas): 

  aprovado_graduacao=NULL
  aprovado_parecerista=NULL
  comentario_graduacao=obrigatório
  comentario_parecerista=empty
//


Quando o parecerista aprova:

  aprovado_graduacao=NULL
  aprovado_parecerista=1
  comentario_graduacao=Já vai estra preenchido
  comentario_parecerista=obrigatório

Quando o parecerista reprova:

  aprovado_graduacao=NULL
  aprovado_parecerista=0
  comentario_graduacao=Já vai estra preenchido
  comentario_parecerista=obrigatório

Graduação recebe de volta e deve aprovar ou reprovar:

  aprovado_graduacao=NULL -> graduação tera a palavra final
  aprovado_parecerista=0|1
  comentario_graduacao=Já vai estra preenchido
  comentario_parecerista=obrigatório





## Models

|   campo  |    descrição                | é usado?|
|----------|-----------------------------|---------|
| codpes   | Número USP do aluno         | sim     |
| cnpj     | CNPJ da empresa contratante | sim     |










