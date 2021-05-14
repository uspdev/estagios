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

FK = Chave Estrangeira
FID = ID Estrangeiro

|--------------------------------------------------------------------------------------------------------------|
|                                                 Tabela users                                                 |
|---------------------------------|------------------------------------------------------------------|---------|
|          campo                  |                           descrição                              | é usado?|
|---------------------------------|------------------------------------------------------------------|---------|
| name                            | Nome do usuário                                                  | sim     |
| email                           | Email do usuário                                                 | sim     |
| codpes                          | Número USP (caso seja pessoa física)                             | sim     |
| cnpj                            | CNPJ (caso seja empresa)                                         | sim     |
| password                        | Senha                                                            | sim     |
|---------------------------------|------------------------------------------------------------------|---------|



|--------------------------------------------------------------------------------------------------------------|
|                                                 Tabela pareceristas                                          |
|---------------------------------|------------------------------------------------------------------|---------|
|          campo                  |                           descrição                              | é usado?|
|---------------------------------|------------------------------------------------------------------|---------|
| numero_usp                      | Numero USP do parecerista                                        | sim     |
| presidente                      | Identificador de se o parecerista é o presidente da comissão     | sim     |
|---------------------------------|------------------------------------------------------------------|---------|



|--------------------------------------------------------------------------------------------------------------|
|                                                 Tabela convenios                                             |
|---------------------------------|------------------------------------------------------------------|---------|
|          campo                  |                           descrição                              | é usado?|
|---------------------------------|------------------------------------------------------------------|---------|
| cnpj                            | CNPJ da empresa conveniada                                       | sim     |
| nome_representante              | Nome do representante legal                                      | sim     |
| cargo_representante             | Cargo do representante legal                                     | sim     |
| email_representante             | Email do representante legal                                     | sim     |
| rg_representante                | RG do representante legal                                        | sim     |
| cpf_representante               | CPF do do representante legal                                    | sim     |
| nome_representante2             | Nome do representante suplente                                   | sim     |
| cargo_representante2            | Cargo do representante suplente                                  | sim     |
| email_representante2            | Email do representante suplente                                  | sim     |
| rg_representante2               | RG do representante suplente                                     | sim     |
| cpf_representante2              | CPF do representante suplente                                    | sim     |
| descricao                       | Descrição das atividades oferecidas para estágios                | sim     |
| atividade                       | Atividades previstas para os estagiários                         | sim     |
| nome_contato                    | Nome do funcionário de contato                                   | sim     |
| tel_contato                     | Telefone do funcionário de contato                               | sim     |
| email_contato                   | Email do funcionário de contato                                  | sim     |
|---------------------------------|------------------------------------------------------------------|---------|



|--------------------------------------------------------------------------------------------------------------|
|                                                 Tabela empresas                                              |
|---------------------------------|------------------------------------------------------------------|---------|
|          campo                  |                           descrição                              | é usado?|
|---------------------------------|------------------------------------------------------------------|---------|
| nome                            | Nome da empresa                                                  | sim     |
| email                           | Email do representante da empresa                                | sim     |
| cnpj                            | CNPJ da empresa                                                  | sim     |
| area_de_atuacao                 | Área de atuação da empresa                                       | sim     |
| endereco                        | Endereço da empresa                                              | sim     |
| cep                             | CEP da empresa                                                   | sim     |
| nome_do_representante           | Nome do representante da empresa                                 | sim     |
| cargo_do_representante          | Cargo do representante da empresa                                | sim     |
| conceder_acesso_cnpj            | Conceder acesso administrativo a outra empresa cadastrada        | sim     |
|---------------------------------|------------------------------------------------------------------|---------|



|--------------------------------------------------------------------------------------------------------------|
|                                                 Tabela avisos                                                |
|---------------------------------|------------------------------------------------------------------|---------|
|          campo                  |                           descrição                              | é usado?|
|---------------------------------|------------------------------------------------------------------|---------|
| titulo                          | Título do aviso                                                  | sim     |
| corpo                           | Descrição do aviso                                               | sim     |
| divulgacao_home_ate             | Data limite de exibição do aviso na homepage                     | sim     |
|---------------------------------|------------------------------------------------------------------|---------|



|--------------------------------------------------------------------------------------------------------------|
|                                                 Tabela vagas                                                 |
|---------------------------------|------------------------------------------------------------------|---------|
|          campo                  |                           descrição                              | é usado?|
|---------------------------------|------------------------------------------------------------------|---------|
| titulo                          | Título da vaga                                                   | sim     |
| descricao                       | Descrição da vaga                                                | sim     |
| expediente                      | Expediente de trabalho semanal                                   | sim     |
| salario                         | Salário do estágio                                               | sim     |
| horario                         | Horário de trabalho                                              | sim     |
| beneficios                      | Benefícios do trabalho                                           | sim     |
| divulgar_ate                    | Data limite de divulgação                                        | sim     |
| divulgacao_autorizada           | Autorização da divulgação                                        | não     |
| status                          | Status de aprovação da vaga (Aprovada/Reprovada)                 | sim     |
| contato                         | Informação de contato da vaga                                    | sim     |
| user_id (FID)                   | ID do criador da vaga                                            | sim     |
|---------------------------------|------------------------------------------------------------------|---------|



