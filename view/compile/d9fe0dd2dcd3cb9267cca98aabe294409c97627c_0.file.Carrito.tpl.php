<?php
/* Smarty version 4.3.0, created on 2023-03-06 12:14:23
  from '/var/www/ejercicios/tienda_formacion/view/Carrito.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6405cb0fd03588_85846720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9fe0dd2dcd3cb9267cca98aabe294409c97627c' => 
    array (
      0 => '/var/www/ejercicios/tienda_formacion/view/Carrito.tpl',
      1 => 1677859382,
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
function content_6405cb0fd03588_85846720 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layout/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:layout/headerModuleView.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <table class="table mt-5">
        <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Precio acumulado producto</th>

        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_SESSION['carrito'], 'carrito');
$_smarty_tpl->tpl_vars['carrito']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['carrito']->value) {
$_smarty_tpl->tpl_vars['carrito']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['carrito']->value['Name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['carrito']->value['Quantity'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['carrito']->value['Price'];?>
€</td>
                <td><?php echo $_smarty_tpl->tpl_vars['carrito']->value['subtotal'];?>
€</td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
        <tbody>
            <th>Precio total del pedido</th>
            <td><span id="totalPrice"><?php echo $_smarty_tpl->tpl_vars['precioTotal']->value;?>
</span>€</td>
        </tbody>
    </table>
    <div>
        <button type="button" class="btn btn-primary" onclick="finalizarCompra()">FINALIZAR COMPRA</button>
        <button type="button" class="btn btn-primary" onclick="location.href='index.php?ctrl=Wellcome'">SEGUIR COMPRANDO</button>
        <button type="button" class="btn btn-danger" onclick="vaciarCarrito()">VACIAR CARRITO</button>

    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender('file:layout/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
