<?php

include_once("../../config/global.php");
include_once("../../model/Proyectos.php");
include_once("../../model/Order_lines.php");
include_once("../../model/Tarea.php");

$IdUser = $_SESSION['IdUser'];
$Date= date('Y-m-d H:i:s');
$TotalPrice = $_POST['TotalPrice'];

$product = new Tarea();

$order = new Proyectos();
$order->setName($IdUser);
$order->setDescripcion($TotalPrice);
$order->setCategoria($Date);

global $conexion;
//UTILIZACION DE TRANSACCION PHP/MYSQL PARA EJECUTAR COMMIT EN EL CASO DE FUNCIONAR CORRECTAMENTE
//Y ROLLBACK EN EL CASO DE QUE SURJA ALGUN ERROR (TENER EN CUENTA QUE EL ROLLBACK DESHACE LOS INSERTS
//A LAS TABLAS PERO SIGUE INCREMENTANDO EL ID EN LA TABLA)
$conexion->begin_transaction();
$conexion->autocommit(false);
try {
    if ($order->create()){

        $IdOrder = $order->getIdProyecto();

        $order_lines = new Order_lines();
        //RECORREMOS EL ARRAY DE SESION DEL CARRITO Y POR CADA REGISTRO SETAMOS LOS ATRIBUTOS PARA
        //INSERTAR LOS DATOS EN LA TABLA ORDER_LINES
        foreach ($_SESSION['carrito'] as $key => $carrito){

            $order_lines->setOrderId($order->getIdProyecto());
            $order_lines->setProductId($carrito['Idproduct']);
            $order_lines->setQuantity($_SESSION['carrito'][$key]['Quantity']);
            if (!$order_lines->create()){
                throw new Exception("Error al insertar la linea de pedido");
            }
        }
        //COMMIT DE LOS INSERTS, Y UNSET DE EL CARRITO PARA VACIARLO
        $conexion->commit();
        echo true;
        unset($_SESSION['carrito']);
    } else {
        throw new Exception("Error en el pedido");
    }
//CONTROL DE LOS ERRORES MANDANDO AL JS UN OBJETO CON EL MENSAJE
} catch (Exception $e) {
     echo json_encode(["Error" => $e->getMessage()]);
    $conexion->rollback();

}
$conexion->autocommit(true);








