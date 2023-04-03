<?php

session_start();

error_reporting(E_ALL);ini_set('display_errors', '1');ini_set('track_errors', 1);

const SMARTY_DIR = '/var/www/Demo/vendor/smarty/libs/';
const LOCALHOST_DIR = '/var/www/Demo/';
require(SMARTY_DIR . 'Smarty.class.php');

Global $smarty;
$smarty = new Smarty;

$smarty->template_dir = LOCALHOST_DIR.'view';
$smarty->config_dir = LOCALHOST_DIR.'vendor/smarty/configs';
$smarty->cache_dir = LOCALHOST_DIR.'vendor/smarty/cache';
$smarty->compile_dir = LOCALHOST_DIR.'view/compile';

const urlsite = "http://localhost/Demo/";

global $conexion;
$conexion = mysqli_connect("localhost", "root", "Esturion9064?", "Gestor_tareas");

if ($conexion -> connect_error) {
    die("Conexion fallida: " . $conexion -> connect_error);
}

$conexion->query("SET NAMES 'utf8'");

spl_autoload_register('mi_autoloader');
function mi_autoloader ($nombreClase){
    include_once 'model/'. $nombreClase . '.php';
}



