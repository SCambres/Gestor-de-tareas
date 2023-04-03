<?php
/* Smarty version 4.3.0, created on 2023-03-06 12:06:35
  from '/var/www/ejercicios/tienda_formacion/view/CrearPedido.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6405c93b836e53_19896300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1c50cc7b161b5546dd2429da72241a190b1464d' => 
    array (
      0 => '/var/www/ejercicios/tienda_formacion/view/CrearPedido.tpl',
      1 => 1677844975,
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
function content_6405c93b836e53_19896300 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layout/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:layout/headerModuleView.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-centrado mb-5 text-dark">CREAR NUEVO PEDIDO</h3>
            <div class="text-centrado mb-5 text-dark">INTRODUCE LOS DATOS</div>
            <div class="card my-5">

                <form id="crearPedido" class="card-body cardbody p-lg-5 " method="post" >

                    <div class="mb-3">
                        <input type="text" class="form-control" id="UserId" placeholder="Id del usuario que va a realizar el pedido">
                    </div>

                    <div class="mb-3">
                        <select id="productosElegidos" name="productos[]" class="form-control" multiple>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaProducto']->value, 'producto');
$_smarty_tpl->tpl_vars['producto']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['producto']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['producto']->value['Name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['producto']->value['Price'];?>
€</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="TotalPrice" placeholder="Precio total del pedido a realizar">
                    </div>

                    <div class="mb-3">
                        <input type="datetime-local" class="form-control" id="Date" placeholder="FEcha del pedido">
                    </div>

                    <div class="text-centrado">
                        <button type="button" id="crearPedido" class="btn btn-dark" onclick="creacionPedido()">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:layout/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
