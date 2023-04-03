<?php
/* Smarty version 4.3.0, created on 2023-03-24 14:32:09
  from '/var/www/Demo/view/layout/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641da659572115_58918689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb160cfd8eb4e46cb32dc932e11b13145b7980df' => 
    array (
      0 => '/var/www/Demo/view/layout/header.tpl',
      1 => 1679664728,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641da659572115_58918689 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Libreria para Jquery-->
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <!-- Archivo js-->
    <?php echo '<script'; ?>
 src="/view/js/archivo.js"><?php echo '</script'; ?>
>
    <!-- Bootstrap libreria estilos-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Bootstrap libreria JavaScript-->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <!-- Font Awesome libreria para iconos -->
    <?php echo '<script'; ?>
 src="https://kit.fontawesome.com/d3ca660c3c.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <!-- SweetAlert2 libreria para personalizar alertas -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@11"><?php echo '</script'; ?>
>
        <!-- Archivo CSS  -->
    <link rel="stylesheet" type="text/css" href="/view/css/estilos.css">


    <title>YouTrack</title>
</head>







<?php }
}
