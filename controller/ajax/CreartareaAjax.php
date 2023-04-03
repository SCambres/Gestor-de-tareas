<?php

include_once("../../model/Tarea.php");
include_once("../../model/Users.php");
include_once("../../model/Proyectos.php");
include_once("../../config/global.php");

$tarea = new Tarea();

if (isset($_POST['NameTarea'], $_POST['Descripcion'], $_POST['FechaInicio'], $_POST['FechaFinal'], $_POST['NumeroProyecto'])
    && !empty($_POST['NameTarea']) && !empty($_POST['Descripcion']) && !empty($_POST['FechaInicio']) && !empty($_POST['FechaFinal']) && !empty($_POST['NumeroProyecto'])) {

    $NameTarea = $_POST['NameTarea'];
    $Descripcion = $_POST['Descripcion'];
    $FechaInicio = $_POST['FechaInicio'];
    $FechaFinal = $_POST['FechaFinal'];
    $ProyectoSeleccionado = $_POST['NumeroProyecto'];
    $UserID = $_SESSION['IdUser'];

    $FechaInicio = date('Y-m-d H:i:s', strtotime($FechaInicio));
    $FechaFinal = date('Y-m-d H:i:s', strtotime($FechaFinal));

    $tarea->setName($NameTarea);
    $tarea->setDescripcion($Descripcion);
    $tarea->setFechaComienzo($FechaInicio);
    $tarea->setFechaFinalizacion($FechaFinal);
    $tarea->setProyectoId($ProyectoSeleccionado);
    $tarea->setUserId($UserID);

    $tarea->create();
    echo true;
} else {
    echo false;
}

