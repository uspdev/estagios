<?php


$workflow_estagio = [
    'type' => 'workflow',
    'marking_store' => [
        'type'     => 'single_state',
        'property' => 'status'
    ],
    'supports' => [\App\Estagio::class],
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
        'em_analise_tecnica_alteracao' => [
            'metadata' => [
                'label' => "Em análise das alterações \n (Setor de Graduação)"
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

        'deferimento_analise_academica' => [
            'metadata' => [
                'label' => "Deferido"
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

        'enviar_analise_tecnica_alteracao' => [
            'metadata' => [
                'label' => "Enviar para análise"
            ],
            'from' => 'em_alteracao',
            'to' => 'em_analise_tecnica_alteracao'
        ],

        'deferimento_analise_tecnica_alteracao' => [
            'metadata' => [
                'label' => "Deferido"
            ],
            'from' => 'em_analise_tecnica_alteracao',
            'to' => 'concluido'
        ],

        'indeferimento_analise_tecnica_alteracao' => [
            'metadata' => [
                'label' => "Indeferido"
            ],
            'from' => 'em_analise_tecnica_alteracao',
            'to' => 'em_alteracao'
        ],

        'renovacao' => [
            'metadata' => [
                'label' => "Renovação \n(Empresa)"
            ],
            'from' => 'concluido',
            'to' => 'em_elaboracao'
        ],

    ],
];

return [
    'workflow_estagio' => $workflow_estagio
];