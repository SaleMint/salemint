<?php

$authMiddleware = new AuthMiddleware;
$authMiddleware->handle();

$heading = '';

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;




$config = require('config.php');




$product = new Product;
$cart = new Cart;

$db = new Database($config['database']);
$decoded = JWT::decode($_COOKIE['jwt'], new key($config['JWT_SECRET'], 'HS512'));
$payload = (array) $decoded;

$userid = $payload['userid'];



$cartproducts = $cart->getproductIDs($userid);
$products = [];

$subtotal = 0;

if (!is_null($cartproducts)) {


   foreach ($cartproducts as $item) {
      $products[] =  $product->findbyid($item);
      $subtotal = $product->findbyid($item)['price'] + $subtotal;
   }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $cart->removeproduct($_POST['productid'], $userid);

   header("Location: cart");
}




require "views/cart.view.php";
