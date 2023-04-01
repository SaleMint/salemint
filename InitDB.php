<?php
require 'Database.php';
$config = require('config.php');
$db = new Database($config);



$sql = file_get_contents(__DIR__.'/../initial_db.sql');

$queries = explode(';', $sql);

foreach ($queries as $query) {
    $query = str_replace(':DataBaseName',$_ENV['DB_NAME'],$query);
    $db->query($query);
}
