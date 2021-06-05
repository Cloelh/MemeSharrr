<?php

use App\Controller\HomeController;

$routes = [
    '/' => [
        HomeController::class,
        'home'
    ],
    '/home' => [
        HomeController::class,
        'home'
    ]
];

return $routes;