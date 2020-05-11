<?php

$estagios =  [
    [
        'text' => 'Listar',
        'url'  => '/estagios',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/estagios/create'
    ],
];

$vagas =  [
    [
        'text' => 'Listar',
        'url'  => '/vagas',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/vagas/create'
    ],
];

$empresas =  [
    [
        'text' => 'Listar',
        'url'  => '/empresas',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/empresas/create'
    ],
];

$convenios =  [
    [
        'text' => 'Listar',
        'url'  => '/convenios',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/convenios/create'
    ],
];

$avisos =  [
    [
        'text' => 'Listar',
        'url'  => '/avisos',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/avisos/create'
    ],
];

$pareceristas =  [
    [
        'text' => 'Listar',
        'url'  => '/pareceristas',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/pareceristas/create',
    ],
];


return [
    'title'=> 'Estágios FFLCH',
    'dashboard_url' => '/',
    'logout_method' => 'GET',
    'logout_url' => '/logout',
    'login_url' => '/',
    'menu' => [
        [
            'text'    => 'Vagas',
            'submenu' => $vagas,
        ],
        [
            'text'    => 'Estágios',
            'submenu' => $estagios,
        ],
        [
            'text'    => 'Empresas',
            'submenu' => $empresas,
        ],
        [
            'text'    => 'Avisos',
            'submenu' => $avisos,
        ],
        [
            'text'    => 'Convênios',
            'submenu' => $convenios,
        ],
        [
            'text'    => 'Pareceristas',
            'submenu' => $pareceristas,
        ],
    ]
];
