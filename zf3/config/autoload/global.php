<?php

return [
    'db' => [
        'driver' => 'Pdo_Mysql',
        'dsn' => sprintf(
            'mysql:dbname=%s;host=%s',
            defined('SENTRIFUGO_DBNAME') ? SENTRIFUGO_DBNAME : '',
            defined('SENTRIFUGO_HOST') ? SENTRIFUGO_HOST : 'localhost'
        ),
        'username' => defined('SENTRIFUGO_USERNAME') ? SENTRIFUGO_USERNAME : '',
        'password' => defined('SENTRIFUGO_PASSWORD') ? SENTRIFUGO_PASSWORD : '',
    ],
    'sentrifugo' => [
        'legacy_modules_path' => realpath(__DIR__ . '/../../../application/modules'),
    ],
];
