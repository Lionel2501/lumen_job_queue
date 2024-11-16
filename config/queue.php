<?php 

return [

    'default' => env('QUEUE_CONNECTION', 'database'),

    'connections' => [
        'database' => [
            'driver' => 'database',
            'table' => 'jobs', // Assure-toi que cette table existe bien dans la base de données
            'queue' => 'default',
            'retry_after' => 90, // Temps d'attente avant qu'un job échoue
        ],
    ],

    // Autres configurations, par exemple, pour les délais, les tentatives, etc.
];

