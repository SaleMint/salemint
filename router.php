<?php


$path = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/cart' => 'controllers/cart.php',
    '/signup' => 'controllers/signup.php',
    '/logout' => 'controllers/logout.php',
    '/login' => 'controllers/login.php',
    '/products' => "controllers/products.php",
    '/product' => "controllers/product.php"
];


function routeToController($path, $routes)
{
    if (array_key_exists($path, $routes)) {




        require $routes[$path];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

routeToController($path, $routes);
