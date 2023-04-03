<?php

include_once("../../model/Tarea.php");
include_once("../../config/global.php");

$Id = $_POST['Id'];
$producto = new Tarea();

$producto->setIdTarea($Id);
if ($producto->load()) {

    $comprobacion = false;

//COMPROBAMOS SI NO EXISTE LA SESION DEL CARRITO
    if (!isset($_SESSION['carrito'])) {
        //LA CREAMOS
        $_SESSION['carrito'][] = [
            'Idproduct' => $producto->getIdTarea(),
            'Name' => $producto->getName(),
            'Quantity' => 1,
            'Stock' => $producto->getDescripcion(),
            'Price' => $producto->getFechaComienzo()];

    } else {

        //EN EL CASO DE QUE EXISTA LA VARIABLE DE SESION LA RECORREMOS
        foreach ($_SESSION['carrito'] as $key => $carrito) {
            //SI DENTRO DEL CARRITO EXISTE YA EL REGISTRO CON EL MISMO ID LE SUMAS UNO
            if ($carrito['Idproduct'] == $producto->getIdTarea()) {
                $_SESSION['carrito'][$key]['Quantity']++;
                //CONDICION DE SALIDA DEL BUCLE, SI ES ES CIERTA LA COMPROBACION NO SIGUES Y SALES CON BREAK
                $comprobacion = true;
                break;
            }
        }
        //SI NO SE HA ENCONTRADO REGISTRO EN EL BUCLE AÑADIMOS EL REGISTRO
        if (!$comprobacion) {
            $_SESSION['carrito'][] = [
                'Idproduct' => $producto->getIdTarea(),
                'Name' => $producto->getName(),
                'Quantity' => 1,
                'Stock' => $producto->getDescripcion(),
                'Price' => $producto->getFechaComienzo()];
        }

    }
    echo count($_SESSION['carrito']);

} else {
    echo false;
}