|--------------------------------------------------------------------------------------------------------------|
|                                                 Tabela estagios                                              |
|---------------------------------|------------------------------------------------------------------|---------|
|          campo                  |                           descrição                              | é usado?|
|---------------------------------|------------------------------------------------------------------|---------|
| numero_usp                      | Número USP do aluno                                              | sim     |
| valorbolsa                      | Valor da bolsa do aluno                                          | sim     |
| tipobolsa                       | Natureza do pagamento da Bolsa (Mensal/Por Hora)                 | sim     |
| justificativa                   | Justificativa do Estágio                                         | sim     |
| atividadespertinentes           | Se a atividade é pertinente ao curso                             | sim     |
| horariocompativel               | Compatibilidade do horário de estágio com o curso                | sim     |
| desempenhoacademico             | Avaliação do Desempenho Acadêmico                                | sim     |
| data_inicial                    | Data inicial do estágio                                          | sim     |
| data_final                      | Data final do estágio                                            | sim     |
| cargahoras                      | Carga horária do estágio (Horas)                                 | sim     |
| cargaminutos                    | Carga horária do estágio (Minutos)                               | sim     |
| horario                         | Horário de realização do estágio                                 | sim     |
| auxiliotransporte               | Valor do Auxílio Transporte                                      | sim     |
| especifiquevt                   | Natureza do Auxílio Transporte (Diário/Mensal)                   | sim     |
| cnpj                            | CNPJ da empresa contratante                                      | sim     |
| atividades                      | Descrição das atividades a serem desenvolvidas                   | sim     |
| seguradora                      | Seguradora do estágio                                            | sim     |
| numseguro                       | Numero da apólice do seguro                                      | sim     |
| controlehorario                 | Controle de Horário para estágio á distância                     | sim     |
| supervisao                      | Controle de supervisão para estágio á distância                  | sim     |
| interacao                       | Interação com a empresa e colaboradores para estágio á distância | sim     |
| enderecoedias                   | Endereço e dias que serão realizados estágio á distância         | sim     |
| pandemiahomeoffice              | Estágio presencial no contexto de pandemia (Sim/Não)             | sim     |
| pandemiamedidas                 | Medidas de segurança em caso de estágio presencial               | sim     |
| rescisao_motivo                 | Motivo da rescisão do estágio                                    | sim     |
| rescisao_data                   | Data da Rescisão                                                 | sim     |
| renovacao_justificativa         | Justificativa para Renovação                                     | não     |
| renovacao_parent_id             | ID de pedido de renovação                                        | sim     |
| analise_tecnica                 | Análise técnica do estágio                                       | sim     |
| analise_tecnica_user_id (FK)    | ID de quem realizou a análise técnica                            | não     |
| analise_academica               | Análise acadêmica do estágio                                     | sim     |
| analise_academica_user_id (FK)  | ID de quem realizou a análise acadêmica                          | sim     |
| analise_alteracao               | Análise do pedido de alteração                                   | não     |
| analise_alteracao_user_id (FK)  | ID de quem realizou a análise do pedido de alteração             | não     |
| status                          | Controle de status do estágio                                    | sim     |
| atividadesjustificativa         | Justificativa da pertinencias das atividades do estágio          | sim     |
| tipodeferimento                 | Deferimento Acadêmico (Deferido/Deferido c Restrição/Indeferido) | sim     |
| condicaodeferimento             | Condições em caso de deferimento acadêmico com restrição         | sim     |
| numparecerista                  | Número USP do parecerista do estágio                             | sim     |
| alteracao                       | Aditivo de alteração pendente                                    | sim     |
| last_status                     | Reporta ultimo status do estágio antes do atual                  | sim     |
| nome_do_supervisor_estagio      | Nome do supervisor do estágio                                    | sim     |
| cargo_do_supervisor_estagio     | Cargo do supervisor do estágio                                   | sim     |
| telefone_do_supervisor_estagio  | Telefone do supervisor do estágio                                | sim     |
| email_do_supervisor_estagio     | Email do supervisor do estágio                                   | sim     |
| nome_de_contato                 | Nome do contato da empresa                                       | sim     |
| email_de_contato                | Email do contato da empresa                                      | sim     |
| telefone_de_contato             | Telefone do contato da empresa                                   | sim     |
| avaliacao_empresa               | Avaliação da empresa no realatório final (Positivo/Negativo)     | sim     |
| avaliacaodescricao              | Justificativa da avaliação do relatório final                    | sim     |
|---------------------------------|------------------------------------------------------------------|---------|-



|--------------------------------------------------------------------------------------------------------------|
|                                                 Tabela files                                                 |
|---------------------------------|------------------------------------------------------------------|---------|
|          campo                  |                           descrição                              | é usado?|
|---------------------------------|------------------------------------------------------------------|---------|
| original_name                   | Nome do arquivo                                                  | sim     |
| path                            | Caminho de armazenamento do documento                            | sim     |
| estagio_id (FK)                 | Estágio relativo ao documento                                    | sim     |
| user_id (FK)                    | Dado de quem enviou o arquivo                                    | não     |
| tipo_documento                  | Identificador do tipo de documento (Documento simples/Relatório) | sim     |
|---------------------------------|------------------------------------------------------------------|---------|



|--------------------------------------------------------------------------------------------------------------|
|                                                 Tabela aditivos                                              |
|---------------------------------|------------------------------------------------------------------|---------|
|          campo                  |                           descrição                              | é usado?|
|---------------------------------|------------------------------------------------------------------|---------|
| estagio_id (FID)                | ID do estagio relativo ao aditivo                                | sim     |
| alteracao                       | Aditivo de alteração                                             | sim     |
| aprovado_graduacao              | Aprovação do aditivo por parte do setor de estágios              | sim     |
| aprovado_parecerista            | Aprovação do aditivo por parte do parecerista                    | sim     |
| comentario_graduacao            | Comentário sobre o aditivo do setor de estágios                  | sim     |
| comentario_parecerista          | Comentário sobre o aditivo do parecerista                        | sim     |
|---------------------------------|------------------------------------------------------------------|---------|