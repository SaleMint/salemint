<?php
$heading = '';

$auth = new AuthMiddleware;
$auth->handle();

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

$config = require('config.php');



$items = new Product;
$cart = new Cart;

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    if (isset($_POST['product_id'])) {
        $id= $_POST['product_id'];
        $auth->handle();
        $decoded = JWT::decode($_COOKIE['jwt'], new key($config['JWT_SECRET'], 'HS512'));
        $payload = (array) $decoded;

        $cart->addproduct($_POST['product_id'],$payload['userid']);

        header("Location: product?id=$id");

        exit;

    }
}



if (isset($_GET['id'])) {
    $product  = $items->findbyid($_GET['id']);
    if ($product == false) {
        abort();
    }
} else {
    abort();
}




require 'views/product.view.php';
