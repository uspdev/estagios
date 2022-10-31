<?php

namespace App\Utils;

use App\Models\Estagio;

class Mapeamento
{
    public static function map($chave){
        $mapeamento = [
            'numero_usp' => 'Número USP',
            'valorbolsa' => 'Valor da bolsa',
            'tipobolsa' => 'Natureza pagamento da bolsa',
            'justificativa' => 'Justificativa do Estágio',
            'atividadespertinentes' => 'Atividade pertinente ao curso',
            'horariocompativel' => 'Compatibilidade do horário de estágio',
            'desempenhoacademico' => 'Avaliação do Desempenho acadêmico',
            'data_inicial' => 'Data inicial do estágio',
            'data_final' => 'Data final do estágio',
            'cargahoras' => 'Carga horária do estágio',
            'cargaminutos' => 'Carga em minutos do estágio',
            'horario' => 'Horário de realização do estágio',
            'auxiliotransporte' => 'Valor do auxílio transporte',
            'especifiquevt' => 'Natureza do Auxílio Transporte',
            'cnpj' => 'CNPJ da empresa',
            'atividades' => 'Descrição das atividades',
            'seguradora' => 'Seguradora do estágio',
            'numseguro' => 'Número da apólice do seguro',
            'controlehorario' => 'Controle de Horário',
            'supervisao' => 'Controle de supervisão interna',
            'interacao' => 'Interação do estagiário com a empresa',
            'enderecoedias' => 'Endereço e dias do estágio',
            'pandemiahomeoffice' => 'Estágio em home office?',
            'pandemiamedidas' => 'Medidas de segurança na pandemia',
            'rescisao_motivo' => 'Motivo de rescisão',
            'rescisao_data' => 'Data de rescisão',
            'renovacao_justificativa' => 'Justificativa para renovação',
            'renovacao_parent_id' => 'ID de pedido de renovação' ,
            'analise_tecnica' => 'Análise técnica',
            'analise_tecnica_user_id' => 'Usuário que realizou a análise técnica',
            'analise_academica' => 'Análise acadêmica',
            'analise_academica_user_id' => 'Usuário que realizou a análise acadêmica',
            'analise_alteracao' => 'Análise do pedido de alteração',
            'analise_alteracao_user_id' => 'Usuário que realizou a análise do pedido de alteração',
            'status' => 'Status do estágio',
            'atividadesjustificativa' => 'Justificativa das atividades do estágio',
            'tipodeferimento' => 'Deferimento Acadêmico',
            'condicaodeferimento' => 'Condição deferimento',
            'numparecerista' => 'Número USP do parecerista',
            'alteracao' => 'Aditivo de alteração pendente',
            'last_status' => 'Último status do estágio',
            'nome_do_supervisor_estagio' => 'Nome do supervisor',
            'cargo_do_supervisor_estagio' => 'Cargo do supervisor',
            'telefone_do_supervisor_estagio' => 'Telefone do supervisor',
            'email_do_supervisor_estagio' => 'E-mail do supervisor',
            'nome_de_contato' => 'Nome de contato da empresa',
            'email_de_contato' => 'E-mail de contato da empresa',
            'telefone_de_contato' => 'Telefone de contato da empresa',
            'avaliacao_empresa' => 'Avaliação da empresa no relatório final',
            'avaliacaodescricao' => 'Justificativa da avaliação do relatório final',
            'nome' => 'Nome do aluno',
            'alteracoesadcionais' => 'Alterações adicionais na renovação',
            'nomcur' => 'Nome do curso',
            'nomhab' => 'Nome da habilitação',
            'nome_do_representante_opcional' => 'Nome do representante da empresa',
            'cargo_do_representante_opcional' => 'Cargo do representante da empresa',
            'email_do_representante_opcional' => 'E-mail do representante da empresa',
            'id' => 'ID',
            
        ];

        return $mapeamento[$chave];
    }
}