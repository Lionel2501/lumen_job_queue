<?php 

return [
    'connections' => [
        'sync' => [
            'driver' => 'database',
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
        ]
    ],
    'failed' => [
        'driver' => 'database',
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
        'queue' => null,
        'retry_after' => 90,
    ],
];

