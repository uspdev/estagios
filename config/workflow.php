<?php


$workflow_estagio = [
    'type' => 'workflow',
    'marking_store' => [
        'type'     => 'single_state',
        'property' => 'status'
    ],
    'supports' => [\App\Models\Estagio::class],
    'initial_places' => 'em_elaboracao',
    'places' => [
        'em_elaboracao' => [
            'metadata' => [
                'label' => "Em elaboração \n (Empresa)"
            ]
        ],
        'em_analise_tecnica' => [
            'metadata' => [
                'label' => "Em análise Técnica \n (Setor de Graduação)"
            ]
        ],

        'assinatura' => [
            'metadata' => [
                'label' => "Aguardando Assinaturas"
            ]
        ],

        'em_analise_academica' => [
            'metadata' => [
                'label' => "Em análise Acadêmica \n (Docente)"
            ]
        ],
        'concluido' => [
            'metadata' => [
                'label' => "Concluído",
                'bg_color' => '#add8e6'
            ]
        ],
        'em_alteracao' => [
            'metadata' => [
                'label' => "Em elaboração das\n alterações (Empresa)"
            ]
        ],
        'rescisao' => [
            'metadata' => [
                'label' => "Rescisão",
                'bg_color' => '#add8e6'
            ]
        ],
        'cancelado' => [
            'metadata' => [
                'label' => "Estágio Cancelado",
                'bg_color' => '#add8e6'
            ]
        ],
    ],
    'transitions' => [
        'enviar_para_analise_tecnica' => [
            'metadata' => [
                'label' => "Enviar para análise\n técnica"
            ],
            'from' => 'em_elaboracao',
            'to' => 'em_analise_tecnica'
        ],

        'deferimento_analise_tecnica' => [
            'metadata' => [
                'label' => "Deferido"
            ],
            'from' => 'em_analise_tecnica',
            'to' => 'em_analise_academica'
        ],

        'indeferimento_analise_tecnica' => [
            'metadata' => [
                'label' => "Indeferido"
            ],
            'from' => 'em_analise_tecnica',
            'to' => 'em_elaboracao'
        ],

        'enviar_assinatura' => [
            'metadata' => [
                'label' => "Enviar Assinaturas"
            ],
            'from' => 'em_analise_tecnica',
            'to' => 'assinatura'
        ],

        'retornar_assinatura' => [
            'metadata' => [
                'label' => "Retornar Assinaturas"
            ],
            'from' => 'assinatura',
            'to' => 'em_analise_tecnica'
        ],

        'analise_academica' => [
            'metadata' => [
                'label' => "Análise Acadêmica"
            ],
            'from' => 'em_analise_academica',
            'to' => 'concluido'
        ],

        'indeferimento_analise_academica' => [
            'metadata' => [
                'label' => "Indeferido"
            ],
            'from' => 'em_analise_academica',
            'to' => 'em_analise_tecnica'
        ],
        'iniciar_alteracao' => [
            'metadata' => [
                'label' => "Iniciar alterações\n (Empresa)"
            ],
            'from' => 'concluido',
            'to' => 'em_alteracao'
        ],
        'renovacao' => [
            'metadata' => [
                'label' => "Renovação \n(Empresa)"
            ],
            'from' => 'concluido',
            'to' => 'em_elaboracao'
        ],

        'reiniciar_estagio' => [
            'metadata' => [
                'label' => "Reiniciar \n(Empresa)"
            ],
            'from' => 'rescisao',
            'to' => 'em_elaboracao'
        ],

        'rescisao_do_estagio' => [
            'metadata' => [
                'label' => "Estágio rescindido"
            ],
            'from' => 'concluido',
            'to' => 'rescisao'            
        ],        

    ],
];

return [
    'workflow_estagio' => $workflow_estagio
];