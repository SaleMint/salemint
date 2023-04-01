<?php



session_start();

require __DIR__ . '/vendor/autoload.php';

require  'middleware/AuthMiddleware.php';

require 'Database.php';


require __DIR__. '/models/User.php';
require __DIR__. '/models/Product.php';
require __DIR__. '/models/Cart.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();    



require 'functions.php';

require 'router.php';





