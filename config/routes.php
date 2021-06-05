<?php

use App\Controller\HomeController;
use App\Controller\MemeController;

$routes = [
    '/' => [
        HomeController::class,
        'home'
    ],
    '/home' => [
        HomeController::class,
        'home'
    ],
    '/list-meme' => [
        \App\Controller\MemeController::class,
        'listMemes'
    ],
    '/list-memes/view' => [
        \App\Controller\MemeController::class,
        'singleMeme'
    ]
];

return $routes;