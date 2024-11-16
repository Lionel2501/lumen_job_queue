<?php 

return [
    'driver' => env('SESSION_DRIVER', 'file'),
    'connection' => env('SESSION_CONNECTION', 'default'),
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => storage_path('framework/sessions'),
    'lottery' => [2, 100],
];
