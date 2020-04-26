<?php

return [
    'admin' => [
        'App\\Models\\Post' => [
            'view',
            'view-any',
            'create',
            'update',
            'delete',
            'import',
            'export',
            'update-attr-user_id',
            'view-attr-user_id',
            'view-attr-user',
        ],
    ],
    'user' => [
        'App\\Models\\Post' => [
            'view',
            'update-self',
            'view-any',
        ],
    ],
];

