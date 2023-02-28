<?php

class User
{


  private $db;

  public function __construct()
  {
    $config = require('config.php');
    $this->db = new Database($config['database']);
  }

  public function all()
  {
    $allproducts =  $this->db->query('SELECT * FROM users')->fetchAll();

    return $allproducts;
  }

  public function findbyid($id)
  {
    $result = $this->db->query('SELECT * FROM users WHERE id = :id', [
      'id' => $id
    ])->fetch();
    return $result;
  }

  public function findall($query)
  {
    $result = $this->db->query('SELECT * FROM products WHERE name LIKE :search
      OR category LIKE :search
      OR brand LIKE :search

      ', [
      'search' => '%' . $query . '%'
    ])->fetchAll();

    return $result;
  }
}
