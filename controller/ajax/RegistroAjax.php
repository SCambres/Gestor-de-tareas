<?php

include_once("../../model/Users.php");
include_once ("../../config/global.php");

//Recogida de los datos del formulario a traves de la llamada AJAX
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$ConfirmPassword = $_POST['ConfirmPassword'];

//INSTANCIAMOS LA CLASE ANTES
$user = new Users();

//CONTROLAMOS EN PRIMER LUGAR QUE NO EXISTA YA ESE EMAIL REGISTRADO, LUEGO QUE SE
//SUBA IMAGEN O NO, Y SI SE SUBE QUE SEA DEL FORMATO CORRECTO Y SE CARGUE BIEN
if ($user->existsEmail($Email)){
    echo "EmailExist";
} else {

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK){
        $Imagen_tmp = $_FILES["file"]["tmp_name"];

        $nombre = $_FILES["file"]["name"];

        $target_dir= "/view/img/";

        $target_file = $_SERVER['DOCUMENT_ROOT'] . $target_dir . $nombre;

        $uploadOk = 1;

        $allowedExtensions = array('jpeg', 'jpg', 'png');
        $fileExtension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        if(!in_array($fileExtension, $allowedExtensions)){
            echo "InvalidFile";
            return;
        }

        if (move_uploaded_file($Imagen_tmp, $target_file)){
            $user->setImage($nombre);
        } else{
            echo "errorFile";
            return;
        }
    }

    $user->setName($Name);
    $user->setEmail($Email);
    $user->setPassword($Password);
    $user->create();
    echo true;
}