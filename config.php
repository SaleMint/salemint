<?php

return [
    'database' => [
        'host' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],
        'dbname' => $_ENV['DB_NAME'],
        'charset' => 'utf8mb4',
    ],

    'JWT_SECRET' => $_ENV['JWT_SECRET']


];
