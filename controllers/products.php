<?php
$heading = 'All Products';
$productsCount = 0;

$config = require('config.php');
$db = new Database($config['database']);

$items = new Product($db);

$productsByPage = 20; // set the limit of how many products to get 

$current_page = isset($_GET['page']) ? $_GET['page'] : 1; //set page to 1 by defult

$total_pages = ceil(count($items->all()) / $productsByPage);

$offset = ($current_page - 1) * $productsByPage;


if ($current_page > 0) {
    $products = $items->getbypage($offset, $productsByPage);
    $productsCount = count($products);
}

if ($current_page < 0) {
    $products = [];
}




if (isset($_GET['search'])) {
    $products  = $items->search($_GET['search']);
    $productsCount = count($products);
}




require 'views/products.view.php';
