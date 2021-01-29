<?php

$estagios =  [
    [
        'text' => 'Listar',
        'url'  => '/estagios',
        'can'  => 'admin_ou_empresa'
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/estagios/create',
        'can'  => 'empresa'
    ],
];

$vagas =  [
    [
        'text' => 'Listar',
        'url'  => '/vagas',
        'can'  => 'admin_ou_empresa',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/vagas/create',
        'can'  => 'empresa',
    ],
];

$empresas =  [
    [
        'text' => 'Listar',
        'url'  => '/empresas',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/empresas/create',
    ],
];

$convenios =  [
    [
        'text' => 'Listar',
        'url'  => '/convenios',
        'can'     => 'admin',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/convenios/create',
        'can'     => 'admin',
    ],
];

$avisos =  [
    [
        'text' => 'Listar',
        'url'  => '/avisos',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/avisos/create',
        'can'     => 'admin',
    ],
];

$pareceristas =  [
    [
        'text' => 'Listar',
        'url'  => '/pareceristas',
        'can'     => 'admin',
    ],
    [
        'text' => 'Cadastrar',
        'url'  => '/pareceristas/create',
        'can'     => 'admin',
    ],
];


return [
    'title'=> 'Estágios FFLCH',
    'dashboard_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => '/logout',
    'login_url' => '/',
    'menu' => [
        [
            'text'    => 'Mural de Vagas',
            'submenu' => $vagas,
            'can'     => 'admin_ou_empresa',
        ],
        [
            'text'    => 'Estágios',
            'submenu' => $estagios,
            'can'     => 'admin_ou_empresa',
        ],
        [
            'text'    => 'Empresas',
            'submenu' => $empresas,
            'can'     => 'admin',
        ],
        [
            'text'    => 'Avisos',
            'submenu' => $avisos,
            'can'     => 'admin',
        ],
        [
            'text'    => 'Convênios',
            'submenu' => $convenios,
            'can'     => 'nao_habilitado_ainda',
        ],
        [
            'text'    => 'Pareceristas',
            'submenu' => $pareceristas,
            'can'     => 'admin',
        ],
        [
            'text'    => 'Atualização do Cadastro  da Empresa',
            'url'     => '/empresa_update',
            'can'     => 'empresa',
        ],

        [
            'text'    => 'Acessar outra Empresa',
            'url'     => '/acessar_outra_empresa',
            'can'     => 'empresa',
        ],

        [
            'text'    => 'Meus Pareceres',
            'url'     => '/meus_pareceres',
            'can'     => 'parecerista',
        ],

        [
            'text'    => 'Estágios para Parecer de Mérito',
            'url'     => '/parecer_merito',
            'can'     => 'parecerista',
        ],

        [
            'text'    => 'Estágios Rescindidos',
            'url'     => '/estagios_rescindidos',
            'can'     => 'parecerista',
        ],
    ]
];
