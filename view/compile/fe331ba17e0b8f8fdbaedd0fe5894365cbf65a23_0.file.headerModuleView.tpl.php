<?php
/* Smarty version 4.3.0, created on 2023-03-06 14:28:09
  from '/var/www/ejercicios/tienda_formacion/view/layout/headerModuleView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6405ea69d8ff55_82980845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe331ba17e0b8f8fdbaedd0fe5894365cbf65a23' => 
    array (
      0 => '/var/www/ejercicios/tienda_formacion/view/layout/headerModuleView.tpl',
      1 => 1678109273,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6405ea69d8ff55_82980845 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="index.php?ctrl=Wellcome" class="text-black"><i class="fa-solid fa-shop fa-2x"></i></a>
<div class="toolbar row p-2">
    <div class="wellcome col-6">
        <h2>BIENVENIDO</h2>
        <?php echo $_SESSION['Name'];?>


    </div>

    <div id="carritoConteo" class="trolley col-6 ">
        <?php if (empty($_SESSION['carrito'])) {?>
            <i class="fa fa-shopping-cart fa-2x"></i><span>0</span><br>
        <?php } else { ?>
            <a href="index.php?ctrl=Carrito"><i class="fa fa-shopping-cart fa-2x"></i><span><?php echo count($_SESSION['carrito']);?>
</span></a><br>
        <?php }?>
    </div>
</div>
<div id="logout" class="row p-2">
    <div class="col-12 text-end">
        <a href="index.php?ctrl=Logout" class="text-black"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesion</a>
    </div>
</div><?php }
}
