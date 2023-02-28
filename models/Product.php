<?php


class Product

{


  private $db;

  public function __construct()
  {

    $config = require('config.php');
    $this->db = new Database($config['database']);
  }


  public function all()
  {
    $allproducts =  $this->db->query('SELECT * FROM products')->fetchAll();

    return $allproducts;
  }

  public function findbyid($id)
  {
    $result = $this->db->query('SELECT * FROM products WHERE id = :id', [
      'id' => $id
    ])->fetch();
    return $result;
  }


  public function getbypage($offset, $productsperpage)
  {
    $result = $this->db->query(
      "SELECT * FROM products LIMIT $offset , $productsperpage"
    )->fetchAll();

    return $result;
  }

  public function search($query)
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
