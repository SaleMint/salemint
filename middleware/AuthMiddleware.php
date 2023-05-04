<?php

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;




class AuthMiddleware{
  
    public function handle()
    
    
    {
      
        $config = require('config.php');
        
        require __DIR__ . '/../vendor/autoload.php';
        
        
        

        if (!isset($_COOKIE['jwt'])) {
            // Redirect user to login page
            header('location: /login');
            exit();
        }
        
        // Verify token
        $token = $_COOKIE['jwt'];
        try {
            $decoded = JWT::decode($_COOKIE['jwt'], new Key($config['JWT_SECRET'], 'HS512'));
        
        } catch (Exception $e) {
            // Token is invalid, redirect user to login page
            header('location: /login');
            exit();
        }
       
    }
}