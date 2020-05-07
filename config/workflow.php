<?php

$workflow_estagio =
[
    'type' => 'workflow', // or 'state_machine'
    'metadata' => [
        'title' => 'Workflow Estágio',
    ],
    'marking_store' => [
        'type' => 'multiple_state',
        'property' => 'currentPlace', // this is the property on the model
    ],
    'supports' => [\App\Estagio::class],
    'places' => [
        'elaboracao' => [
            'metadata' => [
                'label' => "Em elaboração \n (Empresa)",
            ],
        ],
        'analise_deferida' => [
            'metadata' => [
                'label' => "Deferida",
            ],
        ],
        'analise_indeferida' => [
            'metadata' => [
                'label' => "Indeferida \n devolver para elaboração",
            ],
        ],
        'parecer_deferido'  => [
            'metadata' => [
                'label' => "Deferido",
            ],
        ],
        'parecer_indeferido' => [
            'metadata' => [
                'label' => "Indeferido",
            ],
        ],
    ],
    'transitions' => [
        'analise' => [
            'metadata' => [
                'label' => "Análise \n (Comissão de Graduação)",
            ],
            'from' => 'elaboracao',
            'to' => ['analise_deferida','analise_indeferida']
        ],
        'elaboracao' => [
            'metadata' => [
                'label' => "Devolver para elaboração",
            ],
            'from' => ['analise_indeferida','parecer_indeferido'],
            'to' => ['elaboracao']
        ],
        'parecer' => [
            'metadata' => [
                'label' => "Parecer \n (Coordenador(a))",
            ],
            'from' => 'analise_deferida',
            'to' => ['parecer_deferido','parecer_indeferido']
        ]
    ],
];

return [
    'workflow_estagio' => $workflow_estagio
];
