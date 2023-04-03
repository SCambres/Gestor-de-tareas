<?php

include_once ("../../model/Tarea.php");
include_once ("../../config/global.php");

$Estado = $_POST['estado'];
$idTarea = $_POST['idTarea'];

$tarea = new Tarea();

$tarea->setIdTarea($idTarea);
$tarea->setEstado($Estado);
//crear metodo solo para guardar estado
$guardados = $tarea->save_Estado();

if ($guardados){
   echo true;
} echo false;