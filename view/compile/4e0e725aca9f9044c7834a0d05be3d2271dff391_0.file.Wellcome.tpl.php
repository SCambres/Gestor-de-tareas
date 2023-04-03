<?php
/* Smarty version 4.3.0, created on 2023-03-06 14:54:25
  from '/var/www/ejercicios/tienda_formacion/view/Wellcome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6405f0913a5be4_73587133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e0e725aca9f9044c7834a0d05be3d2271dff391' => 
    array (
      0 => '/var/www/ejercicios/tienda_formacion/view/Wellcome.tpl',
      1 => 1678110863,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/header.tpl' => 1,
    'file:layout/headerModuleView.tpl' => 1,
    'file:layout/footer.tpl' => 1,
  ),
),false)) {
function content_6405f0913a5be4_73587133 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layout/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:layout/headerModuleView.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="tablaPedidos">
    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaProducto']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
            <tr id="product<?php echo $_smarty_tpl->tpl_vars['product']->value['Id'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['product']->value['Id'];?>
">
                <td><?php echo $_smarty_tpl->tpl_vars['product']->value['Id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['product']->value['Name'];?>
</td>
                <td>
                    <button type="button" class="btn btn-primary btn-group" onclick="location.href='index.php?ctrl=Detalles&producto=<?php echo $_smarty_tpl->tpl_vars['product']->value['Id'];?>
'">VER DETALLES</button>
                    <?php if ($_SESSION['Type'] == 'admin' || $_SESSION['Type'] == 'customer') {?>
                        <button type="button" class="btn btn-primary btn-group" onclick="comprarProducto(<?php echo $_smarty_tpl->tpl_vars['product']->value['Id'];?>
)">COMPRAR</button>
                        <?php if ($_SESSION['Type'] == 'admin') {?>
                            <button type="button" class="btn btn-secondary btn-group" onclick="location.href='index.php?ctrl=Editar&producto=<?php echo $_smarty_tpl->tpl_vars['product']->value['Id'];?>
'">EDITAR</button>
                            <button type="button" class="btn btn-danger btn-group" onclick="location.href='index.php?ctrl=Borrar&producto=<?php echo $_smarty_tpl->tpl_vars['product']->value['Id'];?>
'">ELIMINAR</button>
                        <?php }?>
                    <?php }?>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    <?php if ($_SESSION['Type'] == 'admin' || $_SESSION['Type'] == 'customer') {?>
        <div>
            <button type="button" class="btn btn-primary" onclick="location.href='index.php?ctrl=Pedidos'">VER TODOS LOS PEDIDOS</button>
        </div>
        <?php if ($_SESSION['Type'] == 'admin') {?>
            <div>
                <button type="button" class="btn btn-primary" onclick="location.href='index.php?ctrl=Crear'">AÑADIR NUEVO PRODUCTO </button>
            </div>
        <?php }?>
    <?php if ((isset($_SESSION['carrito'])) && count($_SESSION['carrito']) > 0) {?>
    <div>
        <button type="button" class="btn btn-danger" onclick="vaciarCarrito()">VACIAR CARRITO</button>
    </div>
    <?php }?>
    <?php }?>

</div>
<?php $_smarty_tpl->_subTemplateRender('file:layout/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
