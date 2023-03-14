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
        'can'  => 'logado',
    ],
    
    [
        'text' => 'Cadastrar',
        'url'  => '/vagas/create',
        'can'  => 'logado',
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

$menudoparecerista =  [
    [
        'text' => 'Todos os meus Pareceres',
        'url'  => '/meus_pareceres',
        'can'     => 'parecerista',
    ],
    [
        'text' => 'Estágios para Parecer de Mérito e Análises de Aditivo',
        'url'  => '/parecer_merito',
        'can'     => 'parecerista',
    ],
    [
        'text' => 'Estágios Rescindidos',
        'url'  => '/estagios_rescindidos',
        'can'     => 'parecerista',
    ],
];

$right_menu = [
    [
        'text'   => '<i class="fas fa-cog"></i>',
        'title'  => 'logs',
        'target' => '_blank',
        'url'    => config('app.url') . '/logs',
        'align'  => 'right',
        'can'    => 'admin',
    ],
    [
        'text' => '<i class="fas fa-cogs"></i>',
        'title' => 'Configurações',
        'url' => config('app.url') . '/settings',
        'align' => 'right',
        'can'   => 'admin'
    ],

];


return [
    'title' => 'Estágios',
    'skin' => env('USP_THEME_SKIN', 'uspdev'),
    'container' => 'container container-fflch',
    'app_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login/usp',
    'right_menu' => $right_menu,
    'menu' => [
        [
            'text'    => 'Mural de Vagas',
            'submenu' => $vagas,
            'can'     => 'logado',
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
            'text'    => 'Acessar Pareceres',
            'submenu' => $menudoparecerista,
            'can'     => 'parecerista',
        ],

        [
            'text'    => 'Estatísticas',
            'url'     => '/estatisticas',
            'can'     => 'logado',
        ],

        [
            'text'    => 'Relatórios',
            'url'     => '/reports',
            'can'     => 'admin',
        ],

        [
            'text'    => 'Meu estágio',
            'url'     => '/estudantes',
            'can'     => 'logado',
        ],
    ]
];
