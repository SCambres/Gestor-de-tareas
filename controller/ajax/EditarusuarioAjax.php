<?php
//INCLUDES DE LOS MODELOS
include_once("../../model/Users.php");
include_once ("../../config/global.php");

//Recogida de los datos del formulario a traves de la llamada AJAX
$Id = $_POST['Id'];
//$Name = $_POST['Name'];
//$Email = $_POST['Email'];
//$Imagen = $_POST['Image'];


$user = new Users();

if (isset($_POST['Name'])){
    $Name = $_POST['Name'];
    $user->setName($Name);
    $user->setIdUser($Id);
//    $user->saveName();

    $guardados = $user->saveName();
    if ($guardados){
        echo true;
    } echo false;
}

if (isset($_POST['Email'])){
    $Email = $_POST['Email'];
    $user->setEmail($Email);
    $user->setIdUser($Id);
//    $user->saveEmail();

    $guardados = $user->saveEmail();
    if ($guardados){
        echo true;
    } echo false;
}

//if (isset($_POST['Image'])){
//    $ImagenBorrar = $_POST['Image'];
//
//    unlink("Demo/view/img/$ImagenBorrar");
//
//    $user->setImage();
//    $user->setIdUser($Id);
////    $user->saveImage();
//
//    $guardados = $user->saveImage();
//    if ($guardados){
//        echo true;
//    } echo false;
//}
//Instancia del producto y seteo de sus atributos con los datos recogidos

//Llamada a la sentencia SQL para actualizar los datos en la BD
