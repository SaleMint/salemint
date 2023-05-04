<?php

$heading = 'Login';

$config = require('config.php');



use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;


$db = new Database($config['database']);
$cart = new Cart;


if (isset($_COOKIE['jwt'])) {
    try {

        
        $decoded = JWT::decode($_COOKIE['jwt'], new key($config['JWT_SECRET'], 'HS512'));
        $payload = (array) $decoded ;
        $cart->create($payload['userid']);
        echo "<script> window.location.replace('/') </script>";
        throw new Exception("no jwt token stored in the client side");
    
    } catch (\Throwable $th) {
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') { // check if there's a POST request
    $errors = [];
   
        logIn($db, $config,$errors,$cart);
    
}


function logIn($db, $config, &$errors,$cart)
{

    $issuedAt   = time();
    $expire     = $issuedAt + 2592000;      // Add 1 month 
    $serverName = "localhost";

    //query the database to get the user that matches the email which the user submited
    $user =  $db->query('SELECT * FROM users WHERE email = :email ', [
        'email' => $_POST['email']
    ])->fetch();

    if (!is_bool($user) && isset($user)) {  //sql return an false bool when it dont find matches

        //using PHP built-in function password_verify to check if the two hashed passwords has the same value

        if (password_verify($_POST['password'], $user['password'])) {
            //user password is correct
            $payload = [
                'iat'  => $issuedAt,         // Issued at: time when the token was generated
                'iss'  =>    $serverName,                       // Issuer
                'nbf'  => $issuedAt,         // Not before
                'exp'  => $expire,                           // Expire
                'userid' => $user['id'],                     // User name
            ];

            $jwt = JWT::encode($payload, $config['JWT_SECRET'], 'HS512');

            setcookie('jwt', $jwt, time() + (86400 * 30));

            $db->query(
                'UPDATE users 
            SET token = 
            :token WHERE id =:id',
                [
                    'token' => $jwt,
                    'id' => $user['id']
                ]
            );
            $cart->create($user['id']);

            echo "<script> window.location.replace('/') </script>";

        } else {   //passwords do not have the same value , thus password is incorrect


            $errors['body'] = "credentials are incorrect";
        }
    }
    $errors['body'] = "User does not exist ";
}

require "views/login.php";
