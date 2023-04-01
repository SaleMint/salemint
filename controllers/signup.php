<?php

$heading = 'signup';




$data = file_get_contents('php://input');
$config = require('config.php');
$db = new Database($config['database']);

print_r($data);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors= [];
    if($_POST['name']){
        if(strlen($_POST['password'])> 7 ){
            if(filter_var( $_POST['email'] , FILTER_VALIDATE_EMAIL)){
            try {
                $db->query('INSERT INTO `users` (`name`, `email`, `password`) VALUES(
                    :name , :email , :password)',
                    [   
                        'name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'password' =>password_hash( $_POST['password'],PASSWORD_BCRYPT)
                    ]);
                    echo "<script> window.location.replace('login') </script>";
            } catch (PDOException $error) 
            {
                print_r("error".$error->getMessage());
            }
               
                  
                
            }else{
                $errors['body'] = 'invalid email';
            }

        }else{
            $errors['body'] = 'password too short';
        }
        
    } else {
        $errors['body'] = 'Username can not be empty';
    }
   
   

}


require "views/signup.view.php";
