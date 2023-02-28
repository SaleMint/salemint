<?php
$heading = 'All Products';

$config = require('config.php');
$db = new Database($config['database']);

$items = new Product($db);

$productsByPage = 20 ; // set the limit of how many products to get 

$current_page = isset($_GET['page'])?$_GET['page']:1 ; //set page to 1 by defult

$total_pages = ceil(count($items->all())/$productsByPage);

$offset = $offset = ($current_page - 1) * $productsByPage;


if($current_page>0){
    $products = $items->getbypage($offset,$productsByPage);
}

if($current_page < 0 ){
    $products = [];
}




if(isset($_GET['search'])){
    $products  =$items->search($_GET['search']); 
    $productsCount= count($items->search($_GET['search']));
     
    
}




require 'views/products.view.php';