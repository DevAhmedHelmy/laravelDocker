<?php

return [
    'role_structure' => [
        'super_admin' => [
            'companies'                 => 'c,r,u,d,p,ex',
            'categories'                => 'c,r,u,d,p,ex',
            'products'                  => 'c,r,u,d,p,ex',
            'clients'                   => 'c,r,u,d,p,ex',
            'orders'                    => 'c,r,u,d,p,ex',
            'users'                     => 'c,r,u,d,p,ex',
            'jobs'                      => 'c,r,u,d,p,ex',

        ],
        'admin' => [
            'categories' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'users' => 'c,r,u,d',
        ]
    ],

    'permissions_map' => [
        'c'     => 'create',
        'r'     => 'read',
        'u'     => 'update',
        'd'     => 'delete',
        'p'     => 'print',
        'ex'    => 'excel'
    ]
];
