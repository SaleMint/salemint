<?php


class Cart

{


    private $db;

    public function __construct()
    {

        $config = require('config.php');
        $this->db = new Database($config['database']);
    }


    public function all(Database $db)
    {
        $allcarts =  $db->query('SELECT * FROM carts')->fetchAll();

        return $allcarts;
    }

    public function findbyuserid($userid)
    {
        $result = $this->db->query('SELECT * FROM carts WHERE user_id = :id', [
            'id' => $userid
        ])->fetch();
        return $result;
    }



    public function create($userid)
    {
        if(!$this->findbyuserid($userid)){
            $this->db->query(
                'INSERT INTO `carts` (`user_id`)
             VALUES (:user_id)',
                [
                    'user_id' => $userid
                ]
            );
        }
       
    }

    public function addproduct($productid, $userid)
    {
        //$cart = $this->findbyuserid($userid);
        $productsArray =  $this->getproductIDs($userid);

        $newProductArray = [$productid];

        if ($productsArray == false) {

            $this->db->query(
                'UPDATE `carts` SET `product_ids` = :productid WHERE `user_id` =:userid',
                [
                    'productid' => serialize($newProductArray),
                    'userid' => $userid

                ]

            );
        } else {

            if(!in_array($productid,$productsArray)){

                $combiendArray =    array_merge($productsArray, $newProductArray);



                $serialized_array = serialize($combiendArray);
    
                $this->db->query(
                    'UPDATE `carts` SET `product_ids` = :productid WHERE `user_id` =:userid',
                    [
                        'productid' => $serialized_array,
                        'userid' => $userid
    
                    ]
    
                );
            }

     
        }
    }


    // returns products as array

    public function getproductIDs($userid){
        $cart = $this->findbyuserid($userid);

        if(!is_null($cart['product_ids'])){ 
                   $productsIDs = unserialize($cart['product_ids']);
                   return $productsIDs;
       
                }

    }



    public function removeproduct($productid,$userid)
    {
        $products =  $this->getproductIDs($userid);

        $key = array_search($productid,$products);
        

        
            unset($products[$key]);

        

        $serialized_array = serialize($products);

        $this->db->query(
            'UPDATE `carts` SET `product_ids` = :productid WHERE `user_id` =:userid',
            [
                'productid' => $serialized_array,
                'userid' => $userid

            ]

        );

    }



}
