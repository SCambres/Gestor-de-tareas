<?php

include_once ("../../model/Users.php");
include_once ("../../config/global.php");

$Email = $_POST['email'];
$Password = $_POST['password'];



    if (isset($Email) && isset($Password)){
        $usuario = new Users();
        $usuario->setEmail($Email);
        $usuario->setPassword($Password);
        $login = $usuario->login();
        if ($login){
            echo true;
        } else{
            echo false;
        }
    }




