<?php
session_start();


require  'middleware/AuthMiddleware.php';
require 'Database.php';


require __DIR__. '/models/User.php';
require __DIR__. '/models/Product.php';
require __DIR__. '/models/Cart.php';


require __DIR__ . '/vendor/autoload.php';


require 'functions.php';

require 'router.php';





